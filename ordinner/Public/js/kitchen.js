var orders;
var current = 0;
const apiUrl = "http://localhost/ordinner";
function getOrders() {
    $.ajax({
    url : apiUrl + '/?page=orders',
    method : "POST",
    dataType : 'json',
    })
    .done((res) => {
       orders = res
       
       });
   }


function printOrder()
   {
    getOrders();
        setTimeout(() => {
       $( "tbody.order-list" ).empty() ;
       if(orders.length==0)
       {
        $( "tbody.order-list" ).empty() ;
           return
       }
       orders.forEach((order,index) => {
           if(index ==current)
           {
            $( "tbody.order-list" ).append(   `<tr bgcolor="#FFCCCB">
            <td>${index}</td>
            <td>${order.name}</td>
            <td>${order.quantity}</td>
            <td>
            </td>
            </tr>
            `)
           }
       else{
        $( "tbody.order-list" ).append(   `<tr>
        <td>${index} </td>
        <td>${order.name}</td>
        <td>${order.quantity}</td>
        <td>
        </td>
        </tr>
        `)
       }

      });
   }, 1000);
   
   }
   function next()
   {
       if(orders.length==0)
       {
           return;
       }
       current = current+1
       if (current ==-1)
       {
        current = orders.length-1
       }
       if(current>=orders.length)
       {
        current = 0
       }
       printOrder()
   }
   function remove()
   {
       if(current>=orders.length)
       {
           return
       }
       compliteOrder(orders[current].Id)
       printOrder()
   }
   function compliteOrder(orderId) {

    $.ajax({
    url : apiUrl + '/?page=ready',
    method : "POST",
    data : {
        orderId : orderId,
    }
    });
   }



