<?php
//将db.sql复制到根目录，然后调用db.php
function get_sql_array(){
	$lines = file("db.sql");
	$stack = array();
	$tmp = '';
	foreach($lines as $line){
		$line=trim($line);
		if($line!="" && $line{0} != '/'){
			$start = substr($line,0,4);
			if($start == 'inse' || $start == 'DROP' && substr(strrev($line),0,1) == ";"){
				if($tmp != ""){
					array_push($stack,$tmp);
					$tmp = '';
				}
				array_push($stack,$line);
			}else{
				$tmp .= $line;
			}
		}
	}
	return $stack;
}

function db_file_execute($hostname,$dbname,$username,$pw){
	$conn = mysql_connect($hostname,$username,$pw) or die("无法连接数据库");
	mysql_query("set name 'utf8'");
	mysql_select_db($dbname,$conn) or die("无法连接到数据库");
	foreach(get_sql_array() as $sql){
		mysql_query($sql) or die(mysql_error());
	}
	//删除sql文件
	echo "success";
}


$hostname = 'localhost';
$dbname = 'jdcms';
$username = 'root';
$pw = '';
db_file_execute($hostname, $dbname, $username, $pw);
