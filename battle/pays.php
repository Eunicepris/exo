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
  <h2>Table des Pays de l'Afrique</h2>
<form class="form-group">
    <input class="from-control" name="ville1" placeholder="Entrez un nom">
     <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <input class="from-control" name="ville1" placeholder="Entrez un nom">
      <button class="btn btn-primary">Ajouter 3 villes</button>
      
  </form>
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Nombre de Villes</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        require 'database.php';
        $db = Database::connect();
        $statement = $db->query('SELECT p.nom as nom, p.superficie as superficie, (select count(v.id) as compte from villes as v where p.id = v.id_pays) as nombre from pays as p
        ');
        while($pays = $statement->fetch())
        {
            echo '<tr>';
                echo '<td>'. $pays['nom'] .'</td>';
                echo '<td>'. $pays['superficie'] .'</td>';
                echo '<td>'. $pays['nombre'] .'</td>';
            echo '</tr>';
        }
        
        ?>

    </tbody>
  </table>
</div>

</body>
</html>
