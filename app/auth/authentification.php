<?php
    require_once '../repositories/database.php';

    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];

    $user = $_SESSION['username'];
    
    
    $db = new Database();
    $sql = "SELECT * FROM users WHERE username = :user and userPass = :userPass";
    $stmt = $db->connectDB()->prepare($sql);
    $stmt->bindParam(":user" , $user , PDO::PARAM_STR);
    $stmt->bindParam(":userPass" , $_SESSION['password'] , PDO::PARAM_STR);
    try {
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    if (!$row) {
        Redirect('../views/login.php' , false);
    }else {
        Redirect("../../public/index.php");
        
    }

?>