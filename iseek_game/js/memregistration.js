$(document).ready(function() {
$("#register").click(function() {
var name = $("#name").val();
var pnumber = $("#pnumber").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
if (name == '' || pnumber=='' || password == '' || cpassword == '') {
alert("Please fill all fields...!!!!!!");
} else if ((password.length) < 8) {
alert("Password should atleast 8 character in length...!!!!!!");
} else if (!(password).match(cpassword)) {
alert("Your passwords don't match. Try again?");
} else {
$.post("memregister.php", {
name1: name,
pnumber1: pnumber,
password1: password
}, function(data) {
if (data == 'You have Successfully Registered.....') {
$("form")[0].reset();
}
alert(data);
});
}
});
});