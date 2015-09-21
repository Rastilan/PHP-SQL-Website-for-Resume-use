<?php
require 'connections.php';
?>
<html>
    <head><link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" /><title>Signup</title></head>
    <body>
        <div id="wrap">
		      <ul class="navbar">
			     <li><a href="index.php">Trove Traders</a></li>
			     <li><a href="#">Trading</a>
				    <ul>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				    </ul>         
			     </li>
			     <li><a href="#">Prices</a>
				    <ul>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				    </ul>         
			     </li>
			     <li><a href="#">Community</a>
				    <ul>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				    </ul>         
			     </li>
			     <li><a href="#">extra</a>
				    <ul>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				    </ul>         
			     </li>
			     <li><a href="#">extra</a>
				    <ul>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				       <li><a href="#">....</a></li>
				    </ul>         
			     </li>
		      </ul>
    </div>
        <br />
        <br />
        <br />

<?php       

    if(isset($_POST['register'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $storePassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
    
    $sql = $con->query("INSERT INTO members (username, email, password)Values('{$username}', '{$email}', '{$storePassword}')");
    }
?>
       
     <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="signup.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="text" id="password"></td>
</tr>
<td>Email</td>
<td>:</td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="register" value="register"></td>
</tr>
</table>


</body>
</html>