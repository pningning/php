<?php 
$arr = array("秒杀","优惠券","闪购","拍卖","服装城","京东超市","生鲜","全球购","京东金融");
$length = count($arr);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul {
            margin: 0;
            padding: 0;
            background-color: #ccc;
        }
        ul li {
            margin: 0;
            padding: 0;
            float: left;
            margin-right: 20px;
            padding:10px;
            list-style: none;
        }
        li a {
            text-decoration: none;
            font-weight: bolder;
        }
        .clear {
            clear: both;
        }
    </style>
</head>
<body>
    <ul>
    <?php for($i = 0; $i < $length; $i++) { ?>
        <li><a href="#"><?php echo $arr[$i] ?></a></li>
        
    <?php } ?>
        <!-- <li><a href="http://">秒杀</a></li>
        <li><a href="http://">优惠券</a></li>
        <li><a href="http://">闪购</a></li>
        <li><a href="http://">拍卖</a></li>
        <li><a href="http://">服装城</a></li>
        <li><a href="http://">京东超市</a></li>
        <li><a href="http://">生鲜</a></li>
        <li><a href="http://">全球购</a></li>
        <li><a href="http://">京东金融</a></li>       -->
        <!-- <div class="clear"></div> -->
        <br class="clear" />
        <!-- 清除浮动 -->
    </ul>
</body>
</html>