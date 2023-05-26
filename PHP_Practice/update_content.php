<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
</head>
<body>


<?php
	$id = $_POST["id"];
	$update_content = $_POST["content"];
	// echo $id;
	// echo "<br/>";
	// echo $update_content;

	$db_link = @mysql_connect("localhost", "root", "eee12345")
             or die("MySQL伺服器連結失敗!<br>");  //如果連結失敗，則終止程式執行，並顯示連結失敗的訊息
    $select_db = @mysql_select_db("test");
    mysql_query("SET NAMES 'utf8'"); 
  mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");

	$sql = "update board
				set content = '$update_content'
				where id = '$id'";
	$result = mysql_query($sql);

	// 影響了幾列
	if (mysql_query($sql, $db_link)) {
	echo "已成功修改資料！";
	} else {
	echo '查無此資料';
	}


?>
<br/>
<a href="mysql_fetch_row.php">看所有留言</a>&nbsp;&nbsp;
