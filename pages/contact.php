<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/contact.css">

    <script>
        function disableButton() {
            document.getElementById('btn_send').disabled = true;
        }
    </script>

</head>

<!--Contact-->

<body>
    <?php
    include "../statics/navbar.php";
    ?>
    <main>
        <h1 style="text-align: center; margin-top: 25px;margin-bottom: 25px;text-decoration: underline;">Contact us</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-4">
                    <img src="../Images/exp4.avif" class="rounded " id="img_contact" alt="">
                </div>
                <div class="col-lg-6 my-4">
                    <div class="contact-form ">
                        <form action="contact.php" method="post">
                            <label class="text-warning" for="name">Name</label>
                            <input type="text" id="name" name="name" required>

                            <label class="text-warning" for="email">Email</label>
                            <input type="email" id="email" name="email" required>

                            <label class="text-warning" for="message">Message</label>
                            <textarea id="message" name="message" rows="3" required></textarea><br><br>

                            <button type="submit" id="btn_send" name="btn_send" class=" btn1 rounded-3"
                                value="Send">Send</button>
                        </form>
                        <?php
                        if (isset($_POST["btn_send"])) {
                            echo '<div class="alert alert-warning mt-3" role="alert">';
                            echo '  Message sent, have a nice day!';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include "../statics/footer.php";
    ?>
</body>

</html>