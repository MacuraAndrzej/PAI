
var table = [];
var foodList;
const apiUrl = "http://localhost/ordinner";


function addElement(element){
    element[2]= parseInt( element[2])
    found = "flase";
    table.forEach(el => {
        if (el[2]==element[2])
    {
        el[3] = el[3]+1
        found = "true";

    }
    });
    if(found=="flase")
    {
    element[3] = 1;
    table.push(element)
    }

}
function incrementElement(number)
{
    table.forEach(el => {
        if (el[2]==number)
    {
        el[3] = el[3]+1

    }})
    showOrder()

}
function decrementElement(number)
{
    table.forEach((el,index) => {
        if (el[2]==number)
    {
        el[3] = el[3]-1
        if(el[3]==0)
        {
            table.splice(index,1)
        }

    }
  
    showOrder()
    
})
}
function showOrder()
{
    fullprice=0
    table.forEach(el => {fullprice+=(parseInt(el[1])*parseInt(el[3]))});
    $( "div.ordered" ).empty();
    $( "div.ordered" ).append("zamawiam ")
    table.forEach(el => {
        $( "div.ordered" ).append(printItem(el));
                    });
     $( "div.ordered" ).append(`
     <hr>
     <tr> <td> SUMA ${fullprice} zł </td>
     <td>
     <button class="btn btn-danger" type="button"
    onclick="order()">
    zamawiam
    </button>
    </td>
     </tr>
     `);

}
function order()
{ 
    setTimeout(() => {

        table.forEach(el=>{
        insertOrder(el[2],el[3])
    })
        
    }, 1000);
    

}

function addToOrder(food ) {
    food = food.split(";")
    addElement(food);
    showOrder()
    
 //   $( "div.ordered" ).text(table);
 //$( "div.ordered" ).append(table.forEach(element =>'dodaje element + ${element} <br>'));

    }
function printItem(element)
{
    return `<tr>
 <td>${element[0]}</td>
 <td>     ${element[1]}zł</td>
 <td>
 <button class="btn btn-danger" type="button"
 onclick="decrementElement(${element[2]})">
 -
 </button>
 ${element[3]}
 <button class="btn btn-danger" type="button"
 onclick="incrementElement(${element[2]})">
 +
 </button>
 ${element[3]*element[1] } zł
 </td>
 </tr>`
}

function insertOrder(foodId,count) {

 $.ajax({
 url : apiUrl + '/?page=order',
 method : "POST",
 data : {
    foodId : foodId,
    count : count,
 }
 });
}
function getFoods(typeId) {
 $.ajax({
 url : apiUrl + '/?page=food',
 method : "POST",
 dataType : 'json',
 data : {
    typeId : typeId
 }
 })
 .done((res) => {
    foodList = res
    
    });
}

function printMenu(typeId)
{
    getFoods(typeId);
    setTimeout(() => {
    $( "div.menu" ).empty() ;
    foodList.forEach(food => {
    $( "div.menu" ).append( 
    `
            
            <div class = menuWraper>
            <p id="demo" onclick="addToOrder('${food.name} ; ${food.price} ; ${food.id}')"><img src="../ordinner/Public/img/uploads/${food.image} ">${food.name}</p>
            
        </div>
        `
    )});
}, 1000);

}


