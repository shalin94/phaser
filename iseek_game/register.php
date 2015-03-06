<?php
$connection = mysql_connect("45.56.127.65:3306", "iseekreg", "iseekgame"); // Establishing connection with server..
if (!$connection) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
$db = mysql_select_db("registrationdb", $connection); // Selecting Database.
$name=$_POST['name1']; // Fetching Values from URL.
$email=$_POST['email1'];
$password= sha1($_POST['password1']); // Password Encryption, If you like you can also leave sha1.
// Check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing email(Remove unexpected symbol like <,>,?,#,!, etc.)
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
echo "Invalid Email.......";
}else{
$result = mysql_query("SELECT * FROM shgregistration WHERE email='$email'");
$data = mysql_num_rows($result);
if(($data)==0){
$query = mysql_query("insert into shgregistration(shg_name, shg_email, shg_password) values ('$name', '$email', '$password')"); // Insert query
if($query){
    
$to      = 'venkatn93@gmail.com';
$subject = 'Test ISEEK';
$message = 'Thank you for registration';
$headers = 'From: webmaster@example.com';
mail($to, $subject, $message, $headers);    
    
echo "You have Successfully Registered.....";
}else
{
echo "Error....!!";
}
}else{
echo "This email is already registered, Please try another email...";
}
}
mysql_close ($connection);



?>