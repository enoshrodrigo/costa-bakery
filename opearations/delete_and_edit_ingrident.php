<?php
include_once("../opearations/operation.php");

if(isset($_POST['del_Ingredient']) && isset($_POST['ingredient_tabel_id'])){
    $del_ingredient = new Operation();
    $del_ingredient->setTable('ingredientvalue');
    $del_ingredient_id= $_POST['del_Ingredient'];
    if($del_ingredient->deleteOData('ingredientvalue_id ='.$del_ingredient_id.'')){
        $del_ingredient->setTable('ingredient');
        $del_ingredient->deleteOData('ingredient_id ='.$_POST['ingredient_tabel_id'].'');
        
    }
    else{
        echo "failed";
    }
}
else{
    echo "failed";
}

?>