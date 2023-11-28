<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Budget PHP</title>
</head>
<body>

    <form action="includes/formhandlerinc.php" method="post">
        <input type="text" name="desc">
        <input type="number" name="montant">
        <input type="date" name="date">
        <button>SEND</button>
    </form>

    <?php 
        require_once "includes/dbhinc.php"; 

        try {
            $query = "SELECT * FROM budget"; 
            $stmt = $pdo->query($query);
            $total = 0;


            echo "<table>
                    <tr>
                        <th>Description</th>                    
                        <th>Montant</th>
                        <th>Date</th>
                    </tr>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $total += $row['Montant'];
                echo "<tr>
                        <td>" . htmlspecialchars($row['Description']) . "</td>
                        <td>" . htmlspecialchars($row['Montant']) . "€</td>
                        <td>" . htmlspecialchars($row['Date']) . "</td>
                    </tr>";
            }

            echo "</table>";

            echo "<p> Le montant total est de " . $total . " €</p>";

            $pdo = null;
            $stmt = null;

        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    ?>
    
</body>
</html>
