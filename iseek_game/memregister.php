<?php
$connection = mysql_connect("45.56.127.65:3306", "iseekreg", "iseekgame"); // Establishing connection with server..
if (!$connection) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db = mysql_select_db("registrationdb", $connection); // Selecting Database.
$name=$_POST['name1']; // Fetching Values from URL.
$pnumber=$_POST['pnumber1'];
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.


$result = mysql_query("SELECT * FROM memregistration WHERE mem_phone='$pnumber'");

$data = mysql_num_rows($result);
if(($data)==0){
$query = mysql_query("insert into shgregistration(mem_name, mem_phone, mem_password) values ('$name', '$pnumber', '$password')"); // Insert query
if($query){
echo "You have Successfully Registered.....";
}else
{
echo "Error....!!";
}
}else{
echo "This phone number is already registered, Please try another phone number...";
}

mysql_close ($connection);

?>
?>