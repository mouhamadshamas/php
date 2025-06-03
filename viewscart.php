<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Cart</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .background {
            padding: 40px;
            background: #fff;
            max-width: 1000px;
            margin: 40px auto;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .invoice h2,
        .payment-methods h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        .table th,
        .table td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #34495e;
            color: white;
        }

        .table td {
            background-color: #f9f9f9;
        }

        a.b {
            background-color: #e74c3c;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        a.b:hover {
            background-color: #c0392b;
        }

        /* Payment Methods */
        .payment-methods {
            text-align: center;
        }

        .payment-methods form,
        .cash {
            display: inline-block;
            width: 220px;
            height: 220px;
            text-align: center;
            margin: 20px;
            padding: 20px;
            border: 2px solid #ecf0f1;
            border-radius: 10px;
            transition: transform 0.3s ease;
            background-color: #fafafa;
        }

        .payment-methods form:hover,
        .cash:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .payment-methods img {
            max-width: 100%;
            height: auto;
            cursor: pointer;
        }

        .cash img {
            width: 80px;
            margin-bottom: 10px;
        }

        h3 {
            margin-top: 10px;
            font-weight: normal;
        }
      .a {
    display: block;
    margin-top: 12px;
    color: #007bff;
    text-decoration: none;
    background-color:rgb(16, 33, 64);
    color: #fff;
    border: 2px;
    height:25px;
    width: 80px;
    text-align: center;
}

.a:hover {
  display: block;
   text-decoration: none;
    
     background-color:rgb(11, 118, 123);
}

    </style>
</head>
<body>

<div class="background">
    <div class="invoice">
        <h2>Your Cart</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name product</th>
                    <th>Price product</th>
                    <th>Delete product</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // اتصال بقاعدة البيانات هنا
                $con = mysqli_connect("localhost", "root", "", "computer");
                $result = mysqli_query($con, "SELECT * FROM cart");

                $total = 0;
                while($row = mysqli_fetch_array($result)) {
                    $total += $row['pricecart'];
                    echo "
                    <tr>
                        <td>{$row['namecart']}</td>
                        <td>{$row['pricecart']} $</td>
                        <td><a href='deletecart.php?id={$row['idcart']}' class='b'>delete</a></td>
                    </tr>";
                }

                echo "
                <tr>
                    <td style='font-weight:bold;'>Total</td>
                    <td style='font-weight:bold;' colspan='2'>{$total} $</td>
                </tr>";
                ?>
            </tbody>
        </table>
    </div>
    <div class="a">
       <a href="index.php" class="a">Products</a>
    </div>
   
    <div class="payment-methods">
        <h2>Select Payment Method:</h2>

        <!-- PayPal -->
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="">
            <input type="hidden" name="item_name" value="Cart Purchase">
            <input type="hidden" name="amount" value="<?php echo $total; ?>">
            <input type="hidden" name="currency_code" value="USD">
            <input type="image" src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_74x46.jpg" border="0" name="submit" alt="PayPal">
           
        </form>
        
        <!-- Cash -->
        <div class="cash">
            <img src="https://cdn-icons-png.flaticon.com/512/2331/2331946.png" alt="Cash Icon" class="icon-small">
            <h3>Please prepare the cash</h3>
        </div>
    </div>
</div>

</body>
</htm