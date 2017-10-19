
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .container {
        /* background-color: pink; */
    }
    .column {
        width: 100px;
        float: left;
        border: 2px dashed red;
        margin: 10px 5px 0 0;
        background-color: pink;
        text-align: center;
    }
    .column:hover {
        background-color: red;
        border: 2px dashed pink;
    }
    .clear {
        clear: both;
    }
    </style>
</head>
<body>
<!-- 实际情况下id一般用在非常重要的地方，一般都用class -->
<?php for($j = 1; $j < 10; $j++) { ?>
    <div id="container">
        <div class="row">
            <!-- 显示第一行 -->
            <?php for ($i = 1; $i <= $j ; $i++) { ?>
                <div class="column"><?php printf("%d*%d = %d", $i,$j,$i*$j); ?></div>
            <?php } ?>
            <div class="clear"></div>
        </div>
    </div>
 <?php } ?>
</body>
</html>