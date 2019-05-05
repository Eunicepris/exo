<?php
require 'database.php';
$db = Database::connect();

if(!empty($_GET['id']))
{
    $id = verifyInput($_GET['id']);
}

if(!empty($_POST))

{


    $id = verifyInput($_POST['id']);
    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM habitants WHERE id=?");
    $statement->execute(array($id));
    $db = Database::disconnect();
    header("Location: habitants1.php");
}

function verifyInput($var)
{
    $var = trim($var);
    $var = stripcslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfert d'Argent</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
</head>
<body class="body">
   <div class="container admin">
   <div class="row">
   <h1 class=""><strong>Remove habitants</strong></h1>
   <form class= "form-group" action="delate.php" role="form" method="post">
   <input type="hidden" name="id" value="<?php echo $id; ?>">
   <p class="alert alert-warning">Êtes-vous sur de vouloir supprimer?</p>
   <div class="form-actions">
   <button type="submit" class="btn btn-warning">oui</button>
   <a class="btn btn-default" href="habitants1.php">non</a>
   </div>
   </form>
   </div>
   </div>
</body>
</html>