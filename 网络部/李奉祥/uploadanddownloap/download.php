<?php
//获取要下载的文件名
  $file="./uploads/".$_GET["name"];
  //重新设置响应类型
  $info=getimagesize($file);
  header("content-type:".$info["mime"]);
  header("content-disposition:attachment;filename=".$_GET["name"]);
  header("content-length:".filesize($file));
  readfile($file);
?>