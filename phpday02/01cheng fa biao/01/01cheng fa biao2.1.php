

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    
    .box2 {
        float: left;
        width: 100px;
        background-color: pink;
        border: 2px dashed red;
        margin: 10px 5px 0 0;
        text-align: center;
    }
    .clear {
        clear: both;
    }
    .box2:hover {
        background-color: red;
        border: 2px dashed pink;
    }
    </style>
</head>
<body>
<?php for($i = 1; $i < 10; $i++) { ?>
    <div>
        <div class="box1">
            <?php for( $j = 1; $j <= $i; $j++) { ?>
                <div class="box2"><?php printf("%d*%d=%d",$i,$j,$i*$j)?></div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
<?php } ?>
</body>
</html>