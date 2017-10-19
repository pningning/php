<?php 
// $str = 0;
// for($i = 1; $i < 9; $i++) {
//     for($j = 1; $j <9-$i; $j++) {
//         $str += $i*$j."\n"
//     }
// }
// echo $str;

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
<!-- 实际情况下id一般用在非常重要的地方，一般都用class -->
    <div id="container">
        <div class="row">
            <!-- 显示第一行 -->
            <?php for ($i = 1; $i < 10 ; $i++) { ?>
                <span class=""><?php $res = $i*1; echo "1*$i = $res"; ?></span>
            <?php } ?>
        </div>
        <div>
            <?php for( $i = 1; $i < 10 ; $i++) { ?>
                <span class=""><?php $res = $i*2; echo "2*$i = $res"; ?></span>
            <?php  }?>
        
        </div>
        <div>
            <?php for( $i = 1; $i < 10 ; $i++) { ?>
                <span class=""><?php printf( "%d*%d = %d", $i,3,$i*3) ?></span>
            <?php  }?>
        
        </div>


    </div>
</body>
</html>