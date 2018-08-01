<?php
    $file=$_GET['file'];

    //设置浏览器识别下载类型支持图片、文本
    header("Content-type:image/pjpeg");
    header("Content-type:text/text");

    //设置文件下载名不包含路径
    $filename=basename($file);

    //设置文件加载方式为激活下载框
    header("Content-Disposition:attachment;filename=$filename");
    readfile($file);
?>