<?php

// require_once 'one';
// include 'one';
include_once 'one';
echo "你好";
//require 和require_once 当使用的时候如果载入的文件不存在会出现致命行的错误，不会再执行当前的文件
// include 和include_once 在使用的时候如果载入的文件不存在，会出现警告，但是当前的文件会继续执行，
// 这个警告可以在PHP的配置文件php.ini的directory in处进行设置，设置为off即可接触这种警告
