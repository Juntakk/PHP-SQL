<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/products.css">
</head>

<body>
    <main>
        <?php
        include "../statics/navbar.php";
        include "../statics/connexion.php"; ?>
        <h1>All products</h1>

        <form action="products.php" method="post" style="text-align:center; margin-top:40px; margin-bottom:40px;">
            <label for="product_name" style="font-weight:bold; font-size:20px;">Search: </label>
            <input type="text" name="product_name" style="background-color:burlywood;">
            <input type="submit" name="search_btn" class="search_btn" value="Search">
        </form>


        <?php
        session_start();
        function displayProducts($result)
        {
            echo '<div class="container">';
            echo '<div class="row">';
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3">';
                    echo '<div class="product-card">';
                    echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>$' . $row['price'] . '</p>';
                    echo '<form method="post" action="cart.php">';
                    echo '<input type="hidden" name="product_id" value="' . $row['products_id'] . '">';
                    echo '<input type="submit" name="addToCart" value="Add to Cart">';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            echo '</div>';
            echo '</div>';
        }

        // Search logic
        $product_name = isset($_POST["product_name"]) ? $_POST["product_name"] : null;
        $search_btn = isset($_POST["search_btn"]);

        if ($search_btn) {
            $_SESSION['search_state'] = true;
        } else {
            $_SESSION['search_state'] = false;
        }
        if ($search_btn) {
            if (empty($product_name)) {
                $search_query = "SELECT products_id, name, price, image_path FROM products ";
                $search_result = $connexion->query($search_query);
                displayProducts($search_result);
            } else {
                $sql = "SELECT products_id, name, price, image_path FROM products WHERE name = '$product_name';";
                $result = $connexion->query($sql);
                displayProducts($result);
            }
        }

        if (isset($_POST["addToCart"])) {
            echo '<script>window.location.href = "./products.php";</script>';
        }

        $connexion->close();
        ?>

    </main>
    <?php
    include "../statics/footer.php";
    ?>
</body>

</html>