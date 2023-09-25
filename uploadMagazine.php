<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: login.php");
    exit;
}
require_once './db_connect/conn.php';
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pdfDirectory = '../public/pdf/';
  $uploadDirectory= '../public/images/magazine/';

  
   // Set the directory where PDFs will be stored
var_dump($_FILES['pdfFile']);
  // Handle PDF file upload
  if (isset($_FILES['pdfFile']) && $_FILES['pdfFile']['error'] === UPLOAD_ERR_OK) {
    $pdfFileName = $_FILES['pdfFile']['name'];
    $pdfFilePath = $pdfDirectory . $pdfFileName;

    move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfFilePath);
  } else {
    // Handle file upload error
    echo "PDF upload failed.";
    exit;
  }

  // Handle picture file upload  
  if (isset($_FILES['pdfPicture']) && $_FILES['pdfPicture']['error'] === UPLOAD_ERR_OK) {
    $pdfPictureName =$_FILES['pdfPicture']['name'];
    $pdfPicturePath = $uploadDirectory . $pdfPictureName;

    // Move the uploaded image file to the desired directory
    move_uploaded_file($_FILES['pdfPicture']['tmp_name'], $pdfPicturePath);

  
  } else {
    echo "Image file upload failed.";
  }

  $pdfDirectoryDatabase =  $pdfFileName;
  $uploadDirectoryDatabase=  $pdfPictureName;
  // Retrieve description from the form
  $pdfDescription = $_POST['pdfDescription'];
  $date= $_POST['date'];


  // Insert data into the database
  
  $query = "INSERT INTO magazine (pdf, img, description , date) VALUES (?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$pdfDirectoryDatabase, $uploadDirectoryDatabase, $pdfDescription, $date]);

  // Redirect back to your main page or display a success message
  header("Location: ./dashboard.php");
  exit;
}
?>
