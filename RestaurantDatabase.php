<?php
class RestaurantDatabase {
    private $host = "localhost";
    private $port = "3306";
    private $database = "restaurant_reservations";
    private $user = "root";
    private $password = "";
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        echo "Successfully connected to the database";
    }

    public function getAllReservations() {
        $sql = "
            SELECT 
                Reservations.reservationId, 
                Customers.customerName,
                Reservations.reservationTime, 
                Reservations.numberOfGuests, 
                Reservations.specialRequests
            FROM Reservations
            INNER JOIN Customers ON Reservations.customerId = Customers.customerId";
    
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Add a new reservation
    public function addReservation($customerName, $contactInfo, $reservationTime, $numberOfGuests, $specialRequests) {
        $stmt = $this->connection->prepare("CALL addReservation(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $customerName, $contactInfo, $reservationTime, $numberOfGuests, $specialRequests);
        $stmt->execute();
        $stmt->close();
        echo "Reservation added successfully.<br>";
    }


    public function getCustomerPreferences() {
        $sql = "
            SELECT 
                c.customerName, 
                c.contactInfo, 
                d.favoriteTable, 
                d.dietaryRestrictions
            FROM Customers c
            LEFT JOIN DiningPreferences d ON c.customerId = d.customerId
        ";
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Delete a reservation
    public function deleteReservation($reservationId) {
        $stmt = $this->connection->prepare("DELETE FROM Reservations WHERE reservationId = ?");
        $stmt->bind_param("i", $reservationId);
        $stmt->execute();
        $stmt->close();
        echo "Reservation deleted successfully.<br>";
    }
}
?>


