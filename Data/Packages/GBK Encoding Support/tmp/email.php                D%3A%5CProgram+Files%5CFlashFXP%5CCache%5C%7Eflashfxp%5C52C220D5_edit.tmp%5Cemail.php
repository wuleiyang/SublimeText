<?php
	include "inc/conn.php";
	include "inc/smtp.class.php";
	function sendmail($smtpemailto,$title,$content){
		$rs=mysql_fetch_array(mysql_query("select * from sitinfo where id = 1;"));
		{
			$websmtp = $rs["websmtp"];
			$email = $rs["email"];
			$mailuser = $rs["mailuser"];
			$smtpport = $rs["smtpport"];
			$mailpassword = $rs["mailpassword"];
		}
		$smtpserver = $websmtp;//SMTP服务器
		$smtpserverport =25;//SMTP服务器端口
		$smtpusermail = $email;//SMTP服务器的用户邮箱
		$smtpemailto = $smtpemailto;//发送给谁
		$smtpuser = $mailuser;//SMTP服务器的用户帐号
		$smtppass = $mailpassword;//SMTP服务器的用户密码
		$mailsubject = $title;//邮件主题
		$mailbody = $content;//邮件内容
		$mailtype = "HTML";
		$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
		$smtp->debug = false;//是否显示发送的调试信息
		$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
	}
	for($i=0;$i<count($_POST['user']);$i++){
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE id = ".$_POST['user'][$i].";"));
		$email['email'][$i]=$user['name'];
		$projects=mysql_fetch_array(mysql_query("SELECT * FROM `project` WHERE id =".$_POST['xm'][$i].";"));
		$email['xm'][$i]=$projects;
		$email['name'][$i]=$user['truename'];
		if($_POST['pro_vip'][$i]=='1'){
			$update=mysql_query("UPDATE `subscription` SET fasong = 1 where userid = ".$_POST['user'][$i].";");
		}
	} 
	 for($i=0;$i<count($_POST['user']);$i++){
		$content="<DIV><includetail>&nbsp;</DIV><DIV><DIV>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <A href='http://test010.webthink.cc/default.html'><IMG src='http://set1.mail.qq.com/cgi-bin/download?sid=RQcoV8qX2vJZCg1Z&amp;upfile=tgDn7hyJEMO9rR%2F%2BaidU3KeWLF%2Blt58aier%2FyuQOPwZpzo6jjbYbCI0AZc4iAbNisJx1if2XOvTf6zGpHdkvyUxJjisRe1pnquw23GfcqXGKDP%2FNjEkl%2FY3cCkhEtOxj9ZP6gFkPFGM%3D' naturalh='78' naturalw='341'></A></DIV><DIV>&nbsp;</DIV><DIV>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <STRONG>尊敬的会员</STRONG>：<STRONG><FONT color=#ff0000>".$email['name'][$i]."</FONT></STRONG></DIV><DIV>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;您订阅的项目有新发布 ↓ ↓ ↓ ↓ ↓ ↓</DIV><DIV>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;项目主题<STRONG>【".$email['xm'][$i]['title']."】</STRONG></DIV><DIV><STRONG>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</STRONG>项目介绍：test</DIV><DIV>&nbsp;</DIV><DIV>&nbsp;</DIV><DIV>&nbsp;</DIV><DIV>&nbsp;</DIV><DIV>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<A href='http://".$_SERVER['HTTP_HOST']."/project_details.php?id=".$email['xm'][$i]['id']."'>详细信息</A>&nbsp;&nbsp;&nbsp; <A href='http://test010.webthink.cc/default.html?id=".$_POST['name'][$i]."'>进入官网</A>&nbsp; &nbsp; <A href='http://".$_SERVER['HTTP_HOST']."/Subscriptions.php?m=scpt'>修改订阅</A></DIV><DIV></DIV></includetail></DIV>";
		//<A href='http://".$_SERVER['HTTP_HOST']."/tuiding.php?id=".$_POST['user'][$i]."'>取消订阅</A>
		 
		sendmail($email['email'][$i],'威地投资信息快报 VD Newsletter',$content);
	}
	echo "<script>alert('订阅邮件已发送至邮箱！');history.back();</script>"; 
?>