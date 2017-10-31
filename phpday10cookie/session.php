<?php
  //先开把箱子的钥匙给用户
  session_start();

  if(empty($_SESSION['num']) || empty($_GET['num'])) {
    $num = rand(1, 100);
    //把cookie存储到服务器的箱子中
    $_SESSION['num'] = $num;

  } else {
    // $str = empty($_SESSION['str']) ? '' : $_SESSION['str'];
    //判断是否已经开始猜了
    $count = empty($_SESSION['count']) ? 0 : $_SESSION['count'];
    if($count < 10) {
      $result = (int)$_GET['num'] - $_SESSION['num'];
      if($result == 0) {
        $message = '猜对了';
        //删除cookie
        unset($_SESSION['num']);
        unset($_SESSION['count']);
        unset($_SESSION['str']);
      } elseif($result > 0) {
        $_SESSION['str'] = $str. ' ' . (int)$_GET['num'];
        echo $_SESSION['str'];
        $message = '太大了';
      } else {
        $_SESSION['str'] = $str. ' ' . (int)$_GET['num'];
        echo $_SESSION['str'];
        $message = '太小了';
      }

      $_SESSION['count'] = $count + 1;
    } else {
      $message = '===游戏结束===';
      //删除cookie
      unset($_SESSION['num']);
      unset($_SESSION['count']);
      unset($_SESSION['str']);
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