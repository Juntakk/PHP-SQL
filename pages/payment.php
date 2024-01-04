<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyVnUXxgDTH8qx2hj9fQ9FpOp4jpUw1pX" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/payment.css">
</head>
<?php
include "../statics/navbar.php";
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class=" col-lg-6 col-md-8">
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="heading text-center">Please give us your money</h2>
                        </div>
                    </div>
                    <form class="form-card">
                        <div class="row justify-content-center mb-4 radio-group">

                            <div class="col-sm-4 col-4">
                                <div class='radio mx-auto' data-value="visa"> <img class="fit-image"
                                        src="https://i.imgur.com/OdxcctP.jpg" width="105px" height="55px"> </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div class='radio mx-auto' data-value="master"> <img class="fit-image"
                                        src="https://i.imgur.com/WIAP9Ku.jpg" width="105px" height="55px"> </div>
                            </div>
                            <div class="col-sm-4 col-4">
                                <div class='radio mx-auto' data-value="paypal"> <img class="fit-image"
                                        src="https://i.imgur.com/cMk1MtK.jpg" width="105px" height="55px"> </div>
                            </div> <br>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" name="Name">
                                    <label>Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="input-group"> <input type="text" id="cr_no" name="card-no"
                                        placeholder="0000 0000 0000 0000" minlength="19" maxlength="19"> <label>Card
                                        Number</label> </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group"> <input type="text" id="exp" name="expdate"
                                                placeholder="MM/YY" minlength="5" maxlength="5"> <label>Expiry
                                                Date</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group"> <input type="password" name="cvv"
                                                placeholder="&#9679;&#9679;&#9679;" minlength="3" maxlength="3">
                                            <label>CVV</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-12"> <input type="submit" value="Pay please"
                                    class="btn btn-pay placeicon">
                                <?php
                                echo '<script>window.location.href = "./confirmation.php";</script>';
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>