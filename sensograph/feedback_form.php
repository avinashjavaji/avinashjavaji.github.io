<?php
include 'connect.php';
//$ip = $_server['HTTP_CLIENT_IP'];
$date = date("Y-m-d H:i:s", time());
$location_data = file_get_contents('http://api.ipinfodb.com/v3/ip-city/?key=3d32e2ecf1074832ffe63f29bc3af0223404c181ed4b30958fba277fea36ee40&format=json');
$location_array = explode('" : "', $location_data);
foreach($location_array as &$value)
{
	$temp = explode('",', $value);
	$value = $temp[0];
}
$ip = $location_array[2];
$location = $location_array[7].', '.$location_array[6].', '.$location_array[5].', '.$location_array[8];
$query = "INSERT INTO feedback_form_sensograph (date_filled, ip, location, read_status, form_type, phone_model, android_version, form_body, user_name, user_email) VALUES ";
$query .="('".$date."', '".$ip."', '".$location."', '0', '".escape($_GET['form_type'])."', '".escape($_GET['phone_model'])."', '".escape($_GET['android_version'])."', '".escape($_GET['form_body'])."', '".escape($_GET['user_name'])."', '".escape($_GET['user_email'])."');";
echo $query;
mysql_query($query);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= 'From: <SensoGraph@androidtriangles.com>' . "\r\n";
$headers .= 'Cc: avinashjavaji@gmail.com' . "\r\n";
mail("androidtriangles@gmail.com","Sensograph Feedback","Phone Model: ".escape($_GET['phone_model']).
	"<br />Android Version: ".escape($_GET['android_version']).
	"<br />Form Body: ".escape($_GET['form_body']).
	"<br />User Name: ".escape($_GET['user_name']).
	"<br />User Email: ".escape($_GET['user_email']),$headers);
?>