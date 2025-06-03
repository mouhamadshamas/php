<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $conn = new mysqli("localhost", "root", "", "computer");

    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    $sql = "DELETE FROM cart WHERE idcart = $id";
    if ($conn->query($sql)) {
        echo "تم الحذف بنجاح!";
    } else {
        echo "خطأ في الحذف: " . $conn->error;
       
    }

    $conn->close();
    header("Location: viewscart.php");
    exit();
}
?>