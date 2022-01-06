<?php

class BudgetParser {
    private static $budget = array();

    public static function parseBudget(string $fileContents) {
        try {
            $budgetLines = explode("\n", $fileContents);
        

            for($i=1; $i<count($budgetLines); $i++) {
                $columns = explode(",", $budgetLines[$i]);
                if (count($columns) != 4) {
                    throw new Exception("Error in file");
                }
                $newBudgetItem = new BudgetItem(
                    $columns[0],
                    floatval($columns[1]),
                    $columns[2],
                    $columns[3]);

                self::$budget[] = $newBudgetItem;
                
            }
        } catch(Exception $ex) {
            echo $ex->getMessage();
        }
        
    }

    public static function getBudget() {
        return self::$budget;
    }
}

?>