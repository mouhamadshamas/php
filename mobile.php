
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>Products Mobile</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
       
      body {
    font-family: 'Cairo', sans-serif;
    background: linear-gradient(to right, #eef2f3, #cfd9df);
    direction: rtl;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 20px;
}

h1 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 40px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

.product-card {
    margin: 40px;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 290px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    text-align: center;
}


.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 1.2em;
    color: #333;
    margin-bottom: 10px;
}

.card-text {
    font-size: 0.95em;
    color: #666;
    margin-bottom: 10px;
}

.text-success {
    color: #27ae60;
    margin-bottom: 10px;
    font-weight: bold;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.9em;
    transition: background-color 0.3s;
}

.btn-danger {
    background-color: #e74c3c;
    color: #fff;
}

.btn-danger:hover {
    background-color:rgb(127, 251, 255);
}
.btn-primary {
    background-color:rgb(14, 6, 252);
    color: #fff;
}

.btn-primary:hover {
    background-color:rgb(0, 0, 0);
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: #3498db;
  color: white;
  padding: 10px 16px;
  border: none;
  cursor: pointer;
  border-radius: 6px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 12px rgba(0,0,0,0.1);
  z-index: 1;
}

.dropdown-content a {
  color: #333;
  padding: 12px 16px;
  display: block;
  text-decoration: none;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
    </style>
</head>
<div class="dropdown">
  <button class="dropbtn">settings</button>
  <div class="dropdown-content">
    <a href="viewscart.php">views card</a>
    <a href="index.php">product</a>
    <a href="login.php">Logout</a>
  </div>
</div>

<body dir="rtl">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="container">
        <h1 class="text-center my-5">Products Mobile</h1>
        
        <div class="row">
        <?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computer";
// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

// استعلام SQL لاسترجاع المنتجات
$sql = "SELECT * FROM productmobile";
$result = mysqli_query($conn, $sql);

?>

            <?php

         
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-4">
                <div class="card product-card">
                <!-- <img src="<?php //echo $_SERVER['REQUEST_URI'] ?>images/<?php //echo htmlspecialchars($row['image']); ?>" class="card-img-top product-image" alt="<?php //echo htmlspecialchars($row['namepr']); ?>"> -->
                
              
                    
                

                    <img src="admin/<?php echo $row['imagemb'] ?>" >
                


                    <div class="card-body">
                    
                        <h5 class="card-title"><?php echo htmlspecialchars($row['namemb']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['descriptionmb']); ?></p>
                        <p class="text-success fw-bold">$PRICE: <?php echo htmlspecialchars($row['pricemb']); ?> </p>
                       
                        <a name="addto" class='btn btn-danger' href="valmobile.php?id=<?= $row['idmb'] ?>">Add to card</a>
                    </div>
                </div>
            </div>
            <?php
                }
            } else {
                echo "<p class='text-center'>NO Products</p>";
            }
            
            // إغلاق الاتصال
            mysqli_close($conn);
            ?>
            <center>
            <div>        
            </div>
            </center>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </form>
</body>
</html>