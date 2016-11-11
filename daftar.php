<?php
		mysql_connect('localhost','codeigniter','codeigniter');
		mysql_select_db('web');
		$password = md5('password');
		mysql_query("INSERT INTO user('id_user','username','password','status') VALUES(1,'admin',$password,true");

		mysql_close();
?>