<?php

//先把传入的数据存到一个数组

$get[0] ="\n".$_POST['t1'].'|';
$get[1] = $_POST['t2'].'|';
$get[2] = $_POST['t3'].'|';
$get[3] = $_POST['t4'].'|';
$get[4] = $_POST['t5'];
//把该内容写入到names.tex里面

file_put_contents('names.txt', $get,FILE_APPEND);
//读取文件中的内容，以空格分隔
$str = file_get_contents('names.txt');
var_dump($str);
//第一次分隔

$arr = explode("\n", $str);//注意符号
// print_r($arr);

//第二次分隔

foreach ($arr as $line) {
	// print_r( explode('|', $line));
	if (!$line) {
	 	continue;
	 } 
	$arr2[] = explode('|', $line);
}

// print_r($arr2);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<td>ID:</td>
				<td>姓名:</td>
				<td>年龄:</td>
				<td>邮箱：</td>
				<td>地址：</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($arr2 as $line): ?>
				    <?php $line[0] = str_pad(trim($line[0]),3,"0",STR_PAD_LEFT);?> 
				<tr>
					<?php foreach ($line as $col): ?>

						<?php $col = trim($col);?>
						<?php if(strpos($col,'http://')===0)://必须是三个等于号！！！！！！！！！ ?>
							<td><a href="<?php echo strtolower($col);?>"><?php echo substr($col, 7);?></a></td>
						<?php else:?>
						    <td><?php echo $col; ?></td>
						<?php endif ?>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</tbody>

	</table>
</body>
</html>