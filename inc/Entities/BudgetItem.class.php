<?php

class BudgetItem {
    function __construct(
        string $item,
        float $cost,
        string $category,
        string $type) {
            $this ->item = $item;
            $this->cost = $cost;
            $this->category = $category;
            $this->type = $type;
        }

    public function getItem() {
        return $this->item;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getType() {
        return $this->type;
    }
}

?>