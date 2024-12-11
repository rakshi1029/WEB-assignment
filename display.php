<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$db_name = "Dairy_Management_Registration_Form";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Initialize variables
$earTagNumber = $gender   = $breed  = $age = $color  = $milkingCapacity = $monthOfSemen = $semenBreed = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $earTagNumber = htmlspecialchars($_POST["earTagNumber"]);
    $gender = htmlspecialchars($_POST["gender"]);
    $breed  = htmlspecialchars($_POST["breed"]);
    $age= htmlspecialchars($_POST["age"]);
    $color  = htmlspecialchars($_POST["color"]);
    $milkingCapacity = htmlspecialchars($_POST["milkingCapacity"]);
    $monthOfSemen = htmlspecialchars($_POST["monthOfSemen"]);
    $semenBreed = htmlspecialchars($_POST["semenBreed"]);
    try {
        $stmt = $pdo->prepare("INSERT INTO reg (earTagNumber, gender,breed,age, color, milkingCapacity, monthOfSemen, semenBreed)
                               VALUES (?, ?, ?, ?,?,?, ?,?)");
        $stmt->execute([$earTagNumber, $gender,$breed, $age, $color, $milkingCapacity, $monthOfSemen ,$semenBreed]);
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Error: Duplicate entry. <a href='index.html'>Try again</a>";
            exit();
        } else {
            echo "Error: " . $e->getMessage();
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Management Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> Dairy Management Details</h1>
        <p><strong>Ear Tag Number:</strong> <?= htmlspecialchars($earTagNumber) ?></p>
        <p><strong>Gender:</strong> <?= htmlspecialchars($gender ) ?></p>
        <p><strong>Breed:</strong> <?= htmlspecialchars($breed) ?></p>
        <p><strong>Age (Months):</strong> <?= htmlspecialchars($age) ?></p>
        <p><strong>Color:</strong> <?= htmlspecialchars($color) ?></p>
        <p><strong>Milking Capacity (Liters/Day):</strong> <?= htmlspecialchars($milkingCapacity ) ?></p>
        <p><strong>Month of Semen:</strong> <?= htmlspecialchars($monthOfSemen) ?></p>
<p><strong>Semen's Breed:</strong> <?= htmlspecialchars($semenBreed) ?></p>

        <a href="index.html" style="display: block; margin-top: 20px; text-align: center; color: #5cb85c;">Back to Form</a>
    </div>
</body>
</html>
