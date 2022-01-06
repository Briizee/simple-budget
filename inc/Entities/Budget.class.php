<?php

class Budget {

    private $budget = array();
    private float $total = 0;

    function setBudget(array $newBudget) {
        $this->budget = $newBudget;
        $this->calcCurrentBudget();
    }

    function getBudget() {
        return $this->budget;
    }

    static function cmp_category(BudgetItem $x, BudgetItem $y) {
        return $x->getCategory() <=> $y->getCategory();
    }
    function sortBudget() {
        usort($this->budget, 'self::cmp_category');
    }

    function calcCurrentBudget() {
        $newTotal = 0;
        foreach($this->budget as $budgetItem) {
            //add if income subtract if expense
            if($budgetItem->getType() == "income"){
                $newTotal += $budgetItem->getCost();
            } else {
                $newTotal -= $budgetItem->getCost();
            }
        }
        $this->total = $newTotal;
    }

    function getCurrentBudget() {
        return $this->total;
    }

}

?>