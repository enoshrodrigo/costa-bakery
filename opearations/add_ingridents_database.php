<?php
include_once 'operation.php';
 //adding ingredient to the database
if(isset($_POST['submit'])){
    $addIngredient = new Operation();
    $addIngredient->setTable('ingredient');
    $addIngredient->setFields(array(
        'ingredient_name' => $_POST['ingredient_name']
         
    ));
    if( $addIngredient->insertOData()){
    $addIngredientValues = new Operation();
        //check ingredient_name and get ingredient_id from ingredient table 
        $addIngredientValues->setTable('ingredient');
        $addIngredientValues->setFields(array(
            'ingredient_name' => $_POST['ingredient_name']
             
        ));
        $ingredient_id = json_encode($addIngredientValues->selectOData('ingredient_name="'.$_POST['ingredient_name'].'"', 'ingredient_id'));
     $ingredient_id = json_decode($ingredient_id,true);
         
        // var_dump($ingredient_id);
       foreach($ingredient_id as $ing){
           $ingredient_id_array[] = $ing['ingredient_id'];
         }
        // var_dump($ingredient_id_array);

        //insert ingredient_id and other values to ingredientvalue table


        $addIngredientValues->setTable('ingredientvalue');
        $addIngredientValues->setFields(array(
            'ingredientvalue_ingredient_id' => $ingredient_id_array[0],
            'ingredientvalue_price' => $_POST['ingredientvalue_price'],
            'ingredientvalue_measure' => $_POST['ingredientvalue_measure'],
            'ingredientvalue_date_start' => date('Y-m-d')
        ));
      
        if( $addIngredientValues->insertOData()){
            header("Location: ../add_ingridents.php");
        }
        else{
            //delete previous inserted ingredient from ingredient table(version upcoming)
        

            header("Location: ../add_ingridents.php?status=failedToInsertValueTabels");
        }

}
    else{
            echo header("Location: ../add_ingridents.php?status=failedToInsertIngredientTabels");
    }
}
else{
    header("Location: ../add_ingridents.php?status=addIngredientFailed");
}
?>