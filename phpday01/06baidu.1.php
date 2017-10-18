<?php
$list = array(
    array(
        "title" => "我在看java视频的时候为什么包定义成cn.itcast是什么意..._百度知道",
        "datetime" =>"2个回答 - 最新回答: 2013年01月15日 - 69人觉得有用",
        "desc" => "最佳答案: 呵呵,程序员有个不成文的规范,包的命名一般都是以自己公司或企业的域名来,如果我没猜错的话",
        "other" => "更多关于itcast的问题>>",
        "hp" => "zhidao.baidu.com/link?...",
        "kuaizhao" => "- 百度快照"
    ),
    array(
        "title" => "我在看java视频的时候为什么包定义成cn.itcast是什么意..._百度知道",
        "datetime" =>"2个回答 - 最新回答: 2013年01月15日 - 69人觉得有用",
        "desc" => "最佳答案: 呵呵,程序员有个不成文的规范,包的命名一般都是以自己公司或企业的域名来,如果我没猜错的话",
        "other" => "更多关于itcast的问题>>",
        "hp" => "zhidao.baidu.com/link?...",
        "kuaizhao" => "- 百度快照"
    ),
    array(
        "title" => "我在看java视频的时候为什么包定义成cn.itcast是什么意..._百度知道",
        "datetime" =>"2个回答 - 最新回答: 2013年01月15日 - 69人觉得有用",
        "desc" => "最佳答案: 呵呵,程序员有个不成文的规范,包的命名一般都是以自己公司或企业的域名来,如果我没猜错的话",
        "other" => "更多关于itcast的问题>>",
        "hp" => "zhidao.baidu.com/link?...",
        "kuaizhao" => "- 百度快照"
    ),
    array(
        "title" => "我在看java视频的时候为什么包定义成cn.itcast是什么意..._百度知道",
        "datetime" =>"2个回答 - 最新回答: 2013年01月15日 - 69人觉得有用",
        "desc" => "最佳答案: 呵呵,程序员有个不成文的规范,包的命名一般都是以自己公司或企业的域名来,如果我没猜错的话",
        "other" => "更多关于itcast的问题>>",
        "hp" => "zhidao.baidu.com/link?...",
        "kuaizhao" => "- 百度快照"
    ),
    array(
        "title" => "我在看java视频的时候为什么包定义成cn.itcast是什么意..._百度知道",
        "datetime" =>"2个回答 - 最新回答: 2013年01月15日 - 69人觉得有用",
        "desc" => "最佳答案: 呵呵,程序员有个不成文的规范,包的命名一般都是以自己公司或企业的域名来,如果我没猜错的话",
        "other" => "更多关于itcast的问题>>",
        "hp" => "zhidao.baidu.com/link?...",
        "kuaizhao" => "- 百度快照"
    )
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    div {
        width: 1200px;
        margin: 0 auto;
    }
    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
        ul li,li a {
            font-size: 14px;
            color: #999;
            line-height: 16px;
        }
    .title {
        font-size: 16px;
        color: blue;
        line-height: 18px;
    }
    .color {
        color: green;
    }
    .other {
        color:#A19ED5;
        font-size:16px; 
    }
    
    </style>
</head>
<body>
    <div>
        <ul>
        <?php foreach( $list as $value ) { ?> 
            <li><a href="#" class ="title"><?php echo $value[ "title" ] ?></a></li>
            <li><?php echo $value[ "datetime" ] ?></li>
            <li><?php echo $value[ "desc" ] ?></li>
            <li><a href="#" class="other"><?php echo $value[ "other" ] ?></a></li>
            <li><span class="color"><?php echo $value[ "hp" ] ?></span><a href="#"><?php echo $value[ "kuaizhao" ] ?></a></li><br />
            <?php } ?> 
        </ul>
   
         <!-- <li><a href="#" class ="title">好</a></li>
        <li></li>
        <li>好</li>
        <li><a href="#" class="other">好</a></li>
        <li><span class="color">好</span><a href="#" >好</a></li>    -->
    </div>
</body>
</html>