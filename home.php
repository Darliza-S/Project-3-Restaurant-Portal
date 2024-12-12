


<?php
// Set dynamic variables
$restaurantName = "Project 3 Restaurant";
$currentYear = date("Y"); 

// Define navigation items as an associative array: 'Label' => 'action'
$navItems = [
    "Add Reservation" => "addReservation",
    "View Reservations" => "viewReservations",
    "Delete Reservation" => "deleteReservation" ,
    "View Customers" => "viewCustomerPreferences"
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Portal - Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f2f2f2;
        }
        header {
            background: #006978;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #005662;
            overflow: hidden;
        }
        nav a {
            display: inline-block;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 20px;
            font-weight: bold;
            transition: background 0.3s;
        }
        nav a:hover {
            background: #008c9e;
        }
        
        section.hero h2 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #000000; /* Black text */
        }
        section.hero p {
            font-size: 20px;
            max-width: 600px;
            margin: auto;
            line-height: 1.4;
            color: #000000; /* Black text */
        }
        section.content {
            padding: 40px 20px;
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            margin-top: -50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 4px;
            text-align: center;
        }
        section.content h3 {
            color: #006978;
            margin-bottom: 20px;
        }
        section.content p {
            color: #444444;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        footer {
            background: #005662;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <header>
        <h1><?= htmlspecialchars($restaurantName) ?></h1>
    </header>

    <nav>
        <?php foreach ($navItems as $label => $action): ?>
            <a href="RestaurantServer.php?action=<?= urlencode($action) ?>"><?= htmlspecialchars($label) ?></a>
        <?php endforeach; ?>
    </nav>

    <section class="hero">
        <h2>Welcome to Project 3 Restaurant Portal</h2>
        <p>Manage reservations and enhance dining experiences with ease.</p>
    </section>

    <footer>
        <p>&copy; <?= htmlspecialchars($currentYear) ?> <?= htmlspecialchars($restaurantName) ?>. All rights reserved.</p>
    </footer>
</body>
</html>