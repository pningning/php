
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .box {
            width: 100px;
            float: left;
            background-color: #14cbd4;
            border: 2px dashed #d29711;
            margin: 10px 5px 0 0;
            text-align: center;
        }
        .box:hover {
            background-color: #ef0404;
            border: 2px dashed #4911d2;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
<div>
    <?php for($j = 1; $j < 10; $j++) { ?>
        <div>
        <?php for($i = 1; $i <= $j; $i++) { ?>
            <div class="box"><?php printf("%d*%d = %d",$i,$j,$i*$j)?></div>
        <?php } ?>
        <div class="clear"></div>
        </div>
    <?php } ?>
</div>
</body>
</html>