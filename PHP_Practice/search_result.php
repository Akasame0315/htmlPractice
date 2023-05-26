<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ch08-07-用mysql_fetch_assoc( )函式取得某一筆資料的內容</title>
</head>
<body>
<?php
  $content = $_POST["content"];
  $db_link = @mysql_connect("localhost", "root", "eee12345")
             or die("MySQL伺服器連結失敗!<br>");  //如果連結失敗，則終止程式執行，並顯示連結失敗的訊息
  $select_db = @mysql_select_db("test");
  mysql_query("SET NAMES 'utf8'"); 
  mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
  mysql_query("SET CHARACTER_SET_RESULTS=utf8");
	echo "<table border = '1'><tr align='center'>";
    $sql_query="select * from board where content = '$content'";
    //echo $sql_query."<br/>"; // for debugging 
    $result = mysql_query($sql_query);
    if(mysql_fetch_assoc($result) > 0){
			$result = mysql_query($sql_query);
			for($i=0; $i<mysql_num_fields($result); $i++)
			{
			  echo "<td>".mysql_fetch_field($result, $i)->name."</td>";
			}
			echo "</tr>";

			while($row = mysql_fetch_assoc($result))
			{ 
			  echo "<tr>";
	      echo "<td>".$row["id"]."</td>";
			  echo "<td>".$row["name"]."</td>";
			  echo "<td>".$row["content"]."</td>";
			  echo "<td>".$row["creatTime"]."</td>";
			  echo "<tr/>";
			}
    }
		else{
			echo "查無資料";
		}
		echo "</table>";
?>
<br/>
<a href="mysql_fetch_row.php">看所有留言</a>&nbsp;&nbsp;
<a href="search.html">重新搜尋</a>
</body>
</html>