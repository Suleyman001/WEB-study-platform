<a href="mainpage.php">MainPage</a>
<?php 
    if(!isset($_SESSION['user'])) echo '<a href="login.php">Login</a> '; 
    else echo '<a href="logout.php">Logout</a>'; 
    //print_r($_SESSION);
    echo "<h2>";
    if(isset($_SESSION['user']))
        echo "Logged in: ".$_SESSION['user']." ".$_SESSION['fn']." ".$_SESSION['ln'];
    else 
        echo "Not logged in";
    echo "</h2>";  
?>