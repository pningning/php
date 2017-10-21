<!--//<?php echo date('Y-m-d') ?>-->
	<?php
		
		$str = '1 | 朱芳 | 18 | b.unyrl@tpwpqt.st | http://XEP.VC';
//		echo $str;
//			array explode( string $input, string $char )
//		$str1 = array explode( string $str, string "|" );
		$str1 = explode( "|",$str );
		print_r($str1);
		$length = count($str1); 
		?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<?php for($i=0; $i < $length; $i++) { ?>
		<p><?php echo $str1[$i] ?></p>
	<?php } ?>
		<a href="<?php echo strtolower($str1[$length-1]) ?>">a</a>
		
		<p><?php echo substr($str1[$length-1],8)?></p>
		 
		<?php
			$sum = file_get_contents("names.txt");
			$sum1 = explode( "\n",$sum );
			print_r($sum1);
//echo substr("Hello world",0,10)."<br>";
//echo substr("Hello world",1,8)."<br>";
//echo substr("Hello world",0,5)."<br>";
//echo substr("Hello world",6,6)."<br>";
//
//echo substr("Hello world",0,-1)."<br>";
//echo substr("Hello world",-10,-2)."<br>";
//echo substr("Hello world",0,-6)."<br>";
//echo substr("Hello world",-2-3)."<br>";
?>
</body>
</html>