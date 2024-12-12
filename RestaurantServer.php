<?php
require_once 'restaurantDatabase.php';

class RestaurantPortal {
    private $db;

    public function __construct() {
        $this->db = new RestaurantDatabase();
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? 'home';
    
        switch ($action) {
            case 'addReservation':
                $this->addReservation();
                break;
            case 'viewReservations':
                $this->viewReservations();
                break;
            case 'deleteReservation':
                $this->deleteReservation();
                break;
            case 'viewCustomerPreferences':
                $this->viewCustomerPreferences();
                break;
            default:
                $this->home();
        }
    }
    
    private function viewCustomerPreferences() {
        $customers = $this->db->getCustomerPreferences(); // Call the database method
        include 'viewCustomerPreferences.php'; // Include the view
    }

    private function home() {
        include 'addReservation.php';
    }

    private function addReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $customerName = $_POST['customer_name'];
            $contactInfo = $_POST['contact_info'];
            $reservationTime = $_POST['reservation_time'];
            $numberOfGuests = $_POST['number_of_guests'];
            $specialRequests = $_POST['special_requests'];
    
            // Call the stored procedure
            try {
                $this->db->addReservation($customerName, $contactInfo, $reservationTime, $numberOfGuests, $specialRequests);
    
                // Set a success message
                $message = "Reservation Made Successfully!";
            } catch (Exception $e) {
                // Set an error message if something goes wrong
                $message = "Failed to make reservation: " . $e->getMessage();
            }
    
            // Include the form again, passing the message
            include 'addReservation.php';
        } else {
            // Display the reservation form
            include 'addReservation.php';
        }
    }

    private function viewReservations() {
        $customerId = $_GET['customerId'] ?? null;
        if ($customerId) {
            $reservations = $this->db->findReservations($customerId);
        } else {
            $reservations = $this->db->getAllReservations();
        }
        include 'viewReservations.php';
    }

    private function addSpecialRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservationId = $_POST['reservation_id'];
            $requests = $_POST['special_requests'];
            $this->db->addSpecialRequest($reservationId, $requests);
            header("Location: index.php?action=viewReservations&message=Special Request Updated");
        } else {
            include 'addSpecialRequest.php';
        }
    }

    private function deleteReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reservationId = $_POST['reservation_id'];
            $this->db->deleteReservation($reservationId);
            header("Location: RestaurantServer.php?action=viewReservations&message=Reservation Deleted");
        } else {
            // Include a form or page where the user can specify which reservation to delete
            include 'deleteReservationForm.php';
        }
    }
}

$portal = new RestaurantPortal();
$portal->handleRequest();