
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sing in </title>
    <style>
        body{
            font-family: "Roboto", sans-serif;
            
        }
        input{
        background-color: whitesmoke ;
        width: 200px;
        padding: 8px;
        margin-top: 5px;
        font-family: "Roboto", sans-serif;
       
        font-size: 17px;
        font-weight: bold;
    }
    label{
        color: black;
        font-family: "Roboto", sans-serif;
        
    }
    textarea{
        width: 200px;
        padding: 13px;
    }
    a{
                width: 40px;
                border: 2px black ;
                padding: 4px;
                margin: 4px;
                border:1px solid ;
                background-color: skyblue;
                border-radius: 60px;
                text-decoration: none;
                font-family: "Roboto", sans-serif;
    }

    </style>
</head>
<body>
    <center>
    <form action="" method="post"  enctype="multipart/form-data">
    <h2> Sign in </h2>
    
    <label for="">name:</label><br>
    <input type="text" name="name" placeholder="name"><br><br>
    <label for="">user:</label><br>
    <input type="text" name="user" placeholder="enter user name"><br><br>
    <label for="">password:</label><br>
    <input type="password" name="pass" ><br><br>
    <input type="submit" name="upload" value="sign in"><br><br>
    
       
    </form>
    </center>
<?php

$conn = new mysqli("localhost", "root", "", "computer");

// التأكد من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['name']) && isset($_POST['user']) && isset($_POST['pass'])) {
    $NAME = $_POST['name'];
    $USER = $_POST['user'];
    $PASS = $_POST['pass'];

    $errors = [];

    // التحقق من أن أول حرف Capital
    if (!preg_match('/^[A-Z]/', $USER)) {
        $errors[] = "Email must start with a capital letter.";
    }

    // التحقق من وجود @ في الإيميل
    if (strpos($USER, '@') === false) {
        $errors[] = "The email must contain@.";
    }

    // التحقق من أن الباسوورد أكثر من 8 أحرف ويحتوي على أرقام
    if (strlen($PASS) <= 8) {
        $errors[] = "Password must contain 8 letters.";
    }
    if (!preg_match('/\d/', $PASS)) {
        $errors[] = "Password must contain one number.";
    }

    // إذا ما في أخطاء، نفذ الإدخال
    if (empty($errors)) {
        $sql = "INSERT INTO client (idcl, namecl, usercl, passcl) VALUES (NULL, '$NAME', '$USER', '$PASS')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel enregistrement créé avec succès.";
            header("Location: login.php");
            exit;
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // عرض الأخطاء
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}


?>















    <!-- <?php
// $conn = new mysqli("localhost", "root", "", "computer");
// if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
// if(isset($_POST['name'])){
//     $NAME=$_POST['name'];
// $USER=$_POST['user'];
// $PASS=$_POST['pass'];
//        $sql = "INSERT INTO client (idcl,namecl,usercl,passcl) VALUES ('id','$NAME','$USER','$PASS')" ;
//      mysqli_query($conn,$sql);
    
//   // Exécuter la requête
//        if ($conn->query($sql) === TRUE) {
//        echo "Nouvel enregistrement créé avec succès";
//        } else {
//        echo "Erreur: " . $sql . "<br>" . $conn->error;
//        }
//                   header('location:login.php');
//     }
?> -->
<!-- <?php
          /* The commented out code block you provided is an attempt to insert a new record into a
          database table named `product`. Let's break down the code block step by step: */
            // if(isset($_POST["name"])){
            // // Connexion à la base de données
            // extract($_POST);
            //         $conn = new mysqli("localhost", "root", "", "computer");
            //         // Vérifier la connexion
            //         if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
            //         // Requête INSERT
            //         $sql = "INSERT INTO product (idpr)    VALUES ('idpr')";
            //         // Exécuter la requête
            //         if ($conn->query($sql) === TRUE) {
            //         echo "Nouvel enregistrement créé avec succès";
            //         } else {
            //         echo "Erreur: " . $sql . "<br>" . $conn->error;
            //         }
            //         // Fermer la connexion
            //         $conn->close();
            // }
            ?> -->
</body>
</html>