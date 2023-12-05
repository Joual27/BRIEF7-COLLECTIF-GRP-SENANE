<?php
    require_once '../repositories/database.php';

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    

   
    $db = new Database();
    $sql = "SELECT * FROM users WHERE username = :user and userPass = :userPass";
    $stmt = $db->connectDB()->prepare($sql);
    $stmt->bindParam(":user" , $username , PDO::PARAM_STR);
    $stmt->bindParam(":userPass" , $password , PDO::PARAM_STR);
    try {
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    if (!$row) {
        $_SESSION["authError"] = "Invalid credentials . TRY AGAIN !";
        Redirect(APPROOT . 'views/login.php' , false);
    }else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        $userID = $row->userID;  
        $sql = "SELECT * FROM roleOfUser WHERE userID = $userID";

        $stmt = $db->connectDB()->prepare($sql);
        try {
            $stmt->execute();
            $roleOfuser = $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if ($roleOfuser->roleName === 'admin') {
            Redirect(APPROOT .'/views/admin/index.php' , false);
        }else {
            Redirect(APPROOT .'/views/client/index.php' , false);
        }
        
    }

?>