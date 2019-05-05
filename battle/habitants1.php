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
  <table class="table">
    <thead>
      <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>solde</th>
        <th>quartier</th>
        <th>numero</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        require 'database.php';
        $db = Database::connect();
        $statement = $db->query('SELECT habitants.id, habitants.nom, habitants.prenom, habitants.solde, quartiers.nom AS quartier, habitants.numero FROM habitants INNER JOIN quartiers ON habitants.id = quartiers.id ORDER BY habitants.nom ASC');
        while($habitant = $statement->fetch())
        {
            echo '<tr>';
                echo '<td>'. $habitant['nom'] .'</td>';
                echo '<td>'. $habitant['prenom'] .'</td>';
                echo '<td>'. $habitant['solde'] .'</td>';
                echo '<td>'. $habitant['quartier'] .'</td>';
                echo '<td>'. $habitant['numero'] .'</td>';
                // echo '<td>'. $habitant['prenom'] .'</td>';
                echo '<td>';
                    echo '<a class="btn btn-danger" href="delate.php?id=' . $habitant['id'] . '">Suprimer</a>';
                echo '</td>';
            echo '</tr>';
        }
        
        ?>

      
    </tbody>
  </table>
</div>

</body>
</html>
