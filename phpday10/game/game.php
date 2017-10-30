<?php
    if(empty($_COOKIE['num']) || empty($_GET['num'])) {
      $num = rand(1, 100);
      SetCookie('num', $num);
    } else {
      //如果设置了cookie
      $count = empty($_COOKIE['count']) ? 0 : (int)$_COOKIE['count'];

      //判断是否够十次
      if($count < 10) {
        //让用户输入的字，cookie存储的数字
        $result = (int)$_GET['num'] - (int)$_COOKIE['num'];
        if($result == 0) {
          $message = '猜对了';
          //重新cookie,删除cookie
          setcookie('num');
          setcookie('count');
        } elseif($result > 0) {
          $message = '太大了';
        } else {
          $message = '太小了';
        }
        setcookie('count', $count + 1);

      } else {
        //游戏结束
        $message = '=====游戏结束=====';
        //删除cookie重新开始
        setcookie('num');
        setcookie('count');
      }
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
    div {
      /*width: 200px;*/
      height: 100px;
      margin: 0 auto;
      /*background: red;*/
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
    <?php if(isset($message)): ?>
      <div><?php echo $message; ?></div>
    <?php endif ?> 
  </form>
</body>
</html>