<?php
function postback() {
  //==============判断文本框==============
  if(empty($_POST['title'])) {
    $GLOBALS['message'] = '请输入标题';
    return;
  }
  if(empty($_POST['artist'])) {
    $GLOBALS['message'] = '请输入歌手';
    return;
  }
  //===============判断图片===============
  if(empty($_FILES['images'])) {
    $GLOBALS['message'] = '不要玩了';
    return;
  }
  $images = $_FILES['images'];
  if($images['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '上传图片失败';
    return;
  }
   //判断图片类型
  $allowed_types = array('image/jpeg','image/png','image/gif');
  if(!in_array($images['type'],$allowed_types)) {
    $GLOBALS['message'] = '不支持此图片格式';
    return;
  }
  //判断图片大小
  if($images['size'] > 1 * 1024 * 1024) {
    $GLOBALS['message'] = '图片过大';
    return;
  }
  //把图片从临时目录存到网络范围的目录里
  $images_path = uniqid() . '-' . $images['name'];
  $target = './uploads/' . $images_path;
  if(!move_uploaded_file($images['tmp_name'],$target)) {
    $GLOBALS['message'] = '图片上传失败';
    return;
  }

  //==================验证音乐=================
  if(empty($_FILES['source'])) {
    $GLOBALS['message'] = '好好玩';
    return;
  }
  $source = $_FILES['source'];
  //判断是否上传文件
  if($source['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '上传音乐失败';
    return;
  }
  //判断音乐文件的大小
  if($source['size'] > 10 * 1024 * 1024) {
    $GLOBALS['message'] = '文件太大了';
    return;
  }
  if($source['size'] < 1 * 1024 * 1024) {
    $GLOBALS['message'] = '文件太小了';
    return;
  }
  //判断上传文件的类型
  $allowed_types = array('audio/mp3','audio/wma');
  if(!in_array($source['type'],$allowed_types)) {
    $GLOBALS['message'] = '不支持此音乐格式';
    return;
  }
  //把音乐从临时文件里面存到网络范围内文件
  $source_path = uniqid() . '-' . $source['name'];
  $target = './uploads/' . $source_path;
  if(!move_uploaded_file($source['tmp_name'],$target)) {
    $GLOBALS['message'] = '上传音乐失败';
    return;
  }
  //==============图片音乐都上传好了=============
  //读取到存储文件的文件的内容，解码成数组
  $origin = json_decode(file_get_contents('storage.json'),true);
  //把提交的信息以数组的形式存储到读取的内容中
  $origin[] = array(
    "id" => uniqid(),
    "title" => $_POST['title'],
    "artist" => $_POST['artist'],
    "images" => '/music/pages1/uploads/' . $images_path,
    "source" => '/music/pages1/uploads/' . $source_path
    );

  //把数组编译为json格式的字符串
  $json = json_encode($origin);

  //把内容保存到文件中
  file_put_contents('storage.json',$json);
  //页面跳转，设置请求头
  header('Location: list.php');

}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  postback();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
  <style>
    #red {
      color: red;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>
    <?php if(isset($message)): ?>
      <div id="red"><?php echo $message; ?></div>
    <?php endif ?>
    <!-- <form action="<?php //echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off"> -->
    <form action="?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist" name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <input type="file" class="form-control" id="images" name="images">
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>