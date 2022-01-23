<?php

    if(isset($_POST['logout']))
    {
        session_start();
        session_destroy();
        header('Location: login.php');
    }

?>
<?php 
$title = "Home";
include "header.php";
?>

<center>
    <?php
    session_start();

    if($_SESSION['utilisateur']['role']=="Admin")
    {
        echo "<br><h3>Welkom back ".$_SESSION['utilisateur']['nom']."</h3><br> ".$_SESSION['utilisateur']['role']."<br> <br>";

        require_once("conection.php");
        $sql = "SELECT * FROM utilisateur ";
        $statement = $pdo->query($sql);
    
        // get all personnes
        $personnes =$statement->fetchAll(PDO::FETCH_BOTH);
    
        if ($personnes) {
            echo '<table class="table m-3">';
            echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>Role</th> <th>Gender</th> </tr>";
            foreach ($personnes as $row ) {
                echo "<tr> <td>". $row["0"]."</td> <td>". $row["3"]."</td>  <td>". $row["4"]."</td> <td>". $row["5"]."</td> <td>". $row["6"]."</td> </tr>";
            }
            echo "</table>";
        } else {
        echo "0 results";
        }
       echo' <br>
        <br>
        <form action="" method="post">
            <input type="submit" class="btn btn-secondary m-3 p-2" name="logout" value="logout"> 
        </form>';
    }
    else if($_SESSION['utilisateur']['role']=="Client")
    {
        echo "<br><h3>Welkom back ".$_SESSION['utilisateur']['nom']."</h3><br> ".$_SESSION['utilisateur']['role']."<br> <br>";
    
        echo' <br>
        <br>
        <form action="" method="post">
            <input type="submit" class="btn btn-secondary m-3 p-2" name="logout" value="logout"> 
        </form>';
    }
    else  {
        echo '<br> <br><div class="alert alert-secondary col-7" role="alert">
        you dont have the write to see that!         <br>
        <span>click <a href="login.php">here</a> to login. </span>
        </div> <br />';
        }
    ?>

</center>


<?php include "footer.php"?>