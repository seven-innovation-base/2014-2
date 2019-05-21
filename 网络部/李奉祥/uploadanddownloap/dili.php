<?php
 $file="./uploads/".$_GET["name"]; 
 if(file_exists($file)){
  if(unlink($file)){
  echo "<h2>成功删除文件</h2><br>";
  echo "<a href='one.php'><h3>返回</h3></a>";
  }else{
    echo "文件删除失败";
  }
 }
 
 
 // $dirname="./uploads";
//  $dir=opendir($dirname);
 // while($filename=readdir($dir)){
   // $file=$dirname.'/'.$filename;
	// if(file_exists($file)){
	//  if(unlink($file)){
	//   echo "删除成功";
	// }else{
	//   echo "删除失败";
	// }
//	}
 // }
//  closedir($dir);
?>