<html>
  <head>
     <title>文件上传和下载</title>
  <style>
  
<!--
body{
  
}
.content{
  font-size:20px;  /*div范围内字体的大小*/
  font-weight:bold; /*div范围的字体加粗*/
  padding-left:145px; /*div距离左边框的距离*/
}
-->

  </style>
  </head>
  
  <body>
    <h3 align="center">文件上传和下载</h3>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="content">
	选择文件:<input align="center" type="file" name="files">
	
	<input type="submit" value="上传">
	</div>
	</form>
	
	<table align="center" width="1060" border="0">
	   <tr align="light" bgcolor="#cccccc">
	     <th>序号</th><th>文件</th><th>文件名</th><th>文件大小</th><th>文件类型</th><th>添加时间</th><th>操作</th>
	   </tr>
	   
	   <?php
	   //打开目录
	   $dir=opendir("./uploads");
	   //遍历目录，输出里面文件的信息
	   $i=0;
	   while($f=readdir($dir)){
	   $dirfile="./uploads"."/".$f;
	   $a=filesize($dirfile)/1024;
	   $g=filesize($dirfile)/1048576;
	   $b=round($a,2);
	   $c=round($a,2);
	   $e=round($g,2);
	  if($f!="."&& $f!=".."){
	   $i++;
	   

	   	   //获取文件的后缀   wen.djj.mp3
	   $arr=explode(".",$f);
	   $hz=$arr[count($arr)-1];
	   
	   //输出序号
	     echo "<tr>";
	     echo "<td>{$i}</td>";
		 
	
			 
		 if($hz=='mp4'|| $hz=='MP4'){
		      echo "<td><a href='./uploads/{$f}'><img  src='./file/movie.jpg' width='100' height='100'/></a></td>";
		 }else if($hz=='doc'){
		      echo "<td><a href='./uploads/{$f}'><img  src='./file/word.jpg' width='100' height='100'/></a></td>";
		 }else if($hz=='txt'){
		      echo "<td><a href='./uploads/{$f}'><img  src='./file/wendang.jpg' width='100' height='100'/></a></td>";
		 }else if($hz=="mp3"){
		      echo "<td><a href='./uploads/{$f}'><img  src='./file/music.jpg' width='100' height='100'/></a></td>";
		 }elseif($hz=='rar'){
		      echo "<td><a href='./uploads/{$f}'><img  src='./file/yasuo.jpg' width='100' height='100'/></a></td>";
		 }else{
		      echo "<td><a href='./uploads/{$f}'><img src='./uploads/{$f}' width='100' height='100'/></a></td>";
		 }
		 
		 
		 echo "<td>".$f."</td>";
		 
		 
		 //输出文件的大小
		  if(filesize($dirfile)<1204){
		    echo"<td>$c B</td>";
		 }elseif(filesize($dirfile)>1048576){
		    echo "<td>$e MB</td>";
			}else{
		    echo "<td>$b kB</td>";
			}
		
          //输出文件的类型		
		 echo "<td>".filetype($dirfile)."</td>";
		 
		 //输出文件名
		 date_default_timezone_set("PRC");
	     echo "<td>".date("Y-m-d H:i:s",filectime($dirfile))."</td>";
	     echo "<td><a href='download.php?name={$f}'>下载</a>,<a href='dili.php?name={$f}'>删除</a></td>";
	     echo "</tr>";
	    }
	   }
	   //关闭目录
	   closedir($dir);  
	   ?>
	</table>
  </body>
</html>