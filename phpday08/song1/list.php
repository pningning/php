<?php
$str = file_get_contents('data.json');
$arr = json_decode($str,true);
if(!$arr) {
  exit('数据参数异常！');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>音乐列表</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">音乐列表</h1>
    <hr>
    <div class="mb-3">
      <a href="add.php" class="btn btn-secondary btn-sm">添加</a>
    </div>
    <table class="table table-bordered table-striped table-hover">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">标题</th>
          <th class="text-center">歌手</th>
          <th class="text-center">海报</th>
          <th class="text-center">音乐</th>
          <th class="text-center">操作</th>
        </tr>
      </thead>
      <tbody class="text-center">
      <?php foreach($arr as $value): ?>
        <tr>
          <td class="align-middle"><?php echo $value['title']; ?></td>
          <td class="align-middle"><?php echo $value['artist']; ?></td>
          <td class="align-middle">
          <?php foreach($value['images'] as $src): ?>
          <img src="<?php echo $src; ?>" alt="">
          <?php endforeach ?>
          </td>
          <td class="align-middle"><audio src="<?php echo $value['source']; ?>" controls></audio></td>
          <td class="align-middle"><a class="btn btn-danger btn-sm" href="dele.php?id=<?php echo $value['id']; ?>">删除</a></td>
        </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
</body>
</html>