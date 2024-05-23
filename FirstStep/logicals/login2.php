<?php
if(isset($_POST['username']) && isset($_POST['password'])) {
    try {
        // Connection
        $dbh = new PDO('mysql:host=localhost;dbname=dbfirststep', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');
        
        // Search for a user
		$sqlSelect = "select id, first_name, last_name from users where user_name = :usern and password = sha1(:pwd)";
		$sth = $dbh->prepare($sqlSelect);
		$sth->execute(array(':usern' => $_POST['username'], ':pwd' => $_POST['password']));
		$row = $sth->fetch(PDO::FETCH_ASSOC);

		if($row) {
		  $_SESSION['fn'] = $row['first_name']; 
		  $_SESSION['ln'] = $row['last_name']; 
		  $_SESSION['user'] = $_POST['username'];
		}  
    }
    catch (PDOException $e) {
        $errormessage = "Error: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
}
?>