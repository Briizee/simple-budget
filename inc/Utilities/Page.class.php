<?php

class Page {
    public static $pageTitle = "CSIS 3280 - Midterm W21 - Brianna Bedard - 300201447";

    public static function header() { ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <title><?php echo self::$pageTitle ?></title>
    </head>

    <body>
    <div class="container">
        <h1><?php echo self::$pageTitle ?></h1>
        <div class="row">
    <?php }

    public static function addForm() { ?>
        <div class="col-lg-3 col-md-3 col-sm-3 bg-light rounded border border-dark">
                <h3>Add Form</h3>
                <form method="POST" action="">
                    <table>
                        <thead>
                            <tr>
                                <th class="col">Item</th>
                                <th class="col">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Item</td>
                                <td><input type="text" name="item" value="PHP Book" size="10"></td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td><input type="number" name="cost" value="9.99" step="0.01"></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td><input type="text" name="category" value="education" size="20"></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><select name="type" >
                                    <option value="expense">Expense</option>
                                    <option value="income">Income</option>
                                </select></td>
                            </tr>
                            
                            <td colspan=2>
                                <input type="submit" value="Add Item" name="submit">
                            </td>
                        </tbody>
                    </table>
                </form>
    <?php }

    public static function currentBudget(Budget $newBudget) { ?>
        <div class="container">
                    <p class="fs-3">Current Budget</p>
                    <?php $total = $newBudget->getCurrentBudget();
                    echo ($total>=0)? '<p class="fs-3 text-success">'.'$'.number_format($total, 2).'</p>' : '<p class="fs-3 text-danger">'.'$'.number_format($total, 2).'</p>';
                    ?>
                    
                </div>
            </div>
    <?php }

    public static function budgetItems(Budget $newBudget) { ?>
        <div class="col-lg-9 col-md-9 col-sm-9 bg-light border-dark border rounded">
                <h3>Budget Items</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col">Item</th>
                            <th class="col">Cost</th>
                            <th class="col">Category</th>
                            <th class="col">Type</th>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($newBudget->getBudget() as $budgetItem) {
                                echo '<tr>
                                <td>'.$budgetItem->getItem().'</td><td>'.'$'.number_format($budgetItem->getCost(),2).'</td><td>'.$budgetItem->getCategory().'</td><td>';
                                echo ($budgetItem->getType() == 'expense')?'<span class="badge bg-warning text-dark">expense</span>' : '<span class="badge bg-success">income</span>'.'</td>';
                                echo '</tr>';
                            }
                        ?>
                        
                    </tbody>
            </div>

        </div>
    </div>
    <?php }

    public static function footer() { ?>
        <!-- Optional JavaScript; choose one of the two! -->

            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
                crossorigin="anonymous"></script>

            <!-- Option 2: Separate Popper and Bootstrap JS -->
            <!--
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
                    -->
        </body>

        </html>

    <?php }
}

?>