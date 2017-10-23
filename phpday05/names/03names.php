<?php 
    $str = file_get_contents('names.txt');
    $arr = explode("\n",$str);
    foreach($arr as $value) {
        if(!$value) continue;
        $arr2[] = explode('|',$value);
    }
    $arr2[] = $_GET;
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
    <table>
        <thead>
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>邮箱</th>
                <th>网址</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($arr2 as $value1 ): ?>
                <?php $value1[0] = str_pad(trim($value1[0]),3,'0',STR_PAD_LEFT); ?>
                <tr>
                    <?php foreach($value1 as $k => $v): ?>
                        <?php $v = trim($v) ?>
                        <?php if(strpos($v,'http://') === 0): ?>
                            <td><a href="<?php echo strtolower($v) ?>"><?php echo substr($v,7) ?></a></td>
                        <?php else: ?>
                            <td><?php echo $v ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>