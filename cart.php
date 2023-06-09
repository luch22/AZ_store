<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/18f626dcdf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>AZ_store</title>
</head>

<body>
    <header>
        <a href="index.php" class="homeButton">
            <button>Home</button>
        </a>
    </header>
    <main>
        <div class="displayCar">


            <?php
            $jsonCart = file_get_contents('cart.json');
            $json = file_get_contents('items.json');
            $jsonData = json_decode($json, true);




            $cartList = json_decode($jsonCart, true);
            $pointer = 0;
            if (isset($_POST['delete'])) {
                unset($cartList[(int)$_POST['data']]);
                $cartList = array_values($cartList);
                print_r($cartList);
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
                                    echo "<span>$key : $item €</span>";
                                } elseif ($key == "img") {
                                } else echo "<span>$key : $item</span>";
                            }

                            ?>
                            <form action="" method="post">
                                <input type="hidden" name="data" value="<?php echo $pointer++ ?>">
                                <input type="submit" value="delete" name="delete" class="deleteItemCart">
                            </form>

                        </div>
            <?php
                    }
                }
            }




            ?>
        </div>
    </main>
    <footer>
        <a href="checkout.php" class="checkoutButton">
            <button>Payer</button>
        </a>
    </footer>
</body>

</html>