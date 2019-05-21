<?php
    //trim()函数可以截去头尾的空白字符
	$username = trim($_POST['username']);
	$password =$_POST['password'];
	$cpassword =$_POST['cpassword'];
	$email = trim($_POST['email']);
	$pattern ="/^\w+([-+.]\w)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
	 //数据验证，empty()函数判断变量内容是否为空
	if (empty($username)|| empty($email)|| empty($password) || $cpassword != $password)
	{
	      echo '数据输入不完整<br>';
		  echo"<a href='register.html'>返回</a>";
	}
	elseif(strlen($password)<6 || strlen($password)>30)
		{
		   echo '密码必须在6到30个字符之间<br>';
		   echo"<a href='register.html'>返回</a>";
		}
	elseif(!preg_match($pattern,$email))
		{
		     echo 'Email格式不合法！<br>';
			 echo"<a href='register.html'>返回</a>";
		}
	else{
	        //创建数据库连接
	         $link =mysql_connect('localhost','root','') or die('Could not connect:'.mysql_error());
	         //echo 'connected successfulle';
	         mysql_select_db('register') or die('Could not select database');
	         //查询数据库。看填写的用户名是否已经存在
	         $sql ="SELECT * FROM 'user' WHRER 'username'='".$username."'";
	         $result = mysql_query($sql);
	         if ($result && mysql_num_rows($result)>0)
	        {
	           echo "<font color='red' size='5'> 该用户名已被注册，请换一个重试！
	           </font><br>\n";
	           echo $username."<br>\n";
	           echo $password ."<br>\n";
	           echo $cpassword."<br>\n";
	           echo $email."<br>\n";
	        }
			
	        else
	        {
	             //将用户信息插入到数据库的user表
	             $sql ="INSERT INTO user (username,pwd,email) VALUES";
	             $sql .="('$username','$password','$email')";
	             //echo $sql;
	             $result = mysql_query($sql);
	             if(!$result)
	            {
	                mysql_free_result($result);    //释放结果集
		           mysql_close($link);       //关闭俩接
		           echo '数据记录插入失败！';
		           exit;
	            }
		        echo "<font color='red' size='5'>恭喜您注册成功！</font><br>\n";
	            echo"<a href='login.html'>马上登录</a>";
	        }
			
	         mysql_close($link);     //关闭数据库连接
    }
?>
		  