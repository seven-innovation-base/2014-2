<?php
 $up=$_FILES["files"];
 if($up["error"]>0){
 //获取错误信息
   switch($up['error']){
   case 1:
         $info="<h2>上传的文件超过了php.ini中upload_max_filesize选项限制的值</h2>";
		 break;
	case 2:
         $info="上传的文件超过了html中MAX_FILE_SIZE选项指定的值";
		 break;
	case 3:
         $info="文件只有部分上传";
		 break;
	case 4:
         $info="没有文件上传";
		 break;
	case 6:
         $info="找不到临时文件夹";
		 break;
	case 7:
         $info="文件写入失败";
		 break;
	die("上传文件错误:".$info);

   }
 }
 //限制上传文件的大小
  if($up["size"]>5000000){
    die("无法上传超出限定大小的文件");

  }
  
  //限制上传文件的类型
  $typelist=array("jepg","jpg","png","MP4","mp3","doc","txt","rar","gif","mp4");
  $arr=explode(".", $_FILES["files"]["name"]);
	$hz=$arr[count($arr)-1];
  if(!in_array($hz,$typelist)){
    echo "非法的上传类型";
	exit;
  }
  //更改上传后的文件的文件名，避免重复覆盖
  	$filepath="./uploads/";
	$randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".".$hz;
	//判断是否是一个上传文件
   if(is_uploaded_file($up["tmp_name"])){
   //执行文件上传
         if(move_uploaded_file($up["tmp_name"],"./uploads/".$randname)){
		    echo "<h2>上传成功</h2><br>";
			echo "<a href='one.php'><h3>浏览</h3></a>";
		 }else{
		   die("上传失败");
		 }
      }else{
	   echo "不是一个上传文件!";
	  }

?>