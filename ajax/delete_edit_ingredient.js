//delete ingredient from database when user clicks on delete button in ingredient list DeleteIngrident() function called

function DeleteIngredient(id, ingredient_tabel_id) {
  $.ajax({
    url: "./opearations/delete_and_edit_ingrident.php",
    type: "POST",
    data: { del_Ingredient: id, ingredient_tabel_id: ingredient_tabel_id },
    success: function (result) {
      window.location.href = "./add_ingridents.php";
    },
  });
}
//Edut ingredient from database when user clicks on save button in ingredient list EditIngredient() function called

function EditIngredient(ingredientvalue_id) {
     price = document.getElementById(""+ingredientvalue_id+"").value;
  $.ajax({
    url: "./opearations/delete_and_edit_ingrident.php",
    type: "POST",
    data: {
      ingredientvalueid:ingredientvalue_id,
      price:price,
    },
    success:(data)=>{
      if(data){
        alert('Succesfully updated');
      }
    }
  });
}
