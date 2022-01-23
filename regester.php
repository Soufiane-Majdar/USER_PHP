<?php
#verification des donnee et creation du compte
if(isset($_POST["regester"]))
{
    require_once("conection.php");#

    $_POST['prenom']=ucfirst(strtolower($_POST["prenom"]));
    $_POST['nom']=ucfirst(strtolower($_POST["nom"]));
    $_POST['pass']= MD5($_POST['pass']);

    $sql ="INSERT INTO `utilisateur`( `email`, `pass`, `nom`, `prenom`, `role`, `genre`) 
    VALUES ('{$_POST['email']}','{$_POST['pass']}','{$_POST['nom']}','{$_POST['prenom']}','{$_POST['role']}','{$_POST['genre']}')";
    try{
        $pdo->query($sql);
        $secces ="registered successfully";
    }
    catch(Exception $e)
    {
        $error="email or username , is alredy used .";
    }
}

?>


<?php 
$title = "Signup";
include "header.php"
?>

<center>
    <?php 
    if($error)
    {
        echo '<div class="alert alert-danger col-6" role="alert">
                '.$error.'
            </div> <br />';
    }
    elseif($secces)
    {
        echo '<div class="alert alert-primary col-6" role="alert">
        '.$secces.'
    </div> <br />';
    }
    ?>
        <form action="" class="m-5" method="post">
        <table>
        <tr>
            <td class="p-2">Last Name</td>
            <td>
            <input type="text" class="form-control" name="nom" required>
            </td>
        </tr>
        <tr>
            <td class="p-2">First Name</td>
            <td>
            <input type="text" class="form-control" name="prenom" required>
            </td>
        </tr>
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
        <tr>
            <td class="p-2">Gender</td>
            <td >           
                <input class="form-check-input" type="radio" name="genre" value="M" id="m">
                <label class="form-check-label me-3" for="m">
                    M
                </label>

                <input class="form-check-input" type="radio" name="genre" value="F" id="f">
                <label class="form-check-label" for="f">
                    F
                </label>
            </td>
        </tr>
        <tr>
            <td class="p-2">Role</td>
            <td>
            <select class="form-select" name="role">
                <option>Client</option>
                <option>Admin</option>
             </select>
            </td>
        </tr>

    </table>
   <input type="submit" class="btn btn-primary m-3 p-2" name="regester" value="Signup">
</form>
        <br>
        <span>click <a href="login.php">here</a> to login. </span>
</center>


<?php include "footer.php"?>