
const apiUrl = "http://localhost/ordinner";
function getUsers() {

    $.ajax({
        url : apiUrl + '/?page=users',
        dataType : 'json',
    })
    .done((res) => {
        
        res.forEach(el => {
            $('.users-list').append(`<tr>
                        <td>${el.id}</td>
                        <td>${el.email}</td>
                        <td>
                        <button class="btn btn-danger" type="button"
                       onclick="deleteUser(${el.id})">
                        <i class="material-icons">delete_forever</i>
                        </button>
                        </td>
                        </tr>
                        `);
        });
       
        
    });
}