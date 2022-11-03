<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Vendo Machine</title>
</head>
<body>
    <h3>Vendo Machine</h3>
    <?php

    $arrBeverage = array('Coke' => 15, 'Sprite' => 20, 'Royal' => 20, 'Pepsi' => 15, 'Mountain Dew' => 20,);
    $arrSize = array('Regular Size' => 'Regular', 'Up-size (add ₱5)' => 'Up-size', 'Jumbo (add ₱10)' => 'Jumbo');


    ?>


    <form method="post">

      
        <fieldset>
            <legend>Products:</legend>

            <?php
                if(isset($arrBeverage)){
                    foreach ($arrBeverage as $keyBez => $valueBev) {
                        echo "<input type='checkbox' name='chkBeverage[". $keyBez ."]' value='". $valueBev ."'>
                        <label>". $keyBez. " - ₱". $valueBev."</label><br>";
                    }
                }
            ?>

        </fieldset>
                
      
        <fieldset>

            <legend>Options:</legend>
            <label for="sizeSelect">Size</label>
            <select name="sizeSelect" id="sizeSelect">

                <?php
                    if (isset($arrSize)) {
                        foreach ($arrSize as $keySize => $valueSize) {
                            echo "<option value='". $valueSize."'>". $keySize ."</option>";
                        }
                     }
                ?>
            </select>

           
            <label for="setQuantity">Quantity</label>
            <input type="number" name="setQuantity" id="setQuantity" min="0" max="100" value="0">
            
            <button type="submit" name="btnSubmit">Check Out</button>

        </fieldset>

    </form>

    <?php
        if (isset($_POST['btnSubmit'])) {

            if(isset($_POST['chkBeverage']) && isset($_POST['sizeSelect'])){

                $quantity = $_POST['setQuantity'];
                $size = $_POST['sizeSelect'];
                $process = $_POST['chkBeverage'];

               
                if ($quantity == 1) {
                    $term = "piece";   
                }
                else{
                    $term = "pieces";   
                }

                
                if ($size == 'Regular') {
                    $addon = 0;   
                }
                elseif ($size == 'Up-size') {
                    $addon = 5;  
                }
                elseif ($size == 'Jumbo') {
                    $addon = 10;  
                }
                echo "<h3>Purchase Summary</h3>";
                
                foreach ($process as $processKey => $processValue) {
                    echo
                    "<ul>
                        <li>" . $quantity ."  ". $term ." of ". $size ." ". $processKey ." amounting to ₱" . $totalVal =
                        intval($processValue) * intval($quantity) + ($addon * intval($quantity)) .
                        "</li>
                    </ul>";
                }
                    $itemTotal = ($quantity * sizeof($process));
                    $grandTotal = (array_sum($process) + $addon * $quantity) * $quantity;

                    echo "<label><b>Total number of items:</b> </label>". $itemTotal ."<br>";
                    echo "<label><b>Total amount:</b> </label>". $grandTotal;

                   
            }
            else{
                echo "No Selected product; please try again.";
            }
        }
    ?>
        
</body>
</html>