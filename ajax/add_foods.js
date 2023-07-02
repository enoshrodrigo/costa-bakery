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

document.addEventListener("DOMContentLoaded", () => {
  getDataFromDataBase((result) => {});
});

document.getElementById("addIngrident").addEventListener("click", () => {
  getDataFromDataBase((result) => {
    console.log(result);
    var div = document.createElement("div");
    div.className = "d-flex justify-content-md-between";
    div.id = "";

    var ingValu = document.createElement("input");
    ingValu.value = "12.5";
    ingValu.type = "number";
    ingValu.min = "0";
    ingValu.name = "ingredient_value[]";
    ingValu.className = "form-control w-50 m-2";
    ingValu.id = "";

    var ingMeasure = document.createElement("input");
    ingMeasure.name = "food_measure[]";
    ingMeasure.className = "form-control w-50 m-2";
    ingMeasure.readOnly = true;

     

    var ingName = document.createElement("select");
    ingName.name = "ingredient_name[]";
    ingName.className = "form-control w-50 m-2";
    ingName.onchange = function () {
      if(this.value=="false"){
        ingMeasure.value="select data";
      }else{
      // console.log(this.value);
      $.ajax({
        url: "./ajax/get_ingritent_values.php",
        method: "POST",
        data: { valueId: this.value },
        dataType: "json",
        success: (data) => {
          data.forEach((elemnts) => {
            ingMeasure.value = elemnts.measure;
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
