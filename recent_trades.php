<?php
require 'Includes/connections.php';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />



</head>
<body>
 <?php
function pullRecentTrades($rowNumber){
require 'Includes/connections.php';
$data = $con->query("SELECT * FROM trades WHERE datetime ORDER BY datetime DESC LIMIT $rowNumber, 1");
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
<?php 
//Creates all of the rows of recent trades to 10 or the max amount of rows that are present below 10.
$i = 0;
while($i < 10 && $i < pullRecentTrades($i)[8]){ ?>
<div id="recenttradesbackground">
    <div id="recenttradesleftside">
        <img src="Images/Items/<?php echo pullRecentTrades($i)[1]?>.png" id="recenttradesimage"/>
        <b id="recenttradeitemdataname">
            <?php echo pullRecentTrades($i)[4]?>
            <br/> Seller: <?php echo pullRecentTrades($i)[3]?>
            
        </b>

    </div>
    <div id="recenttradesmiddle">
    </div>
    <div id="recenttradesrightside">
    <b id="recenttradeitemprice">
        Selling for: <?php echo pullRecentTrades($i)[9]?></b>
       <a href="trade_offer.php?tradeid=<?php echo pullRecentTrades($i)[0]; ?>"><img src="Images/MakeOffer.png" id="recenttrademakeofferimage"/></a> 
    </div>
</div>





<?php
$i++;
} ?>
</body>
</html>