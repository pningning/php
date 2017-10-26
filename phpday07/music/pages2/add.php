<?php 
function postback() {
  //============================校验文本框==========================
  if(empty($_POST['title'])) {
    $GLOBALS['message'] = '请输入音乐标题';
    return;
  }
  if(empty($_POST['artist'])) {
    $GLOBALS['message'] = '请输入歌手';
    return;
  }
//===============================校验图片============================
  if(empty($_FILES['images'])) {
    $GLOBALS['message'] = '不要玩了';
    return;
  }
  $images = $_FILES['images'];
  if($images['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '请添加图片';
    return;
  }
  //添加了图片,判断图片大小
  if($images['size'] > 1 * 1024 * 1024) {
    $GLOBALS['message'] = '图片太大了';
    return;
  }
  //判断类型
  $allowed_types = array('image/jpeg','image/png','image/gif');
  if(!in_array($images['type'],$allowed_types)) {
    $GLOBALS['message'] = '不支持此图片格式';
    return;
  }
  //把图片从临时目录存到网络范围内的目录下
  $images_path = uniqid() . $images['name'];
  $target = './uploads/' . $images_path;
  if(!move_uploaded_file($images['tmp_name'],$target)) {
    $GLOBALS['message'] = '上传图片失败';
    return;
  }
  //==============================校验音乐=================================
  if(empty($_FILES['source'])) {
    $GLOBALS['message'] = '逗我？';
    return;
  }
  $source = $_FILES['source'];
  if($source['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '上传音乐失败';
    return;
  }
  //判断音乐文件大小
  if($source['size'] > 10 * 1024 * 1024) {
    $GLOBALS['message'] = '音乐文件太大了';
    return;
  }
  if($source['size'] < 1* 1024 * 1024) {
    $GLOBALS['message'] = '音乐文件太小了';
    return;
  }
  //判断类型
  $allowed_types = array('audio/mp3','audio/wma');
  if(!in_array($source['type'],$allowed_types)) {
    $GLOBALS['message'] = '不支持此音乐格式';
    return;
  }
  //把音乐文件从临时文件存到网络范围内的文件
  $source_path = uniqid() . $source['name'];
  $target = './uploads/' . $source_path;
  if(!move_uploaded_file($source['tmp_name'],$target)) {
    $GLOBALS['message'] = '上传音乐失败';
    return;
  }
  //=====================图片和音乐都上传完了=======================
  //把提交的内容保存到指定文件中
  $origin = json_decode(file_get_contents('storage.json'),true);
  $origin[] = array(
    "id" => uniqid(),
    "title" => $_POST['title'],
    "artist" => $_POST['artist'],
    "images" => '/music/pages2/uploads/' . $images_path,
    "source" => '/music/pages2/uploads/' . $source_path
    );
  $json = json_encode($origin);
  file_put_contents('storage.json',$json);
  header('Location: list.php');


}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
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