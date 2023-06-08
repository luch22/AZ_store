<?php

$json = file_get_contents('items.json');
$jsonData = json_decode($json, true);
$jsonCart = file_get_contents('cart.json');
if (is_string($jsonCart) and strlen($jsonCart) == 0) {
    $jsonCart = "[]";
}
$cartList = json_decode($jsonCart, true);
function addItemsToCart($itemAdd)
{
    global $cartList;
    array_push($cartList, $itemAdd);
    file_put_contents("cart.json", json_encode($cartList));
}
if (isset($_POST['AddToCart'])) {
    $itemValue = $_POST['data'];

    addItemsToCart($itemValue);
    header("Location: " . $_SERVER['PHP_SELF']);
}


?>
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
        <h1>Welcome to AZ Cars</h1>
    </header>
    <main>
        <div class="displayCar">
            <?php
            foreach ($jsonData["Automobile"] as $value) {
            ?>

                <div class="cars" style="background-image: url(<?php echo $value["img"] ?>);">

                    <?php foreach ($value as $key => $item) {
                        if ($key == "Prix") {
                            echo "<span>$key : $item €</span>";
                        } elseif ($key == "img") {
                        } else echo "<span>$key : $item</span>";
                    } ?>

                    <form action="?" method="post">
                        <input type="hidden" name="data" value="<?php print_r($value["id"]) ?>">
                        <label for="<?php print_r($value["id"]) ?>" class="add_to_cart">
                            <input type="submit" class="disableButton" id="<?php print_r($value["id"])   ?>" name="AddToCart" value="Ajouter au panier">
                            <i class=' fa-solid fa-cart-arrow-down fa-s'></i>
                        </label>
                    </form>

                </div>



            <?php

            }

            ?>


    </main>
    <footer>
        <form action="?" method="post">
            <input type="submit" class="button" name="DisplayCart" value="afficher au panier">
        </form>


        <?php
        if (isset($_POST['DisplayCart'])) {

            // if ($cart != null) {
            //     printf("Salut");
            // }

        }



        ?>

    </footer>


</body>

</html>