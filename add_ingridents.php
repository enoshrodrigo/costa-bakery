 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Costabakery</title>
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
                    <h3 class="text-dark mb-4">Add ingridents</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Add/Edit ingridents</p>
                        </div>
                        <div class="card-body">

                            <div class="form-control" type="text" data-bs-toggle="collapse" data-bs-target="#collapseAddIngrident" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
                                 Add ingrident 
                            </div>
                            </br>
                            <!--    In this we can add ingrident to the ingrident tabel with ingredient_name also ingredient connect with the ingredientvalue tabel as a foriegn key (ingredientvalue_id = ingredient_id) then in ingredientvalue tabel save
   ingredientvalue_measure(gram,ml,orPcs) ,ingredientvalue_price[doubel] ,ingredientvalue_date_start(with time perioad is this price ),ingredientvalue_date_end(end - time perioad of price) the time period can be past of present date to ongoing. -->

                            <div class="collapse dropdown" id="collapseAddIngrident">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <form action="./opearations/add_ingridents_database.php" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3"><label class="form-label" for="ingredient_name">Ingrident name</label><input class="form-control" type="text" id="ingredient_name" name="ingredient_name" required>
                                                        <div id="error_ingredient_name"></div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3"><label class="form-label" for="ingredientvalue_price">Ingrident price(1kg/1pc)</label><input class="form-control" type="number" step="any" id="ingredientvalue_price" name="ingredientvalue_price" required></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3"><label class="form-label" for="ingredientvalue_measure">Ingrident measure</label>
                                                        <select class="form-control" id="ingredientvalue_measure" name="ingredientvalue_measure" required>
                                                            <option value="gram">gram</option>
                                                            <option value="ml">ml</option>
                                                            <option value="pcs">pcs</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <div class="mb-3"><label class="form-label" for="ingredientvalue_date_start">Ingrident date start</label><input class="form-control" type="date" id="ingredientvalue_date_start" name="ingredientvalue_date_start" max="<?php //echo date('Y-m-d'); ?>" required></div>
                                                </div> -->
                                         


                                            
                                                <!-- <div class="col-md-6">
                                                    <div class="mb-3"><label class="form-label" for="ingredientvalue_date_end">Ingrident date end</label><input class="form-control" type="date" id="ingredientvalue_date_end" name="ingredientvalue_date_end" max="<?php // echo date('Y-m-d'); ?>" required></div>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <div class="mb-3"> <input class="form-control  " style="margin-top: 4.5rem; float:right;" type="submit" id="addIngrident" name="submit" required></div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <br>



                            <div class="row">
                                <!-- make rows for display data from ingredient and ingredientvalue then display with edit delete and add date ranges,price buttons for each row -->
                                <div class="col-md-12" id="ingredient_list">
                                   
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
        <script src="ajax/check_ingrident_name.js"></script>
        <script src="ajax/delete_edit_ingredient.js"></script>

</body>

</html>