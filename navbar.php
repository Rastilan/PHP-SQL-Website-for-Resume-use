  <div id="wrap" dir="ltr">
        <ul class="navbar">
            <li><a href="index.php">Trove Traders</a></li>
            <li><a>Trading</a>
                <ul>
                    <li><a href="new_trade.php">New Trade</a></li>
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
        
           <?php
    if(isset($_SESSION['id'])) {
        echo ('<div id="signedin">Signed in as ' . $_SESSION["username"] . '</div>');
        echo ('<div id="signedin"><br /><a href="logout.php">Sign Out</a></div>');
    }
    else {
        echo ('<a href="login.php"> <img id="signin"  src="Images/loginbutton.png"> </a>');
    }
        ?>