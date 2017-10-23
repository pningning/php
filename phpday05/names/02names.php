<?php 


    $line[0] ="\n".$_GET['bh'].'|';
    $line[1] = $_GET['name'].'|';
    $line[2] = $_GET['age'].'|';
    $line[3] = $_GET['email'].'|';
    $line[4] = $_GET['http'];
    // 把这个数组存入到文件中
    file_put_contents('names.txt',$line,FILE_APPEND);


    
    // 获取到文件，得到一个字符串
    $str = file_get_contents('names.txt');

    echo $str;
    // $str = file_get_contents('names.txt');
    $arr = explode("\n",$str);
    // 循环得到的数组arr把里面的值以|分割，得到的数组放到$arr2里面
    foreach($arr as $value) {
        if(!$value) continue;
        $arr2[] = explode('|',$value);
    }
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
            <?php foreach($arr2 as $value1 ): ?>
                <?php $value1[0] = str_pad(trim($value1[0]),3,'0',STR_PAD_LEFT); ?>
                <tr>
                    <?php foreach($value1 as $k => $v): ?>
                        <?php $v = trim($v) ?>
                        <?php if(strpos($v,"http://") === 0): ?>
                            <td><a href="<?php echo strtolower($v) ?>"><?php echo substr($v,7) ?></a></td>
                        <?php else: ?>
                            <td><?php echo $v ?></td>
                        <?php endif ?>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
    </table>
</body>
</html>