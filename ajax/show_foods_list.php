<?php
include_once("../opearations/operation.php");
if (isset($_POST['getFood'])) {


    $show_food = new Operation();
    $show_food->setTable('food');

    $food = $show_food->selectOData();

    if ($food) {
        $food = json_encode($food);
        $count = 0;
        $food = json_decode($food, true);
        $idCount = 0;

        foreach ($food as $foodList) {
            $total=0;
            $idCount++;
            echo '
           <div class="mb-3">
           <div class="form-control d-flex justify-content-md-between" type="text" data-bs-toggle="collapse" data-bs-target="#collapseIngrident2' . $idCount . '" aria-expanded="false" aria-controls="collapseExample" style="cursor: pointer">
               <label for="food_name">' . $foodList['food_name'] . '</label>
               <label for="food_price" class="text-dark mx-2">Rs.' . $foodList['food_price'] . '</label>
           </div>
  
           <!-- make form to display -->
           <div class="collapse dropdown card card-body mt-4" id="collapseIngrident2' . $idCount . '">
               <div class="card-body" >
                   <!-- tabel -->
          <div class="table-responsive">
           <table class="table table-responsive  table-bordered">
              <thead>
                  <tr>
                      <th>Ingredient name</th>
                      <th>Ingredient volume</th>
                      <th>Ingredient Measure</th>
                      <th>Real price</th>
                      <th>Ingredient price(1kg/1pcs)</th>
                     
                  </tr>
              </thead>
              <tbody>';
            //get the data from foodvalueId table with foodvalue_food_id 
            // <td><button class="btn btn-danger" id="delete_food" )">Delete</button></td>
            foreach (getCategoryIngridentValue($foodList['food_id']) as $foodListridentValue ) {
                // var_dump(getCategoryIngridentValue(40)); 
                $foodListridentValue['ingredientvalue_measure']!='pcs'?$realPrice=$foodListridentValue['food_value_volume']*($foodListridentValue['ingredientvalue_price']/1000):$realPrice=$foodListridentValue['food_value_volume']*($foodListridentValue['ingredientvalue_price']);
                if($foodListridentValue['food_value_volume']==0){
                            continue;
                }
                echo '<tr>
                <td>' . $foodListridentValue['ingredient_name'] . '</td>
                  <td>' . $foodListridentValue['food_value_volume'] . '</td>
                  <td>' . $foodListridentValue['ingredientvalue_measure'] . '</td>
                  <td>' . $realPrice . '</td>
                  <td>' . $foodListridentValue['ingredientvalue_price'] . '</td>
 
                  </tr>';
            $total=$total+$realPrice;
            }

            echo '
            <tr>
            <td colspan=6>
            <div>Total real cost</div>
             <div> RS '.$total.'  </div>
            </td>
                               
            </tr>
            <tr>
            <td colspan=6>
         <button class=" btn btn-danger float-end" onclick="deleteFood('.$foodList['food_id'].')">
         Delete Food
         </button>
            </td>
                               
            </tr>
            </tbody> </table>
              </div>
              
              
              </div>
  
              </div>
          </div>';
        }
    } else {
        echo "Can't find any food in the database";
    }
} else {
    echo "Non";
}
function getCategoryIngridentValue($id)
{
    $show_foods = new Operation();
    $show_foods->setTable('foodvalue,ingredientvalue,ingredient');
    $foods = json_encode($show_foods->selectOData('foodvalue.food_value_ingrident_id=ingredientvalue.ingredientvalue_id AND ingredientvalue.ingredientvalue_ingredient_id=ingredient.ingredient_id AND food_value_food_id=' . $id . ''));
    $foods = json_decode($foods, true);
    
    // var_dump($foods);
    return $foods;
}
// <td><button class="btn btn-danger" id="Edit_food" onclick="EditIngredient(' . $foodListridentValue['foodvalue_id'] . ')">Save</button></td>
?>