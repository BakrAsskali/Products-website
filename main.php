<?php
$products = [];
$filename = "products.txt";
if (file_exists($filename)) {
    $file = fopen($filename, "r");
    while (($line = fgets($file)) !== false) {
        $parts = explode("|", $line);
        $product = [
            "name" => $parts[0],
            "price" => $parts[1],
            "image" => $parts[2],
        ];
        $products[] = $product;
    }
    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $index = $_POST["index"];
        if (isset($products[$index])) {
            array_splice($products, $index, 1);
            $file = fopen($filename, "w");
            foreach ($products as $product) {
                fwrite($file, $product["name"] . "|" . $product["price"] . "|" . $product["image"] . "\n");
            }
            fclose($file);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            margin: 20px;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
            font-weight: normal;
            text-align: left;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        img {
            display: block;
            margin: 0 auto;
            max-height: 50px;
            max-width: 50px;
        }
        button {
            background-color: #f44336;
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 10px;
        }
        button:hover {
            background-color: #ff7f7f;
        }
        a {
            background-color: #333;
            color: #fff;
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            text-decoration: none;
        }
        a:hover {
            background-color: #444;
        }
        
    </style>
</head>
<body>
<h1>Produits</h1>

<table>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prix</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $index => $product): ?>
        <tr>
            <td><?= $product["name"] ?></td>
            <td><?= $product["price"] ?></td>
            <td><img src="<?= $product["image"] ?>" alt="<?= $product["name"] ?>"></td>
            <td>
                <form method="post">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <button type="submit" name="delete">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="add_product.php">Ajouter Produit</a>
</body>
</html>
