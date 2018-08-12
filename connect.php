<?php
//For Server and Database on my comp
@mysql_connect("localhost", "android2_mysql", "android2_mysql") or die ("Could Not connect :(\n");
@mysql_select_db("android2_texter") or die ("Could not select the database :(\n");

function escape($string) {
	return mysql_real_escape_string($string);
}

date_default_timezone_set('Europe/London');

?>