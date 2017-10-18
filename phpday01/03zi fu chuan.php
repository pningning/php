<h3>字符串有三种</h3>
<h4>1.用""括起来</h4>
<p>特点：该字符串能够准仪一些特殊字符，要转译字符必须用“”</p>
<p>具有变量解析的功能；例如下</p>
<?php 
    $name = "张三";
    $age = 19;
    $sex = "男";
    //下面这种形式变量需要的两边需要用空格隔开，但是变量两边的空格会在页面中显示出来
    echo "大家好我叫 $name ,今年 $age 了，我是 $sex 生<br />\n";
    echo "大家好，我叫{$name},今年{$age}了，我是{$sex}生<br />\n";//这种形式需要用{}把变量包裹起来
    echo "大家好啊,我叫".$name."今年".$age."了，我是".$sex."生";//这种形式需要用.把变量跟字符串连接起来
    // echo $name."你好";
?>
<h4>2，用‘’括起来的字符串</h4>
<p>特点： 不能转译\系列的字符串</p>
<h4>文档字符串类型</h4>
<p>格式：</p> 
<p>$变量名 = <<< 标识符 </p>
<p>字符串内容</p> 
<p>字符串内容</p>
<p>标识符</p> 
<h3>注意：最后结尾的标识符，必须开头书写，顶着最前面，标识符的后面不能加任何内容，包括空格</h3>

<?php 
$list = <<< end
你好啊
end;
echo $list;
$html = <<< end
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>你好</p>
</body>
</html>
end;
echo $html;
?>