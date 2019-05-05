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
  <h2>Table des continents</h2>      
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>superficie</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        require 'database.php';
        $db = Database::connect();
        $statement = $db->query('SELECT id, nom, superficie FROM continents');
        while($continent = $statement->fetch())
        {
            echo '<tr>';
                echo '<td>'. $continent['nom'] .'</td>';
                echo '<td>'. $continent['superficie'] .'</td>';
                echo '<td>';
                    echo '<a class="btn btn-primary" href="pays.php?id=' . $continent['id'] . '">Voir pays</a>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="ville.php?id=' . $continent['id'] . '">Voir villes</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="habitants1.php?id=' . $continent['id'] . '">Voir habitants</a>';
                echo '</td>';
            echo '</tr>';
        }
        
        ?>

      
    </tbody>
  </table>
</div>

</body>
</html>
