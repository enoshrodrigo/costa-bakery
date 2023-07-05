function getDataFromDataBase(returnData) {
  $.ajax({
    url: "./ajax/get_ingritent_values.php",
    type: "POST",
    dataType: "json",
    success: (data) => {
      returnData(data);
    },
  });
}

function displayFoods() {
  $.ajax({
    url: "./ajax/show_foods_list.php",
    method: "POST",
    data: {

    },
    success: (data) => {
      $("#food_list").html(data);
    },
  });
}

document.addEventListener("DOMContentLoaded", () => {
  displayFoods();
  document.getElementById("submit").disabled=true;
});
var price = 0;
var total = 0;
document.getElementById("addIngrident").addEventListener("click", () => {
  document.getElementById("submit").disabled=false;
  getDataFromDataBase((result) => {
    console.log(result);
    var div = document.createElement("div");
    div.className = "d-flex justify-content-md-between";
    div.id = "";

    var ingValu = document.createElement("input");
    ingValu.value = 0;
    ingValu.type = "number";
    ingValu.min = "0";
    ingValu.name = "ingredient_value[]";
    ingValu.className = "form-control w-50 m-2";
    ingValu.id = "";
    ingValu.onchange = function () {
      console.log(ingValu.value);
      if(ingValu.value=="")
      {ingValu.value=0;}
      getRealPrice();
    };
    ingValu.onkeyup = function () {
      if(ingValu.value=="")
     {ingValu.value=0;}
      getRealPrice();
    };
    var ingMeasure = document.createElement("input");
    ingMeasure.name = "food_measure[]";
    ingMeasure.className = "form-control w-50 m-2";
    ingMeasure.readOnly = true;
    ingMeasure.required=true;
    var ingName = document.createElement("select");
    ingName.name = "ingredient_name[]";
    ingName.className = "form-control w-50 m-2";
    ingName.onchange = function () {
      if (this.value == "false") {
        ingMeasure.value = "select data";
        document.getElementById("realFoodWarning").innerHTML="Please select ingrident(invalid data can be genarated)";

     
      } else {
        document.getElementById("realFoodWarning").innerHTML="";
        // console.log(this.value);
        $.ajax({
          url: "./ajax/get_ingritent_values.php",
          method: "POST",
          data: { valueId: this.value },
          dataType: "json",
          success: (data) => {
            data.forEach((elemnts) => {
              ingMeasure.value = elemnts.measure;
              getRealPrice();
            });
          },
        });
      }
    };

    var optionIngName = document.createElement("option");
    optionIngName.value = false;
    optionIngName.text = "Select ingrident";
    ingName.appendChild(optionIngName);

    result.forEach((element) => {
      var optionIngName = document.createElement("option");
      optionIngName.value = element.valueId;
      optionIngName.text = element.name;
      ingName.appendChild(optionIngName);
    });

    div.appendChild(ingValu);
    div.appendChild(ingMeasure);
    div.appendChild(ingName);

    var parent = document.getElementById("parentClass");

    parent.appendChild(div);
  });
});

 

function getRealPrice() {
  form = document.getElementById("formCheck");
  var formData = new FormData(form);
  $.ajax({
    url: "./ajax/check_real_cost.php",
    method: "POST",
    processData: false,
    contentType: false,
    data: formData,
    success: (realPrice) => {
      console.log(realPrice);
 
      document.getElementById("realFoodprice").innerHTML = realPrice;
    },
  });
}
