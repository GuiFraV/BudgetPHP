<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Budget PHP</title>
</head>
<body>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">        <input type="text" name="desc">
        <input type="number" name="montant">
        <input type="date" name="date">
        <button>SEND</button>
    </form>


    <?php 

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $description = filter_input(INPUT_POST, "desc");
            $montant = filter_input(INPUT_POST, "montant");
            $date = filter_input(INPUT_POST,"date");
            $revenu = 1200;

            var_dump($date);

            echo "
                <table>
                    <tr>
                        <td>Description</td>                    
                        <td>Montant</td>
                        <td>Date</td>
                    </tr>

                    <tr>
                        <td>" . $description . "</td>
                        <td>" . $montant . "€</td>
                        <td>" . $date . "</td>
                    </tr>

                    <tr>
                        <td> Revenus </td>
                        <td>" . $revenu . "€</td>
                    </tr>
                </table>

            ";



        }
    
    
    ?>
    
</body>
</html>