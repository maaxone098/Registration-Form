<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="logo.png">
</head>
<body>
<?php
// Ensure the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve form data and sanitize inputs to prevent XSS and other attacks
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : 'Not specified';
    $dob = htmlspecialchars($_POST['date']);
    $country = htmlspecialchars($_POST['country']);
    $address = htmlspecialchars($_POST['address']);

    // Collect selected interests
    $interests = [];
    if (!empty($_POST['interests'])) {
        foreach ($_POST['interests'] as $interest) {
            $interests[] = htmlspecialchars($interest);
        }
    }

    // Display the formatted data
    echo "<div class='result'>";
    echo "<h1 class='success'>Form Submission Successful</h1>";
    echo "<p><strong>Full Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Phone:</strong> $phone</p>";
    echo "<p><strong>Gender:</strong> $gender</p>";
    echo "<p><strong>Date of Birth:</strong> $dob</p>";
    echo "<p><strong>Country:</strong> $country</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Interests:</strong> " . (empty($interests) ? 'None' : implode(', ', $interests)) . "</p>";
    echo "</div>";
} else {
    // Redirect back to the form if accessed without submission
    header('Location: index.html');
    exit();
}
?>
</body>
</html>
