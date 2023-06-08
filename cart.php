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
        <?php
        $jsonCart = file_get_contents('cart.json');
        $json = file_get_contents('items.json');
        $jsonData = json_decode($json, true);
        if (isset($_GET['DisplayCart'])) {

            $cartList = json_decode($jsonCart, true);;
            var_dump($cartList);
            foreach ($cartList as $value) {
                foreach ($jsonData["Automobile"] as $auto) {
                    if ($value == $auto["id"]) {
                        echo "<p>TEST</p>";
                    }
                }
            }
        }



        ?>

    </header>
</body>

</html>