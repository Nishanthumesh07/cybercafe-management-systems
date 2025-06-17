<?php
include('includes/dbconnection.php');
$mid = $_GET['mid'];

// Check if the Membership ID is provided
if (!empty($mid)) {
    // Perform the deletion
    $query = mysqli_query($con, "DELETE FROM tblmembership WHERE M_id='$mid'");
    
    if ($query) {
        // Record deleted successfully
        echo '<script>alert("Record deleted successfully.")</script>';
    } else {
        // Failed to delete record
        echo '<script>alert("Failed to delete record. Please try again.")</script>';
    }
} else {
    // Membership ID not provided
    echo '<script>alert("Invalid request. Please try again.")</script>';
}

// Redirect back to the page where the delete button was clicked
echo "<script>window.location.href ='membership.php'</script>";
?>
