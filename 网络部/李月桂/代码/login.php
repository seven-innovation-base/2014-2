<?php
/*文件功能：
 *加载防止SQL注入漏洞检查的代码
 */
require_once('function.php');
$username = trim($_POST['username']);    //取得客户端提交的用户名
$password = trim($_POST['pwd']);         //取得客户端提交的密码
if($username =="")
{
   // echo "请填写用户账号<br>";
     echo "<script type='text/javascript'>alert('请填写用户账号');location='login.html';
            </script>";
}
elseif($password =="")
{
     //echo "请填写用户密码<br><a href='login.php'>返回</a>";
    echo "<script type='text/javascript'>alert('请填写用户密码');location='login.html';</script>";   
}
else{
		  //创建数据库连接
		  $link =mysql_connect('localhost','root','') or die('Could not connect:'.mysql_error());
		  //echo 'connected successfulle';
	      mysql_select_db('register') or die('Could not select database');
		 //检查数据库连接
		 if(($_POST['username']==$username)&&($_POST['pwd']==$password))

        {
           //echo "验证成功！<br>";
            echo "<font color='red' size='5'>登录成功</font><br>\n";
			echo "<font color='red' size='5'>用户：".$username."</font><br>\n";
         }
         
        else{
        //echo "密码错误<br>";
        echo"<script type='text/javascript'>alert('密码错误');location='login.html';</script>";
		}
    }
?>