<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/18f626dcdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/cart.style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Cart AZ CARS</title>
</head>

<body>
    <header>
        <a href="index.php" class="homeButton" id="home">
            <div class="returnHome">
                <span id="vroom">VROOOOM VROOOOOM</span>
            </div>
        </a>
    </header>
    <main>
        <div class="displayCar">


            <?php
            $jsonCart = file_get_contents('cart.json');
            $json = file_get_contents('items.json');
            $jsonData = json_decode($json, true);
            $soldeCart = 0;
            $cartList = json_decode($jsonCart, true);
            $pointer = 0;
            if (isset($_POST['delete'])) {
                unset($cartList[(int)$_POST['data']]);
                $cartList = array_values($cartList);
                file_put_contents("cart.json", json_encode($cartList));
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            foreach ($cartList as $cle => $value) {
                foreach ($jsonData["Automobile"] as $auto) {
                    if ($value == $auto["id"]) { ?>

                        <div class="cars" style="background-image: url(<?php echo $auto["img"] ?>)">
                            <?php


                            foreach ($auto as $key => $item) {
                                if ($key == "Prix") {
                                    $soldeCart += $item;
                                    echo "<span>$key : $item €</span>";
                                } elseif ($key == "img") {
                                } else echo "<span>$key : $item</span>";
                            }

                            ?>
                            <form action="" method="post">
                                <label for="<?php echo $pointer ?>" class="cart">
                                    <i class=' fa-solid fa-trash'>
                                        <input type="submit" value="delete" name="delete" id="<?php echo $pointer ?>" class="deleteItemCart disableButton">
                                    </i>
                                </label>
                                <input type="hidden" name="data" value="<?php echo $pointer++ ?>">

                            </form>

                        </div>
            <?php
                    }
                }
            }




            ?>
        </div>
        <div>
            <span>Votre solde total est de <?php echo number_format($soldeCart, 0, ',', ".") ?></span>
            <a href="checkout.php" class="checkoutButton">
                <button>Payer</button>
            </a>
            <form action="index.php" method="get">
                <input type="submit" value="Vider le cart et retour page d'accueil" name="deleteCart" class="deleteCart">
            </form>

        </div>
    </main>
    <footer>


        <p>Rejoignez-nous sur les réseaux sociaux</p>
        <div class="social_media">
            <i class="fa-brands fa-facebook" id="facebook"></i>
            <i class="fa-brands fa-twitter" id="twitter"></i>
            <i class="fa-brands fa-instagram" id="instagram"></i>
        </div>
    </footer>
</body>

</html>