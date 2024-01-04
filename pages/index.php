<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">

</head>

<body>
    <main>
        <?php
        include "../statics/navbar.php";
        include "../statics/connexion.php";

        // Retrieve email from the cookie
        $storedName = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';

        if (!empty($storedName)) {
            echo '<div class="alert alert-warning mt-3" role="alert">';
            echo '    Welcome ' . $storedName . ' !';
            echo '</div>';
        } else {
            echo "";
        }

        if (isset($_POST["btn_send"])) {
            echo '<div class="alert alert-warning mt-3" role="alert">';
            echo '  Automatic message sent, the player will contact you.';
            echo '</div>';
        } else {
            echo "";
        }
        ?>


        <div class="container c1">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h1>Sponsors</h1>
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/sport1.png" class="d-block w-100 rounded" alt="Image 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/sport2.png" class="d-block w-100 rounded" alt="Image 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/sport3.png" class="d-block w-100 rounded" alt="Image 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <!--Other players-->
                <div class="col-md-6">
                    <h1>
                        Other players
                    </h1>
                    <div class="container-fluid overflow-auto" style="max-height: 400px; width: 100%;">
                        <?php
                        $sql = "SELECT * FROM users";
                        $result = $connexion->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<form action = "index.php" method = "post">';
                                echo '<div class="card mb-3">';
                                echo '    <div class="card-body">';
                                echo "        <h5 class=\"card-title\">{$row['username']}</h5>";
                                echo "        <p class=\"card-text\">Email: {$row['email']}</p>";
                                echo "        <p class=\"card-text\">Sport: {$row['sport']}</p>";
                                echo "        <p class=\"card-text\">Level: {$row['level']}</p>";
                                echo '        <button class="btn btn-dark" name="btn_send">Send Message</button>';
                                echo '    </div>';
                                echo '</div>';
                                echo '</form>';
                            }
                        } else {
                            echo "No users found";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php
        $connexion->close();
        ?>
    </main>
    <?php include '../statics/footer.php'; ?>
</body>

</html>