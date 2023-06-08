<?php

$json = file_get_contents('items.json');
$jsonData = json_decode($json, true);




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
        <h1>Welcome to AZ Store</h1>
    </header>
    <main>
        <div class="displayCar">
            <?php
            foreach ($jsonData["Automobile"] as $value) {
            ?>

                <div class="cars" style="background-image: url(<?php echo $value["img"] ?>);">
                    <!-- <p> Voici votre voiture de marque: <?php echo $value["Marque"] ?></p> -->


                    <?php foreach ($value as $key => $item) {
                        if ($key == "Prix") {
                            echo "<span>$key : $item €</span>";
                        } elseif ($key == "img") {
                        } else echo "<span>$key : $item</span>";
                    }     
                    
                    ?>

                        <button class="add_to_cart">Add To cart 
                        <i class="fa-solid fa-cart-arrow-down fa-s"></i>
                        </button>
                </div>



            <?php

            }

            ?>


    </main>
    <footer>

    </footer>


</body>

</html>