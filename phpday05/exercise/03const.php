<?php
define('SYSTEM_NAME','阿里白秀');
// echo SYSTEM_NAME;
// echo system_name;这样不能访问
define('SYSTEM_VERSION','1.0',true);
//是用true在使用常量的时候忽略大小写，不写true,默认是false,不忽略大小写
echo SYSTEM_VERSION.'<br />';
echo system_version;