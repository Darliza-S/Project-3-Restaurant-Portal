
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Portal - View Reservations</title>
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
        section.content {
            padding: 40px 20px;
            max-width: 800px;
            margin: 40px auto;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 4px;
        }
        section.content h2 {
            color: #006978;
            margin-bottom: 20px;
            text-align: center;
        }
        section.content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        section.content table, section.content th, section.content td {
            border: 1px solid #cccccc;
        }
        section.content th, section.content td {
            padding: 12px;
            text-align: left;
        }
        section.content th {
            background-color: #006978;
            color: #ffffff;
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Reservation</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <header>
        <h1>Project 3 Restaurant</h1>
    </header>

    <nav>
        <a href="home.php">Home</a>
        <a href="RestaurantServer.php?action=addReservation">Add Reservation</a>
        <a href="RestaurantServer.php?action=viewReservations">View Reservations</a>
        <a href="RestaurantServer.php?action=viewCustomerPreferences">Customer Preferences</a>
        <a href="RestaurantServer.php?action=deleteReservation">Delete Reservation</a>
    </nav>

    <section class="content">
        <h2>Delete Reservation</h2>
        <form method="POST" action="RestaurantServer.php?action=deleteReservation">
            <label for="reservation_id">Reservation ID:</label>
            <input type="number" name="reservation_id" id="reservation_id" required>
            
            <input type="submit" value="Delete">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Project 3 Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>