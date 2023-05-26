<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title></title>
</head>
<body>
<?php
  $db_link = @mysql_connect("localhost", "root", "eee12345")
             or die("MySQL伺服器連結失敗!<br>");  //如果連結失敗，則終止程式執行，並顯示連結失敗的訊息
  $select_db = @mysql_select_db("test");
  mysql_query("SET NAMES 'utf8'"); 
  mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	echo "<table border = '1'><tr align='center'>";
    $sql_query="SELECT * FROM board";
    $result = mysql_query($sql_query);
	
	for($i=0; $i<mysql_num_fields($result); $i++)
	{
	  echo "<td>".mysql_fetch_field($result, $i)->name."</td>";
	}
	echo "<td>功能</td>";
	echo "</tr>";

	$num = 1;
	while($row = mysql_fetch_row($result))
	{ 
	  $hideid = mysql_result($result,$num,id);
	  echo"<tr>";
	  for($j=0; $j<mysql_num_fields($result); $j++)
	  {
	    echo "<td>$row[$j]</td>";
	  }
	  echo "<td>
	  	<form name='form' method='post' action='delete_content.php'><button type='submit' name='id' value='$hideid'>刪除</button></form>
	  	<form name='form' method='post' action='update_content.php'>修改內容:<input name='content' type='text'><button type='submit' name='id' value='$hideid'>修改</button></form></td>";
	  $num += 1;
	  echo "<tr/>";
	}

  mysql_close($db_link);
?>
<br/>
<a href="search.html">搜尋留言</a>&nbsp;&nbsp;
<a href="add_content.html">新增留言</a>
</body>
</html>