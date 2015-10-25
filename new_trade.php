<?php
require 'Includes/connections.php';
?>
<?php
session_start();

$result = $con->query("SELECT * FROM items");
$row = $result->fetch_array(MYSQLI_BOTH);
$itemNamesArray = $row['itemid'];
?>
<?php
if (isset($_POST['post'])) {
    $_SESSION['itemNameAutoComplete'] = $_POST['itemNameAutoComplete'];
    $itemSelected = $_POST['itemNameAutoComplete'];
}
else {
    $_POST['itemNameAutoComplete'] = 'test';
    $itemSelected = '';
}

if (isset($_POST['posttrade'])) {
    $_SESSION['itemprice'] = $_POST['itemprice'];
    $itemprice = $_POST['itemprice'];
}
else {
    $itemprice = '';
}
?>
<html>
<head>

<title>Trovian Outpost!</title>
 
        <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script language="JavaScript" type="text/javascript">
            $(document).ready(function ($) {
                $("#itemNameAutoComplete").autocomplete({
                    source: 'itemnameautocomplete.php',
                    minLength: 1,

                });
            });
        </script>


</head>
<body>

  <!-- Top of page Navbar -->
   <?php include 'navbar.php'; ?>
   
   
        <br />
    <br />
        <br />
        <br />
 <?php 
 if(isset($_SESSION["username"])) {
 echo '
    <form action="" method="post" id="formPost">
        Item : <input type="text" placeholder="Item Name" id="itemNameAutoComplete" class="ui-autocomplete-input" autocomplete="off" name="itemNameAutoComplete"/>
        <input type="submit" name="post" value="post">
    </form>
    ';
}
else { echo 'You need to log in before you can make a trade!'; }
?>



<?php
if (isset($_POST['post'])) {
    if ($data = $con->query("SELECT * FROM items WHERE itemname LIKE '%$itemSelected%'")) {
        while($row = mysqli_fetch_array($data)) {
            $itemID = htmlentities(stripslashes($row['itemid']));
            $itemName = htmlentities(stripslashes($row['itemname']));
            $itemDesc = htmlentities(stripslashes($row['itemdesc']));
            $itemType = htmlentities(stripslashes($row['itemtype']));
            $itemRecPrice = htmlentities(stripslashes($row['itemrecommendedpriceflux']));
            $itemImage = htmlentities(stripslashes($row['itemimage']));
            $itemReqLevel = htmlentities(stripslashes($row['itemrequiredlevel']));
            
            $_SESSION['itemID'] = $itemID;
            
                
        }
    }
}

$con->close();
if(isset($_POST['post'])){
    if(strlen($itemSelected) > 1 && $itemSelected == $itemName){
        echo '<br />' . 'You have selected ' . $itemSelected . ' How much would you like to sell this item for?';
        echo '<br />';
        echo '<form action="" method="post" id="posttrade">';
        echo 'Sell for: <input name="itemprice" type="text" id="itemprice">';
        echo '<br />';
        echo '<input type="submit" name="posttrade" value="Post Trade">
        </form>';
        

    }
    else{
        echo "You didn't select anything!";
        
    }
}

?>

<?php       
require 'Includes/connections.php';
    if(isset($_POST['posttrade'])) {
            $fluxAmount = $_POST['itemprice'];
            if($fluxAmount > 1000000000){
                echo $fluxAmount . " Thats a bit much.. dontcha think?";
            }
            else if($fluxAmount < 1){
            echo "We have giveaways elsewhere on the site! Go donate the item there!";
            }
            else {
                if(isset($_SESSION["username"])) {
                    $username = $_SESSION["username"];
                        if(isset($_SESSION['itemID'])) {
                            $itemID = $_SESSION['itemID'];
                            $sql = $con->query("INSERT INTO trades (username, datetime, itemid, fluxamount)Values('{$username}', NOW(), '{$itemID}', '{$fluxAmount}')");
                            }
                            else { echo "Was an item not selected?"; }
                    }
                else { echo "Are you not logged in?"; }
    
            }
    
          
    }
?>



</body>
</html>