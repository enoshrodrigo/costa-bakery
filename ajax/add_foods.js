function getDataFromDataBase(){
$.ajax({
        url:"./ajax/get_ingritent_values.php",
        type:"POST",
        dataType:"json",
        success:(data)=>{
// console.log(data);
            data.forEach((element) => {
               console.log(element.ingredient_name);
               
            });
        } 
    })
}


document.addEventListener("DOMContentLoaded",()=>{
    getDataFromDataBase();
})