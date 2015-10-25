<?php
require 'Includes/connections.php';
?>
<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
<title>TroveTraders.xyz | Home Page</title>
 
  


</head>
<body>
<!-- Top of page Navbar -->
   <?php include 'navbar.php'; ?>

      <br/>
         <br/>
            <br/>
               <br/>
                  <br/>
 <?php

function pullRecentTrades($tradeIDGET){
require 'Includes/connections.php';

$data = $con->query("SELECT * FROM trades WHERE tradeid = $tradeIDGET");
        $row = mysqli_fetch_array($data);
            $tradeTradeID = $row['tradeid'];
            $tradeItemID = $row['itemid'];
            $tradeDatetime = $row['datetime']; 
            $tradeUsername = $row['username'];
            $tradeFluxAmount = $row['currencyamount'];
$itemData = $con->query("SELECT * FROM items WHERE itemID = '$tradeItemID'");
        $itemDataRow = mysqli_fetch_array($itemData);
             $itemDataName = $itemDataRow['itemname'];
             $itemDataDesc = $itemDataRow['itemdesc'];
             $itemDataType = $itemDataRow['itemtype'];
             $itemDataReqLvl = $itemDataRow['itemrequiredlevel'];
$rowAmount = $con->query("SELECT * FROM trades WHERE datetime ORDER BY datetime DESC");
             $numOfRows = mysqli_num_rows($rowAmount);
             //                  0             1             2               3               4              5               6              7             8              9
             return array($tradeTradeID, $tradeItemID, $tradeDatetime, $tradeUsername, $itemDataName, $itemDataDesc, $itemDataType, $ItemDataReqLvl, $numOfRows, $tradeFluxAmount);


        }
        ?>
    <div id="recenttradesbackground">
    <div id="recenttradesleftside">
        <img src="Images/Items/<?php echo pullRecentTrades($_GET['tradeid'])[1]?>.png" id="recenttradesimage"/>
        <b id="recenttradeitemdataname">
            <?php echo pullRecentTrades($_GET['tradeid'])[4]?>
            <br/> Seller: <?php echo pullRecentTrades($_GET['tradeid'])[3]?>
            
        </b>

    </div>
    <div id="recenttradesmiddle">
    </div>
    <div id="recenttradesrightside">
    <b id="recenttradeitemprice">
        Selling for: <?php echo pullRecentTrades($_GET['tradeid'])[9]?></b>
    </div>
</div>

<br/><br/><br/><br/><br/><br/><br/><br/>
    <?php
    
    function pullComments($tradeItemID, $rowNumber){
require 'Includes/connections.php';
$data = $con->query("SELECT * FROM traderesponses WHERE tradeid = $tradeItemID ORDER BY commentdatetime LIMIT $rowNumber, 1");
        $row = mysqli_fetch_array($data);
            $commentTradeID = $row['tradeid'];
            $commentID = $row['commentid'];
            $comment = $row['comment']; 
            $commentUserName = $row['commentername'];
            $commentDateTime = $row['commentdatetime'];

$rowAmount = $con->query("SELECT * FROM traderesponses WHERE tradeid = '$tradeItemID'");
             $numOfRows = mysqli_num_rows($rowAmount);

             //                  0             1          2            3                   4             5 
             return array($commentTradeID, $commentID, $comment, $commentUserName, $commentDateTime, $numOfRows);


        }
        
        $i = 0;
while($i < pullComments($_GET['tradeid'], $i)[5]){ 
?>
<div id = "tradeoffercommentstitle">
</div>
 <div id="tradeoffercommentsbackground">

 <?php 
 
 echo pullComments($_GET['tradeid'], $i)[3] . " wants to sell." . "<br/>";
 echo pullComments($_GET['tradeid'], $i)[2]; 
 
 
 ?>
     <br/>
 </div>
 <?php
$i++;
} 
        //Make a Post! (Post Box and Submit Button)
     if(isset($_SESSION["username"])) {
 echo '
    <form action="" method="post" id="formPost">
        <input type="text" placeholder="Post" id="Post" name="Post"/>
        <input type="submit" name="postcomment" value="post">
    </form>
    ';
    $tradeid = $_GET['tradeid'];
    $comment = $_POST['Post'];
    $commentername = $_SESSION['username'];
}

else { echo 'You need to log in before you can make a trade!'; }
?>

    
    
    <?php if($_SESSION["username"] == pullRecentTrades($_GET['tradeid'])[3]){
    
}
    else{  }


require 'Includes/connections.php';
    if(isset($_POST['postcomment'])) {
        $sql = $con->query("INSERT INTO traderesponses (tradeid, comment, commentername, commentdatetime)Values('{$tradeid}', '{$comment}', '{$commentername}', NOW())");
        unset($_POST['postcomment']);
         }
    ?>
   
    </div>
</body>