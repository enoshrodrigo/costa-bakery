//delete ingredient from database when user clicks on delete button in ingredient list DeleteIngrident() function is called

function DeleteIngredient(id,ingredient_tabel_id) {
    $.ajax({
        url: './opearations/delete_and_edit_ingrident.php',
        type: 'POST',
        data: { del_Ingredient: id, ingredient_tabel_id: ingredient_tabel_id },
        success: function (result) {
            window.location.href = "./add_ingridents.php";
        }
    });
}
