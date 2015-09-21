<?php
require 'connections.php';
?>
<?php
        
        if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $result = $con->query("SELECT * FROM members WHERE username='$username'");
  
        $row = $result->fetch_array(MYSQLI_BOTH);
        
        if(password_verify($password, $row['password'])){
        
        session_start();
        
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        
        header('Location: index.php');
        }
        else {
            session_start();
            $_SESSION['logInFail'] = 'yes';
        }
    }
        ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
<title>Trovian Outpost!</title>
 
  


</head>
<body>
          <div id="wrap">
		      <ul class="navbar">
			     <li><a href="#">Trove Traders</a></li>
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
    <br />
    <br />
    <br />
   
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="login.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
<?php
    if(isset($_SESSION['logInFail'])) {
        echo ('<font color = "red">The Username or Password is incorrect</font>');
    }
?>
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
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="login" value="login"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

</body>
</html>