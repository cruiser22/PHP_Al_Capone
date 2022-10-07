<?php

require '../connec.php';
$pdo = new \PDO(DSN, USER, PASS);


$errors = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    if (empty($_POST['firstname'])) {
        $errors[] = 'The name is required'; 
    }
    if (empty($_POST['payment'])) {
        $errors[] = 'The payment is required';
    }
    if (!empty($_POST['firstname']) && strlen($_POST['firstname']) > 100) {
        $errors[] = 'The name should be less than 100 characters';
    
    }
    if (empty($errors)) {
        
        $query = 'INSERT INTO bribe (firstname, payment) VALUES (:firstname, :payment)';
        $statement = $pdo->prepare($query);
        $statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $statement->bindValue(':payment', $_POST['payment'], PDO::PARAM_INT);
        $statement->execute();
    }
}

$query = "SELECT * FROM bribe";
$statement = $pdo->query($query);
$payments = $statement->fetchAll(PDO::FETCH_ASSOC);
