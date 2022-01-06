<?php

require_once("inc/config.inc.php");
require_once("inc/Utilities/Page.class.php");
require_once("inc/Entities/BudgetItem.class.php");
require_once("inc/Entities/Budget.class.php");
require_once("inc/Utilities/FileService.class.php");
require_once("inc/Utilities/BudgetParser.class.php");

if(isset($_POST['submit'])) {
    FileService::appendItem($_POST);
    FileService::writeFileContents(DATA_FILE);
}
FileService::readFile(DATA_FILE);
$contents = FileService::getFileContents();

BudgetParser::parseBudget($contents);

$newBudget = new Budget();
$newBudget->setBudget(BudgetParser::getBudget());
$newBudget->sortBudget();
Page::header();
Page::addForm();
Page::currentBudget($newBudget);
Page::budgetItems($newBudget);
Page::footer();



?>