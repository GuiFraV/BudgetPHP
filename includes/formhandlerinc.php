<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $description = $_POST["desc"];
    $montant = $_POST["montant"];
    $dateFromForm = $_POST["date"];

    $date = $dateFromForm; 

    try {
        require_once "dbhinc.php";

        $query = "INSERT INTO budget (Montant, Description, Date) VALUES (?, ?, ?);";
    
        $stmt = $pdo->prepare($query); 
        $stmt->execute([$montant, $description, $date]);

        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");

        exit;

    } catch (PDOException $e) {
        exit("Query failed : " . $e->getMessage());
    }

}else{

    header("Location: ../index.php");

}