<html>
  <head>
     <title>�ļ��ϴ�������</title>
  <style>
  
<!--
body{
  
}
.content{
  font-size:20px;  /*div��Χ������Ĵ�С*/
  font-weight:bold; /*div��Χ������Ӵ�*/
  padding-left:145px; /*div������߿�ľ���*/
}
-->

  </style>
  </head>
  
  <body>
    <h3 align="center">�ļ��ϴ�������</h3>
	
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="content">
	ѡ���ļ�:<input align="center" type="file" name="files">
	
	<input type="submit" value="�ϴ�">
	</div>
	</form>
	
	<table align="center" width="1060" border="0">
	   <tr align="light" bgcolor="#cccccc">
	     <th>���</th><th>�ļ�</th><th>�ļ���</th><th>�ļ���С</th><th>�ļ�����</th><th>���ʱ��</th><th>����</th>
	   </tr>
	   
	   <?php
	   //��Ŀ¼
	   $dir=opendir("./uploads");
	   //����Ŀ¼����������ļ�����Ϣ
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
	   

	   	   //��ȡ�ļ��ĺ�׺   wen.djj.mp3
	   $arr=explode(".",$f);
	   $hz=$arr[count($arr)-1];
	   
	   //������
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
		 
		 
		 //����ļ��Ĵ�С
		  if(filesize($dirfile)<1204){
		    echo"<td>$c B</td>";
		 }elseif(filesize($dirfile)>1048576){
		    echo "<td>$e MB</td>";
			}else{
		    echo "<td>$b kB</td>";
			}
		
          //����ļ�������		
		 echo "<td>".filetype($dirfile)."</td>";
		 
		 //����ļ���
		 date_default_timezone_set("PRC");
	     echo "<td>".date("Y-m-d H:i:s",filectime($dirfile))."</td>";
	     echo "<td><a href='download.php?name={$f}'>����</a>,<a href='dili.php?name={$f}'>ɾ��</a></td>";
	     echo "</tr>";
	    }
	   }
	   //�ر�Ŀ¼
	   closedir($dir);  
	   ?>
	</table>
  </body>
</html>