function getDataFromDataBase(returnData){
  $.ajax({
        url:"./ajax/get_ingritent_values.php",
        type:"POST",
        dataType:"json",
        success:(data)=>{
           
        returnData(data) 
        } 
    })
    
}


document.addEventListener("DOMContentLoaded",()=>{
    getDataFromDataBase((result)=>{

    });
})

document.getElementById("addIngrident").addEventListener("click",()=>{
   getDataFromDataBase(  (result)=>{

    console.log(result[0]);
    var div = document.createElement("div");
    div.className="d-flex justify-content-md-between";
    div.id="";
    
    var ingValu = document.createElement("input");
    ingValu.value="12.5";
    ingValu.type="number";
    ingValu.min="0";
    ingValu.name="ingredient_value[]";
    ingValu.className="form-control w-50 m-2"

    var ingMessure = document.createElement("select");
    ingValu.name="food_measure[]";
    ingMessure.className="form-control w-50 m-2"
    
    var optionMessure = document.createElement("option");
    optionMessure.value="khkj";
    optionMessure.text="123";
    ingMessure.appendChild(optionMessure);

    


    var ingName = document.createElement("select");
    ingName.name="ingredient_name[]";
    ingName.className="form-control w-50 m-2"

    var optionIngName =  document.createElement("option");
    optionIngName.value="flour";
    optionIngName.text="flour";
    ingName.appendChild(optionIngName);

    div.appendChild(ingValu);
    div.appendChild(ingMessure);
    div.appendChild(ingName);



    var parent = document.getElementById("parentClass"); 

    parent.appendChild(div);
   
   });
   
   
    
})