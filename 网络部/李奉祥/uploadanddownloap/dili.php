<?php
 $file="./uploads/".$_GET["name"]; 
 if(file_exists($file)){
  if(unlink($file)){
  echo "<h2>�ɹ�ɾ���ļ�</h2><br>";
  echo "<a href='one.php'><h3>����</h3></a>";
  }else{
    echo "�ļ�ɾ��ʧ��";
  }
 }
 
 
 // $dirname="./uploads";
//  $dir=opendir($dirname);
 // while($filename=readdir($dir)){
   // $file=$dirname.'/'.$filename;
	// if(file_exists($file)){
	//  if(unlink($file)){
	//   echo "ɾ���ɹ�";
	// }else{
	//   echo "ɾ��ʧ��";
	// }
//	}
 // }
//  closedir($dir);
?>