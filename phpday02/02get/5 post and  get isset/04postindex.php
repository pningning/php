<?php 
    if(isset($_POST["t1"]) && strlen(trim($_POST["t1"])) !=0
    && isset($_POST["t2"]) && strlen(trim($_POST["t2"])) !=0
    ) {
        $t1 = $_POST["t1"];
        $t2 = $_POST["t2"];
    }else {
        die("您没有访问的权限");
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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>您输入的内容为：</h1>
        <h1>t1: <?php echo $t1 ?></h1>
        <h1>t2: <?php echo $t2 ?></h1>
    </body>
    </html>
</body>
</html>