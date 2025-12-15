<?php
include('db_connect.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (user_name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $firstname, $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "تم التسجيل بنجاح!";
        
    } else {
        echo "حدث خطأ أثناء التسجيل.";
    }
}
?>
