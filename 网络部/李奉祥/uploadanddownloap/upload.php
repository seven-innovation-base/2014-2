<?php
 $up=$_FILES["files"];
 if($up["error"]>0){
 //��ȡ������Ϣ
   switch($up['error']){
   case 1:
         $info="<h2>�ϴ����ļ�������php.ini��upload_max_filesizeѡ�����Ƶ�ֵ</h2>";
		 break;
	case 2:
         $info="�ϴ����ļ�������html��MAX_FILE_SIZEѡ��ָ����ֵ";
		 break;
	case 3:
         $info="�ļ�ֻ�в����ϴ�";
		 break;
	case 4:
         $info="û���ļ��ϴ�";
		 break;
	case 6:
         $info="�Ҳ�����ʱ�ļ���";
		 break;
	case 7:
         $info="�ļ�д��ʧ��";
		 break;
	die("�ϴ��ļ�����:".$info);

   }
 }
 //�����ϴ��ļ��Ĵ�С
  if($up["size"]>5000000){
    die("�޷��ϴ������޶���С���ļ�");

  }
  
  //�����ϴ��ļ�������
  $typelist=array("jepg","jpg","png","MP4","mp3","doc","txt","rar","gif","mp4");
  $arr=explode(".", $_FILES["files"]["name"]);
	$hz=$arr[count($arr)-1];
  if(!in_array($hz,$typelist)){
    echo "�Ƿ����ϴ�����";
	exit;
  }
  //�����ϴ�����ļ����ļ����������ظ�����
  	$filepath="./uploads/";
	$randname=date("Y").date("m").date("d").date("H").date("i").date("s").rand(100, 999).".".$hz;
	//�ж��Ƿ���һ���ϴ��ļ�
   if(is_uploaded_file($up["tmp_name"])){
   //ִ���ļ��ϴ�
         if(move_uploaded_file($up["tmp_name"],"./uploads/".$randname)){
		    echo "<h2>�ϴ��ɹ�</h2><br>";
			echo "<a href='one.php'><h3>���</h3></a>";
		 }else{
		   die("�ϴ�ʧ��");
		 }
      }else{
	   echo "����һ���ϴ��ļ�!";
	  }

?>