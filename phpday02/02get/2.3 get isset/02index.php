<?php
    if(isset($_GET["t1"]) && isset($_GET["t2"])) {
        $t1 = $_GET["t1"];
        $t2 = $_GET["t2"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>您输入的内容是：</h1>
    <h1>t1: <?php echo $t1 ?></h1>
    <h1>t2: <?php echo $t2 ?></h1>
</body>
</html>














