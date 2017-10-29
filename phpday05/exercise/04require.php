<?php
require 'config.php';
echo SYSTEM_NAME;
// require 'config.php';
// echo SYSTEM_NAME;
echo $i;
// require_once 'config.php';

// echo SYSTEM_NAME;

// require_once 'config.php';

// echo SYSTEM_NAME;
//总结：require导入文件的时候会重复的载入对应的文件，因为相同的名字的
// 常量只能定义一次，所有重复载入对应的文件，相当于重复定义常量，会出现错误警告
// require_once,如果要重复只用的话，只会在第一次载入的时候，载入相应的文件