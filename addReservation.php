

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Portal - Add Reservation</title>
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
            max-width: 600px;
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
        section.content form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #006978;
        }
        section.content form input[type="text"],
        section.content form input[type="datetime-local"],
        section.content form input[type="number"],
        section.content form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        section.content form input[type="submit"] {
            background-color: #006978;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 14pt;
            cursor: pointer;
            border-radius: 4px;
        }
        section.content form input[type="submit"]:hover {
            background-color: #008c9e;
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
        <h1>Project 3 Restaurant</h1>
    </header>

    <nav>
        <a href="home.php">Home</a>
        <a href="RestaurantServer.php?action=addReservation">Add Reservation</a>
        <a href="RestaurantServer.php?action=viewReservations">View Reservations</a>
        <a href="RestaurantServer.php?action=viewCustomerPreferences">Customer Preferences</a>
        <a href="RestaurantServer.php?action=deleteReservation">Delete Reservation</a>
    </nav>

    <?php if (isset($message)): ?>
            <p style="color: green; font-weight: bold;"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>


    <section class="content">
        <h2>Add Reservation</h2>
        <form method="POST" action="RestaurantServer.php?action=addReservation">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" required>

            <label for="contact_info">Contact Info (Phone or Email):</label>
            <input type="text" name="contact_info" id="contact_info" required>

            <label for="reservation_time">Reservation Time:</label>
            <input type="datetime-local" name="reservation_time" id="reservation_time" required>

            <label for="number_of_guests">Number of Guests:</label>
            <input type="number" name="number_of_guests" id="number_of_guests" required>

            <label for="special_requests">Special Requests:</label>
            <textarea name="special_requests" id="special_requests"></textarea>

            <input type="submit" value="Submit">
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Project 3 Restaurant. All rights reserved.</p>
    </footer>
</body>
</html>