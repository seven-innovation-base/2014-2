<?php
     function checkIllegalWord()
	 {
	      //定义不允许提交的SQL命令及关键字
		  $word  = array();
		  $words[] = " add ";
		  $words[] = " count ";
		  $words[] = " create ";
		  $words[] = " delete ";
		  $words[] = " drop ";
		  $words[] = " from ";
		  $words[] = " grant ";
		  $words[] = " insert ";
		  $words[] = " select ";
		  $words[] = " truncate ";
		  $words[] = " update ";
		  $words[] = " use ";
		  $words[] = " -- ";
		  //判断提交的数据中是否存在以上关键字，$_REQUEST中含有提交数据
		   foreach($_REQUEST as $strGot)
		   {
		      $strGot  = strtolower($strGot);  //转为小写
			  foreach($words as $word)
			  {
			       if (strstr($strGot,$word))
				   {
				        echo "您输入的内容含有非法字符！";
						exit;
					}
			  }
		   }
			 //foreach
	  }
	  checkIllegalWord();     //在文件被包含时即时自动调用
?>
			