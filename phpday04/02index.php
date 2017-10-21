<?php 
	$sum = file_get_contents("names.txt");
	$sum1 = explode( "\n",$sum );
	$length1 = count($sum1);
	$arr = array();
//	print_r($sum1);	
	for($i = 0; $i<$length1-1; $i++) {
		$arr[$i] =explode( "|",$sum1[$i] );
	}
	$length2 = count($arr[1]);
//	print_r($arr[3][1]);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<style>
		td {
			border: 1px solid red;
		}
	</style>
</head>
<body>
	<table>
		<?php for($i = 0; $i < $length1-1; $i++) { ?>
		<tr>
			<?php  for($j = 0; $j < $length2-1; $j++) { ?>
				<td><?php echo $arr[$i][$j]?></td>
			<?php } ?>
			<td><a href="<?php echo strtolower($arr[$i][$length2-1]) ?>"><?php echo substr($arr[$i][$length2-1],8)?></a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>