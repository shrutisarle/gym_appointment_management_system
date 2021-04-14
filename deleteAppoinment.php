<?php

$trainer_id = $_GET['trainer_id'];
$client_id = $_GET['client_id'];
//Connect DB
// on success delete : redirect the page to original page using header() method
// connect to the database
$conn = mysqli_connect("127.0.0.1", "root", "root", "GymAppointmentMgmt");
// sql to delete a record
$sql = "DELETE FROM appointments WHERE client_id=$client_id AND trainer_id=$trainer_id"; 
if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header("location: viewAppointments.php?clients_id=$client_id"); 
    exit;
} else {
    echo "Error deleting record";
}
?>