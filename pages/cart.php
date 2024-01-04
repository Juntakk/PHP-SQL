<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
    <?php include '../statics/navbar.php'; ?>

    <main>
        <div class="container">
            <?php
            include "../statics/connexion.php";

            if (isset($_POST['addToCart'])) {
                //Récupération du id du produit
                $productId = $_POST['product_id'];


                //Création de session
                if (!isset($_SESSION['cart'])) {
                    //Initiation de session
                    $_SESSION['cart'] = array();
                }
                $_SESSION['cart'][] = $productId;
            }

            //REMOVE FROM CART
            if (isset($_POST['products_id'])) {
                $productId = $_POST['products_id'];

                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($value == $productId) {
                        unset($_SESSION['cart'][$key]);
                        break;
                    }
                }
            }


            ?>
            <h1>Your Shopping Cart</h1>
            <div class="container overflow-auto mt-4">
                <div class="row">

                    <?php
                    $total_price = 0;

                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $productId) {
                            //Tous les produits qui ont le id récupéré par la session
                            $sql = "SELECT * FROM products WHERE products_id = $productId";
                            $result = $connexion->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo '<div class="col-lg-3">';
                                echo '    <div class="card">';
                                echo '        <div class="card-body">';
                                echo '            <form method="post" action="cart.php">';
                                echo "            <p class=\"card-text fw-bold\">{$row['name']}</p>";
                                echo "            <img class='rounded' height='85px' width='100px' src='{$row['image_path']}'/img>";
                                echo "            <p class=\"card-text\">{$row['price']}$</p>";
                                echo '                <input type="hidden" name="products_id" value="' . $row['products_id'] . '">';
                                echo '                <button type="submit" class="btn btn-warning w-100" name="removeFromCart">Remove</button>';
                                echo '            </form>';
                                echo '        </div>';
                                echo '    </div>';
                                echo '</div>';

                                $total_price = $total_price + $row["price"];
                            }
                        }
                    } else {
                        echo '        <li>Your cart is empty.</li>';
                    }
                    echo '</div>';
                    ?>
                </div><br>
                <div class="total_price">
                    <p>Total:
                        <?php echo $total_price . '$' ?>
                    </p>
                </div>
                <a id="btn_payment" href="../pages/payment.php">Confirm</a>
            </div>
    </main>
    <?php include '../statics/footer.php';
    ?>
</body>

</html>