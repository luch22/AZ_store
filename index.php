<?php

$json = file_get_contents('items.json');
$jsonData = json_decode($json, true);
$jsonCart = file_get_contents('cart.json');
$cartList = json_decode($jsonCart, true);
function addItemsToCart($itemAdd)
{
    global $cartList;
    array_push($cartList, $itemAdd);
    file_put_contents("cart.json", json_encode($cartList));
}
if (isset($_GET['AddToCart'])) {
    $itemValue = $_GET['data'];

    addItemsToCart($itemValue);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZ_store</title>
</head>

<body>
    <header>

    </header>
    <main>
        <div class="displayCar">
            <?php
            foreach ($jsonData["Automobile"] as $value) {
            ?>

                <div class="cars" style="background-image: url(<?php echo $value["img"] ?>);">
                    <p> voici votre voiture de Marque: <?php echo $value["Marque"] ?></p>


                    <?php foreach ($value as $key => $item) {
                        if ($key == "Prix") {
                            echo "<p>$key : $item €</p>";
                        } elseif ($key == "img") {
                        } else echo "<p>$key : $item</p>";
                    }
                    ?>

                    <form action="" method="get">
                        <input type="hidden" name="data" value="<?php print_r($value["id"]) ?>">
                        <input type="submit" class="button" name="AddToCart" value="Ajouter au panier">
                    </form>


                </div>



            <?php

            }

            ?>


    </main>
    <footer>
        <form action="" method="get">
            <input type="submit" class="button" name="DisplayCart" value="afficher au panier">
        </form>


        <?php
        if (isset($_GET['DisplayCart'])) {

            // if ($cart != null) {
            //     printf("Salut");
            // }
        }



        ?>

    </footer>


</body>

</html>