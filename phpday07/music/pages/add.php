<?php 
  function postback() {
    //=============验证文本框=====================
    if(empty($_POST['title'])) {
    $GLOBALS['message'] = '请输入标题';
    return;
    }
    if(empty($_POST['artist'])) {
      $GLOBALS['message'] = '请输入歌手';
      return;
    }

    //===============接受图片=======================
    //判断是否有文件域
    if(empty($_FILES['images'])) {
      $GLOBALS['message'] = '请正确提交文件';
      return;
    }
    //判断是否上传图片
    $images = $_FILES['images'];
    if($images['error'] !== UPLOAD_ERR_OK) {
      $GLOBALS['message'] = '请上传图片';
      return;
    }
    //如果上传了图片，判断图片大小
    if($images['size'] > 1 * 1024 * 1024) {
      $GLOBALS['message'] = '上传图片过大';
      return;
    }

    //验证类型
    $allowed_types = array('image/jpeg','image/png','image/gif');
    if(!in_array($images['type'],$allowed_types)) {
      $GLOBALS['message'] = '不支持此图片格式';
      return;
    }

    //把图片从临时目录转移到网络范围内，保存
    // $target = './uploads/' . uniqid() . '-' . $images['name'];
    $images_path = uniqid() . '-' . $images['name'];
    $target = './uploads/' . $images_path;
    if(!move_uploaded_file($images['tmp_name'],$target)) {
      $GLOBALS['message'] = '上传图片失败';
      return;
    }

    //=============接受音乐=========================
    //判断是否有文本域
    if(!isset($_FILES['source'])) {
      $GLOBALS['message'] = '逗我玩';
      return;
    }
    //判断是否上传音乐文件
    $source = $_FILES['source'];
    if($source['error'] !== UPLOAD_ERR_OK) {
      $GLOBALS['message'] = '请上传音乐';
      return;
    }
    
    //判断音乐文件大小
    if($source['size'] > 10 * 1024 * 1024) {
      $GLOBALS['message'] = '上传文件过大';
      return;
    }
    if($source['size'] < 1 * 1024 * 1024) {
      $GLOBALS['message'] = '上传文件过小';
      return;
    }
    //判断文件类型
    $allowed_types = array('audio/mp3','audio/wma');//把类型存到数组中国
    if(!in_array($source['type'],$allowed_types)) {
      $GLOBALS['message'] = '不支持此音乐格式';
      return;
    }

    //如果上传成功了，把上传的音乐从临时目录中转移到网路范围内的目录中存下来
    //一般都会把上传的文件重命名，避免文件同名被覆盖
    // $target = './uploads/' . uniqid() . '-' . $source['name'];
    $source_path = uniqid() . '-' . $source['name'];
    $target = './uploads/' . $source_path;
    if(!move_uploaded_file($source['tmp_name'],$target)) {
      $GLOBALS['message'] = '上传音乐失败';
      return;
    }

    // ================图片音乐都上传成功 ===============
    //把提交的的内容保存到文件中，存储起来

    //获取到要存储到文件的文件
    $origin = json_decode(file_get_contents('storage.json'),true);
    $origin[] = array(
      'id' => uniqid(),
      'title' => $_POST['title'],
      'artist' => $_POST['artist'],
      'images' => '/music/pages/uploads/' . $images_path,
      'source' => '/music/pages/uploads/' . $source_path
    );
    //把数组编译成字符串
    $json = json_encode($origin);
    file_put_contents('storage.json',$json);

    //跳转到音乐列表
    header('Location: list.php');
  }

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    postback();
    // var_dump($_FILES['images']);
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

