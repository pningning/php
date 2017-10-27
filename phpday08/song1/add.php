<?php
function add() {
  //目标，接受到用户提交的数据和文件，最后存储到文件中
  //TODO:创建一个容器，用来存储提交的数据
  $temp = array();
  //===TODO:验证文本框====
  if(empty($_POST['title'])) {
    $GLOBALS['message'] = '请输入音乐标题';
    return;
  }
  $temp['title'] = $_POST['title'];
  if(empty($_POST['artist'])) {
    $GLOBALS['message'] = '请输入歌手';
    return;
  }
  $temp['artist'] = $_POST['artist'];
  //======TODO:验证图片======
  if(empty($_FILES['images'])) {
    $GLOBALS['message'] = '不要玩了';
    return;
  }
  $temp['images'] = array();
  $images = $_FILES['images'];
  //循环上传的每个图片，判断图片的是否上传成功，大小，类型
  for($i = 0; $i < count($images['name']); $i++) {
    //验证是否上传图片
    if($images['error'][$i] !== UPLOAD_ERR_OK) {
      $GLOBALS['message'] = '图片上传失败1';
      return;
    }

    //图片类型的校验
    //方法一：
    // $images_allowed = array('image/jpeg','image/png','image/gif');
    // if(!in_array($images['type'][$i],$images_allowed)) {
    //   $GLOBALS['message'] = '上传图片格式错误';
    //   return;
    // }
    //方法二
    //如果在每个类型不是以image/开头的不是图片类型
    if(strpos($images['type'][$i],'image/') !== 0) {
      $GLOBALS['message'] = '上传图片格式错误';
      return;
    }
    //判断图片大小
    if($images['size'][$i] > 1 *1024 *1024) {
      $GLOBALS['message'] = '上传图片太大了';
      return;
    }
    //把图片从临时位置移动到网络范围内
    $dest = './uploads/' . uniqid() . '-' . $images['name'][$i];
    if(!move_uploaded_file($images['tmp_name'][$i], $dest)) {
      $GLOBALS['message'] = '上传海报失败';
      return;
    }
    //把图片的路径保存到数组中
    $temp['images'][] = '/phpday08/song1' . substr($dest,1);
  }
  //======TODO:验证音乐======
  if(empty($_FILES['source'])) {
    $GLOBALS['message'] = '请正确使用表单';
    return;
  }
  $source = $_FILES['source'];
  if($source['error'] !== UPLOAD_ERR_OK) {
    $GLOBALS['message'] = '音乐文件上传失败1';
    return;
  }
  //判断类型
  if(strpos($source['type'], 'audio/') !== 0) {
    $GLOBALS['message'] = '上传音乐格式错误';
    return;
  }
  //判断大小
  if($source['size'] > 10 * 1024 * 1024) {
    $GLOBALS['message'] = '音乐文件太大了';
    return;
  }
  if($source['size'] < 1 * 1024 * 1024) {
    $GLOBALS['message'] = '音乐文件太小了';
    return;
  }
  //把文件转移到网络范围内
  $target = './uploads/' . uniqid() . '-' . $source['name'];
  if(!move_uploaded_file($source['tmp_name'], $target)) {
    $GLOBALS['message'] = '上传音乐文件失败2';
    return;
  }
  $temp['source'] = '/phpday08/song1' . substr($target, 1);
  $temp['id'] = uniqid();
  //======TODO:把提交的数据保存到存储数据的文件中===========
  $data = json_decode(file_get_contents('data.json'),true);
  $data[] = $temp;
  $new_json = json_encode($data);
  file_put_contents('data.json',$new_json);
  //======TODO:跳转到列表页============
  header('Location: list.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  add();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>
    <?php if(isset($message)): ?>
      <div class="alert alert-danger">
      <?php echo $message; ?>
      </div>
    <?php endif; ?>
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
        <!-- multiple 可以让一个文件域多选 -->
        <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <!-- accept 可以设置两种值分别为  MIME Type / 文件扩展名 -->
        <input type="file" class="form-control" id="source" name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>