<?php
# Site Information for Page
include 'assets/php/site_info.php';
# Used for handling calculations for the Page
include 'assets/php/calculations.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Site Title -->
        <title><?php echo SITE_NAME; ?></title>

        <!-- Meta Tags -->

        <meta charset="UTF-8">
        <meta name="title" content="<?php echo SITE_NAME; ?>">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta name="theme-color" content="<?php echo SITE_COLOUR; ?>">
        <meta property="twitter:card" content="summary">
        <meta property="twitter:title" content="<?php echo SITE_NAME; ?>">
        <meta property="twitter:url" content="<?php echo SITE_URL; ?>">
        <meta property="twitter:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo SITE_URL; ?>">
        <meta property="og:description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta property="og:title" content="<?php echo SITE_NAME; ?>">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>
        <div class="text-center" style="margin-top: 50px;">
            <!-- Site Information -->
            <h1 class="display-4"><?php echo SITE_NAME; ?></h1>
            <lead><?php echo SITE_DESCRIPTION; ?></lead>
        </div>
        
        <div class="container" style="margin-top: 50px;">
            <div class="row">
            <?php 
            # Checks if number1 is set
            if (isset($_POST["number_1"])) {
                # Sets number1 to the value of the number_1 input
                $number_1 = $_POST["number_1"];
                # Unsets the number_1 input so it doesn't get used again when the page is refreshed
                unset($_POST["number_1"]);
            } else {
                # Sets number1 to null if it isn't set
                $number_1 = null;
            }

            # Checks if number2 is set
            if (isset($_POST["number_2"])) {
                # Sets number2 to the value of the number_2 input
                $number_2 = $_POST["number_2"];
                # Unsets the number_2 input so it doesn't get used again when the page is refreshed
                unset($_POST["number_2"]);
            } else {
                # Sets number2 to null if it isn't set
                $number_2 = null;
            }

            # Checks if the operator is set
            if (isset($_POST["operator"])) {
                # Sets operator to the value of the operator input
                $operator = $_POST["operator"];
                # Sets operator to lowercase
                $operator = strtolower($operator);
                # Unsets the operator input so it doesn't get used again when the page is refreshed
                unset($_POST["operator"]);
            } else {
                # Sets operator to null if it isn't set
                $operator = null;
            }
            
            ?>
            <!-- Calculator Form -->
            <form method="POST" action="">
                <!-- Number 1 -->
                <div class="mb-3">
                    <label class="form-label">Number 1</label>
                    <input id="number_1" class="form-control" type="number" name="number_1" <?php if($number_1 != null) { echo 'value="'.$number_1.'"'; } ?>  placeholder="Number 1">
                </div>
                <!-- Number 2 -->
                <div class="mb-3">
                    <label class="form-label">Number 2</label>
                    <input id="number_2" class="form-control" type="number" name="number_2" <?php if($number_2 != null) { echo 'value="'.$number_2.'"'; } ?> placeholder="Number 2">
                </div>
                <!-- Operator -->
                <div class="mb-3">
                    <label class="form-label">Operator</label>
                    <select class="form-select" name="operator">
                        <?php 
                        for ($i = 0; $i < count($operators); $i++) {
                            if ($operator == strtoLower($operators[$i])) {
                                echo '<option value="'.$operators[$i].'" selected>'.$operators[$i].'</option>';
                            } else {
                                echo '<option value="'.$operators[$i].'">'.$operators[$i].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <!-- Submit Button -->
                <div class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- Result -->
                <div class="text-center" style="margin-top: 20px;">
                    <div class="mb-3">
                        <label class="form-label">Result</label>
                        <input class="form-control text-center" id="result" readonly type="text" placeholder="Empty" value="<?php echo calculate($number_1, $number_2, $operator); ?>">
                    </div>
                </div>
            </form>
            </div>
        </div>
        <!-- Mutiplication Table Holder-->
        <div class="table-holder">
            <!-- Multiplication Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" colspan=10>Mutiplication Table</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    # Loops from 1 to 10
                    for ($i = 1; $i <= 10; $i++) {
                        # Creates a table row
                        echo '<tr>';
                        # Loops from 1 to 10
                        for ($j = 1; $j <= 10; $j++) {
                            # Works out the cell value
                            $cell =  $i * $j;
                            # Creates a table cell
                            if ($i > 0 && $i <= 10 && $j == 1 || $i == 1) {
                                # Sets the first row and column to bold
                                echo '<th>'.$cell.'</th>';
                            } else {
                                # Sets the rest of the cells to normal
                                echo '<td>'.$cell.'</td>';
                            }
                            
                        }
                        # Closes the table row
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
