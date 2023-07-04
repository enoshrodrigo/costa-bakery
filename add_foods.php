<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Costabakery</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- // Path: panels\sidebar.php side bar -->
        <?php include './panels/sidebar.php'; ?>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <!-- // Path: panels\navigation.php top bar -->
                <?php include './panels/navigation.php'; ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Add foods</h3>
                    <div class="card shadow">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <p class="text-primary m-0 fw-bold">Add/Edit foods</p>
                            <button class="btn btn-primary" type="button" id="addIngrident" style="cursor: pointer">
                                Add food
                            </button>
                        </div>

                        <div class="card-body">
                            <!-- get food name , how many valume need, display which messure(gram,ml,pcs) , from ingredientvalue and display ingrident name from ingredient tabelalso when i click it i need to add another ingrident to food. after when click submit i need to save these things in tabel, also need input field to add price-->
                            <form action="./opearations/add_foods_database.php" method="post" id="formCheck">
                                <div id="parentClass">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3"><label class="form-label" for="food_name">Food name</label><input class="form-control" type="text" id="food_name" name="food_name" required>
                                            <div id="error_food_name"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3"><label class="form-label" for="food_price">Food price</label><input class="form-control" type="number" step="any" id="food_price" name="food_price" required></div>
                                        <div id="realFoodprice"></div>
                                        <div class=" text-bg-danger" id="realFoodWarning"></div>

                                    </div>
                                </div>


                                <div class="d-flex justify-content-md-between " id="ingridents">

                                    <div class="w-50  m-2"><label class="form-label" for="ingredient_value">Ingrident value</label></div>


                                    <div class="w-50 m-2"><label class="form-label" for="food_measure">Food measure</label>

                                    </div>

                                    <div class="w-50 m-2"><label class="form-label" for="ingredient_name">Ingrident name</label>


                                    </div>


                                </div>
                                </div>
                                <button class="btn btn-primary" type="submit">submit</button>
                            </form>

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
    <script src="ajax/add_foods.js"></script>
</body>

</html>