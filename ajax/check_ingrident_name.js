
$(document).ready(function() {
    $('#ingredientvalue_date_start').change(function() {
        var date_start = $(this).val();
        $('#ingredientvalue_date_end').attr('min', date_start);
    });
});

//check ingredient name is already exist or not in database using ajax

$(document).ready(function() {
    $('#ingredient_name').keyup(function() {
        var ingredient_name = $(this).val();
        $.ajax({
            url: "./ajax/check_ingredient_name.php",
            
            method: "POST",
            data: {
                ingredient_name: ingredient_name
            },
            success: function(data) {
               
                if (data == 1) {
                    $('#ingredient_name').focus();
                    $('#error_ingredient_name').html(' Ingredient Name Already Exist');
                    $('#addIngrident').attr('disabled', true);
                }else if(data == 0){
                    $('#error_ingredient_name').html('');
                    $('#addIngrident').attr('disabled', false);
                    //change button and pointer (next version)
                }
            }
        });
    });
}
);


//when startup page then show all ingredient list in table using ajax
document.addEventListener("DOMContentLoaded", function(event) {
$(document).ready(function() {
    

    $.ajax({
        url: "./ajax/show_ingrident_list.php",
        method: "POST",
        data: {
            show_ingredient_list: 1
        },
        success: function(datas) {
            $('#ingredient_list').html(datas);
         
        }
    });
}
);
});
