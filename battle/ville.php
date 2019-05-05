<?php
require 'database.php';
$db=Database::connect();

$villes=$db->prepare("SELECT * FROM villes");
				$villes->execute(array());
                $liste_ville=$villes->fetchAll();
                
$statement = $db->prepare('SELECT villes.id, villes.nom as nom, villes.superficie as superficie, pays.nom AS pays
 FROM villes JOIN pays ON pays.id = villes.id_pays JOIN continents ON continents.id = pays.id_continent
');

      $envoi = "";
      $id = "";
      $statement->execute([$_GET['id']]);
   $villes = $statement->fetchAll();
   if(isset($_POST['envoi']))
   {
      $statement = $db->prepare('UPDATE villes SET superficie = ? WHERE id = ?');
      $statement->execute([$_POST['supreficie'], $_POST['ville']]);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Table des habitants de l'Afrique</h2>
<form class="form-group">
    <input class="form-control" name="supreficie" placeholder="Entrez une Taille en km2">
    <div class="row">
        <div class="col-md-6">
        <select class="form-control">
                        <?php foreach($liste_ville as $ville): 
                        $ville_name = $ville['nom'];
                        $ville_id = $ville['id'];
                      ?>
                      <option value="<?= $ville['id']; ?>"><?= $ville['nom']; ?></option>
                      <?php endforeach; ?>
                        </select>
        </div>
        <div class="col-md-6">
                <button class="btn btn-primary" name="envoi">Modifier la superficie</button>

        </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Pays</th>
      </tr>
    </thead>
    <tbody>

     <?php foreach ($villes as $ville): ?>
      <tr>
          <td><?= $ville['nom'] ?></td>
          <td><?= $ville['superficie'] ?></td>
          <td>
             <?= $ville['pays'] ?>
          </td>
      </tr>
<?php endforeach ?> 
    </tbody>
  </table>
</div>

</body>
</html>
