<?php
	$db = mysql_connect("localhost","root","");
	mysql_select_db("testreg",$db) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'");
	$result = mysql_query("SELECT * FROM `metro`",$db) or die(mysql_error());
	$c = array();
	while($myrow = mysql_fetch_array($result)){
		$c[] = $myrow;
	}
	die(json_encode($c));

?>