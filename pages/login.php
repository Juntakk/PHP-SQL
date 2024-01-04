<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>
<?php
include "../statics/connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //LOGIN
    if (isset($_POST["login_btn"])) {
        $login_username = $_POST["username"];
        $login_password = $_POST["password"];

        if (empty($login_username) || empty($login_password)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Please fill in every field</div>';
        } else {
            $query = "SELECT username, password FROM users WHERE username = '$login_username';";
            $stmt = $connexion->query($query);

            if ($stmt->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($stmt)) {
                    $username = $row["username"];
                    $password = $row["password"];

                    if ($login_username === $username && $login_password === $password) {
                        setcookie("username", $login_username, time() + 5, "/");
                        echo '<script>window.location.href = "./index.php";</script>';
                        exit();
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">Wrong information</div>';
                    }
                }
            } else {
                echo '<div class="alert alert-warning mt-3" role="alert">No users found</div>';
            }
        }
    }

    //REGISTER
    if (isset($_POST["register_btn"])) {
        $level = $_POST["levels"];
        $register_username = $_POST["register_username"];
        $register_password = $_POST["register_password"];
        $register_email = $_POST["register_email"];
        $register_sport = $_POST["sport"];

        if (empty($register_email) || empty($register_username) || empty($register_password)) {
            echo '<div class="alert alert-danger mt-3" role="alert">Please fill in every field</div>';
        } else {

            $query = "INSERT INTO users (email, username, password, sport, level) VALUES (?, ?, ?, ?, ?);";
            $stmt = $connexion->prepare($query);
            $stmt->bind_param("sssss", $register_email, $register_username, $register_password, $register_sport, $level);
            $result = $stmt->execute();
            $stmt->close();

            if ($result) {
                echo '<div class="alert alert-danger mt-3" role="alert">Registration successful</div>';
            } else {
                echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $connexion->error . '</div>';
            }
            echo "";
        }
        echo "";
    }
    echo "";

    $connexion->close();
}
?>


<body>
    <form action="login.php" method="post">
        <div class="col-lg-6">
            <div class="login-box mt-5">
                <div class="login-snip">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                        class="tab">Login</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign
                        Up</label>

                    <div class="login-space">
                        <div class="login">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" type="text" class="input" name="username"
                                    placeholder="Enter your username">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" class="input" name="password" data-type="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" name="login_btn" value="Sign In">
                            </div>

                        </div>

                        <div class="sign-up-form">
                            <div class="group">
                                <label for="user" class="label">Username</label>
                                <input id="user" type="text" class="input" name="register_username"
                                    placeholder="Create your Username">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" class="input" name="register_password"
                                    data-type="password" placeholder="Create your password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input id="pass" type="text" class="input" name="register_email"
                                    placeholder="Enter your email address">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="group">
                                            <!--Sport-->
                                            <label class="label" for="sport">Sport:</label>
                                            <select class="select" name="sport" id="sport">
                                                <?php

                                                include "../statics/connexion.php";

                                                $result = mysqli_query($connexion, "SELECT name FROM sport;");
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $sportName = $row["name"];
                                                    echo "<option value='$sportName'>$sportName</option>";
                                                }

                                                mysqli_close($connexion);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--Level-->
                                    <div class="col-6">

                                        <div class="group">
                                            <label class="label" for="level">Level:</label>
                                            <select class="select" name="levels" id="levels">
                                                <option value="Beginner">beginner</option>
                                                <option value="Intermediate">intermediate</option>
                                                <option value="Expert">expert</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <input type="submit" class="button" name="register_btn" value="Sign Up">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>