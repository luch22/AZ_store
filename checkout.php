<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/checkout.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payer</title>
</head>

<body>
    <header>

    </header>
    <main>
        <form action="index.php" method="get">
            <input type="text" name="Fname" id="Fname" placeholder="Prénom" required>
            <input type="text" name="Lname" id="Lname" placeholder="Nom" required>
            <input type="email" name="Email" id="Email" placeholder="Email" required>
            <input type="text" name="Address" id="Address" placeholder="Rue + N°" required>
            <input type="text" name="City" id="City" placeholder="Ville" required>
            <input type="number" name="Zip" id="Zip" placeholder="Code Postal" required>
            <input type="text" name="Country" id="Country" placeholder="Pays" required>
            <input type="submit" value="Valide" name="deleteCart">
        </form>
    </main>
    <footer>

    </footer>

</body>

</html>