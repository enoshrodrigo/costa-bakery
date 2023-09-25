<?php
session_start();
if (!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] === true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Home - AddMagazine</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
     <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
 </head>

 <body id="page-top">
     <!-- Our target is calculate the real cost of food to make in given period price range to calculate we get the latest date price in ingredientvalue tabel -->
     <div id="wrapper">
         <!-- // Path: panels\sidebar.php side bar -->
         <?php include './panels/sidebar.php'; ?>

         <div class="d-flex flex-column" id="content-wrapper">
             <div id="content">
                 <!-- // Path: panels\navigation.php top bar -->
                 <?php include './panels/navigation.php'; ?>

                 <div class="container-fluid">
                     <h3 class="text-dark mb-4">Add new Magazine</h3>
                     <div class="card shadow">
                         <div class="card-header py-3">
                             <p class="text-primary m-0 fw-bold">Add/Edit Magazine</p>
                         </div>
                         <div class="card-body">

                             <div class="form-control" type="text" data-bs-toggle="collapse" data-bs-target="#collapseAddMagazine" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
                             Add new Magazine
                             </div>
                             </br> 
                             <div class="collapse dropdown" id="collapseAddMagazine">
                                 <div class="card shadow">
                                     <div class="card-body">
                                         <form action="./uploadMagazine.php" method="post" enctype="multipart/form-data">
                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-3"><label class="form-label" for="Magazine_name">Upload Pdf</label><input class="form-control" type="file" id="magazine" name="pdfFile" accept=".pdf" required>
                                                         <div id="error"></div>
                                                     </div>

                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="mb-3"><label class="form-label" for="Magazine_Picture">Magazine Picture</label><input class="form-control" type="file"  id="MagazinePicture" name="pdfPicture" accept="image/*"  ></div>
                                                 </div>
                                             </div>

                                             <div class="row">
                                                 <div class="col-md-6">
                                                     <div class="mb-3"><label class="form-label" for="Magazine_Date">Date</label>
                                                         <input type="date"  class="form-control" id="MagazineDate" name="date" required>
                                                             
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="mb-3"><label class="form-label" for="Magazine_Date">Description</label>
                                                         <textarea    class="form-control" id="pdfDescription" name="pdfDescription" required></textarea>
                                                             
                                                     </div>
                                                 </div>
                                              
                                                 <div class="col-md-6">
                                                     <div class="mb-3"> <input class="form-control  " style="float:right;" type="submit" id="addMagazine" name="submit" required></div>
                                                 </div>
                                             </div>
                                         </form>


                                     </div>
                                 </div>
                             </div>
                             <br>



                             <div class="row">
                                 <!-- make rows for display data from ingredient and ingredientvalue then display with edit delete and add date ranges,price buttons for each row -->
                                 <div class="col-md-12" id=" ">

                                     <!-- Display ing data -->
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <footer class="bg-white sticky-footer">
                 <div class="container my-auto">
                     <div class="text-center my-auto copyright"><span>Copyright © EnaDev 2023</span></div>
                 </div>
             </footer>
         </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
     </div>
     <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script src="assets/js/theme.js"></script>
  

 </body>

 </html>