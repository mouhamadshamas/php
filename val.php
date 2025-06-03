<?php
$con = new mysqli("localhost", "root", "", "computer");
$ID=$_GET['id'];

$up=mysqli_query($con,"select *  from product where idpr= $ID");
$data = mysqli_fetch_array($up);

?>

<?php


if (!$con) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

// استعلام SQL لاسترجاع المنتجات
$sql = "SELECT * FROM product where idpr=$ID";
$result = mysqli_query($con, $sql);

?>
<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
?>
    <div class="card">
        <img class="product-img" src="admin/<?php echo $row['image'] ?>" alt="Product Image">
        <h2><?php echo $row['namepr'] ?></h2>
        <p>Price: <?php echo $row['price'] ?>$</p>

        <form action="cart.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['idpr'] ?>">
            <input type="hidden" name="name" value="<?php echo $row['namepr'] ?>">
            <input type="hidden" name="price" value="<?php echo $row['price'] ?>">
            <button name="addtocart" type="submit">Add to cart</button>
        </form>

        <a href="product.php">Back to products</a>
    </div>
<?php
    }
}
?>
<style>
    body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #f0f0f0, #ffffff);
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 30px;
}

.card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    width: 330px;
    margin: 20px;
    padding: 20px;
    text-align: center;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.03);
}

.product-img {
    width: 100%;
    height: 270px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

.card h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
}

.card p {
    font-size: 16px;
    color: #555;
    margin-bottom: 15px;
}

button {
    background: #28a745;
    border: none;
    padding: 10px 20px;
    color: white;
    font-size: 16px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
    width: 100%;
}

button:hover {
    background: #218838;
}

a {
    display: block;
    margin-top: 12px;
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
</style>

