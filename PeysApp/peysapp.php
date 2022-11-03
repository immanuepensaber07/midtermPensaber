<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Peys App</h1>

    <form action="" method="post">
        <label for="setSize">Select Photo Size:</label>
        <input type="range" name="setSize" id="setSize" min="10" max="100" step="10" value="60">
        <br>
        <label for="setColor">Select Border Color:</label>
        <input type="color" name="setColor" id="setColor">
        <br>
        <button type="submit" name="btnProcess">Process</button>
        <br><br>
       
        <?php if (isset($_POST['btnProcess'])) : ?>
            <?php 
                $size = $_POST ['setSize'];
                $border = $_POST ['setColor'];
            ?>
        <?php endif; ?> 
        <img src="img.jpg" alt="" width="<?php echo $size; ?>%" border= " 5px solid" style="color: <?php echo $border; ?>">
    </form>
</body>
</html>