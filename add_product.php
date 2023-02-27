<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ajouter Produit</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    h1 {
        text-align: center;
        margin-top: 50px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type=text],
    input[type=number] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type=submit] {
        display: block;
        margin: 30px auto 0;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #0062cc;
    }

</style>
<body>
<h1>Add Product</h1>
<form method="post">
    <div class="form-group">
        <label for="name">Nom du produit:</label>
        <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
        <label for="price">Prix:</label>
        <input type="number" name="price" id="price">
    </div>
    <div class="form-group">
        <label for="image">Image URL:</label>
        <input type="text" name="image" id="image">
    </div>
    <input type="submit" value="Add Product">
</form>
</body>
</html>

<?php
$products_file = "products.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $image = $_POST["image"];

    if (!empty($name) && !empty($price) && !empty($image)) {
        // Open the products file
        $file = fopen($products_file, "a");
        if ($file) {
            fwrite($file, "$name|$price|$image\n");

            fclose($file);

            header("Location: main.php");
            exit();
        } else {
            echo "Error: Could not open file.";
        }
    }
}
