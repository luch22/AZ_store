<?php

$json = file_get_contents('items.json');
$jsonData = json_decode($json, true);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .displayCar {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .cars {
            background-position: center;
            background-size: cover;
        }
    </style>
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
                    }     ?>

                    <button>Add To cart</button>


                </div>



            <?php

            }

            ?>


    </main>
    <footer>

    </footer>


</body>

</html>