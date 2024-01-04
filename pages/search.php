<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/search.css">
</head>

<body>
    <main>
        <?php include '../statics/navbar.php';
        include "../statics/connexion.php";
        ?>

        <?php
        if (isset($_POST["btn_send"])) {
            echo '<div class="alert alert-warning mt-3" role="alert">';
            echo '  Automatic message sent, the player will contact you.';
            echo '</div>';
        } else {
            echo "";
        }
        ?>

        <h1 style="text-decoration:underline; text-align:center;margin-bottom:20px;margin-top:20px;">Search for other
            players</h1>

        <!--SEARCH-->
        <form id="form_1" action="search.php" method="post">
            <!--Sport Dropdown-->
            <label class="label" for="sport">Sport:</label><br>
            <select class="select" name="sport" id="sport">
                <?php
                $result = mysqli_query($connexion, "SELECT name FROM sport;");
                while ($row = mysqli_fetch_assoc($result)) {
                    $sportName = $row["name"];
                    echo "<option value='$sportName'>$sportName</option>";
                }
                ?>
            </select><br>

            <!--Level Dropdown-->
            <label class="label" for="level">Level:</label><br>
            <select name="level" class="select" id="level">
                <option value="beginner">beginner</option>
                <option value="intermediate">intermediate</option>
                <option value="expert">expert</option>
            </select>

            <br><br><input type="submit" class="button" name="search_button" value="Search"><br><br>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search_button"])) {

            $sport = $_POST["sport"];
            $level = $_POST["level"];

            $sql = "SELECT * FROM users WHERE users.sport = '$sport' AND users.level = '$level'";
            $result = $connexion->query($sql);

            if ($result->num_rows > 0) {
                echo '<div class="container">';
                echo '<div class="row">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card">';
                    echo '    <div class="card-body">';
                    echo "        <h5 class=\"card-title\">{$row['username']}</h5>";
                    echo "        <p class=\"card-text\">Email: {$row['email']}</p>";
                    echo "        <p class=\"card-text\">Sport: {$row['sport']}</p>";
                    echo "        <p class=\"card-text\">Level: {$row['level']}</p>";
                    echo '<form id="form_2" action="search.php" method="post">';
                    echo '    <input type="hidden" name="recipient_username" value="' . $row['username'] . '">';
                    echo '    <button type="submit" name="btn_send" class="btn btn-dark">Send Message</button>';
                    echo '</form>';
                    echo '    </div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            } else {
                echo "<p class=\"label\">No users found with these choices.</p>";
            }
        } else {
            echo "<p class=\"label\">Please make a choice.</p>";
        }
        ?>

    </main>
    <?php include '../statics/footer.php'; ?>
</body>

</html>