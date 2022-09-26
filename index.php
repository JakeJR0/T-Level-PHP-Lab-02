<?php
include 'assets/php/site_info.php';
include 'assets/php/calculations.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <title><?php echo SITE_NAME; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body>
        <script src="assets/js/calculator.js"></script>

        <div class="text-center" style="margin-top: 50px;">
            <h1 class="display-4"><?php echo SITE_NAME; ?></h1>
            <lead><?php echo SITE_DESCRIPTION; ?></lead>
        </div>
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <row></row>

            <?php 

            if (isset($_POST["number_1"])) {
                $number_1 = $_POST["number_1"];
            } else {
                $number_1 = null;
            }

            if (isset($_POST["number_2"])) {
                $number_2 = $_POST["number_2"];
            } else {
                $number_2 = null;
            }

            if (isset($_POST["operator"])) {
                $operator = $_POST["operator"];
                $operator = strtolower($operator);
            } else {
                $operator = null;
            }
            
            ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Number 1</label>
                    <input id="number_1" class="form-control" type="number" name="number_1" <?php if($number_1 != null) { echo 'value="'.$number_1.'"'; } ?>  placeholder="Number 1">
                </div>
                <div class="mb-3">
                    <label class="form-label">Number 2</label>
                    <input id="number_2" class="form-control" type="number" name="number_2" <?php if($number_2 != null) { echo 'value="'.$number_2.'"'; } ?> placeholder="Number 2">
                </div>
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
                <div class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-danger" onclick="resetCalculator()">Reset</button>
                </div>
                
                <div class="text-center" style="margin-top: 20px;">
                    <div class="mb-3">
                        <label class="form-label">Result</label>
                        <input class="form-control text-center" id="result" readonly type="text" value="<?php echo calculate($number_1, $number_2, $operator); ?>">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>
