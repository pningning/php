<?php
// 因为时区不同，需要设置当前的时区，有两种方法
// 第一种：通过代码是设置失去，灵活，推荐
date_default_timezone_set('PRC');
echo date('Y-m-d H:i:s');//获取到的当前的年月日时分秒
echo '<br />';
echo time();//获取到当前时间，以秒为单位的时间戳
echo "<br />";
echo date('Y-m-d H:i:s',time());
echo '<br />';
// 第二种方法在php.ini的配置文件中修改 date.timezone=PRC

// 对一有时间做格式化
$str = '2017-10-21 15:18:58';
// 使用strtotime它可以将一个有格式的时间字符串转换话为一个时间戳
$timestamp = strtotime($str);

echo date('Y年m月d日<b\r />H:i:s',$timestamp).'<br />';
echo date('Y年m月d日 H:i:s',$timestamp);

