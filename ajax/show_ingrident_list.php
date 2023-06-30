<?php
include_once("../opearations/operation.php");
if (isset($_POST['show_ingredient_list'])) {

    $show_ingredient = new Operation();
    $show_ingredient->setTable('ingredientvalue,ingredient');

    $ingredient = $show_ingredient->selectOData('ingredient_id=ingredientvalue_ingredient_id order by ingredientvalue_ingredient_id ASC', 'DISTINCT ingredientvalue_ingredient_id,ingredient_name');

    if ($ingredient) {
        $ingredient = json_encode($ingredient);
        $count = 0;
        $ingredient = json_decode($ingredient, true);
        $idCount = 0;

        foreach ($ingredient as $ing) {
            $idCount++;
            echo '
           <div class="mb-3">
           <div class="form-control" type="text" data-bs-toggle="collapse" data-bs-target="#collapseIngrident2' . $idCount . '" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
               <label for="ingredient_name">' . $ing['ingredient_name'] . '</label>
           </div>
  
           <!-- make form to display -->
           <div class="collapse dropdown card card-body mt-4" id="collapseIngrident2' . $idCount . '">
               <div class="card-body" >
                   <!-- tabel -->
          <div class="table-responsive">
           <table class="table table-responsive table-hover">
              <thead>
                  <tr>
                      <th>Ingredient price</th>
                      <th>Ingredient measure</th>
                      <th>Ingredient Add date</th>
                      <th>Ingredient Save</th>
                      <th>Ingredient delete</th>
                  </tr>
              </thead>
              <tbody>';
            //get the data from ingredientvalueId table with ingredientvalue_ingredient_id 

            foreach (getCategoryIngridentValue($ing['ingredientvalue_ingredient_id']) as $ingridentValue) {

                echo '<tr>
                  <td><input type="number" id="'.$ingridentValue['ingredientvalue_id'].'" class="form-control" value=' . $ingridentValue['ingredientvalue_price'] . '></td>
                  <td>' . $ingridentValue['ingredientvalue_measure'] . '</td>
                  <td>' . $ingridentValue['ingredientvalue_date_start'] . '</td>
                   <td><button class="btn btn-danger" id="Edit_ingredient" onclick="EditIngredient(' . $ingridentValue['ingredientvalue_id'] . ')">Save</button></td>
                  <td><button class="btn btn-danger" id="delete_ingredient" onclick="DeleteIngredient(' . $ingridentValue['ingredientvalue_id'] . ',' . $ingridentValue['ingredientvalue_ingredient_id'] . ')">Delete</button></td>
                  </tr>';
            }

            echo '</tbody> </table>
              </div>
              
              
              </div>
  
              </div>
          </div>';
        }
    } else {
        echo "Can't find any ingredient in the database";
    }
} else {
    return header("Location: ../add_ingridents.php?status=inputFailed");
}
function getCategoryIngridentValue($id)
{
    $show_ingredients = new Operation();
    $show_ingredients->setTable('ingredientvalue');
    $ingredients = json_encode($show_ingredients->selectOData('ingredientvalue_ingredient_id=' . $id . ''));

    $ingredients = json_decode($ingredients, true);
    return $ingredients;
}
