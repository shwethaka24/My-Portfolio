<?php
$contact_name = $_POST['contact_name'];
$contact_phone = $_POST['contact_phone'];
$contact_email = $_POST['contact_email'];
$subject = $_POST['subject'];
$contact_message = $_POST['contact_message'];

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (contact_name, contact_phone, contact_email, subject, contact_message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $contact_name, $contact_phone, $contact_email, $subject, $contact_message);
    $stmt->execute();
    echo "Submitted Successfully...";
    $stmt->close();
}
$conn->close();
?>

