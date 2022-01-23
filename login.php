<?php
#virefier
if(isset($_POST['email']) && isset($_POST['pass']))
{
    require_once("conection.php");

    $sql ="SELECT id,nom,prenom,role,genre FROM utilisateur 
    where email LIKE '{$_POST['email']}' 
    AND   pass LIKE  MD5('{$_POST['pass']}')";

    $res = $pdo->query($sql);

    if($res!=null)
    {
        session_start();
        $_SESSION['utilisateur']= $res->fetch(PDO::FETCH_ASSOC);
        $title = "Home";
        header("Location: index.php");
    }

}

?>

<?php 
$title = "Login";
include "header.php";
?>

<center>
    <form action="" class="m-5" method="post">
    <table>
    <tr>
        <td class="p-2">Email</td>
        <td>
        <input type="email" class="form-control" name="email" required>
        </td>
    </tr>
    <tr>
        <td class="p-2">Password</td>
        <td>
        <input type="password" class="form-control m" name="pass" required>
        </td>
    </tr>


</table>
<input type="submit" class="btn btn-primary m-3 p-2" value="Login">
</form>
<br>
<span><span>click <a href="regester.php">here</a> to signup. </span>.</span>
</center>


<?php include "footer.php"?>