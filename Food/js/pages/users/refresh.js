const myContent = document.getElementById("myContent");

refresh(myContent);

function refresh(content) {

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);
    
        if (result['result'] == 0) {
    
            const fetch = result['fetch'];
    
            if (fetch == false) {
                content.innerHTML = "";
            } else {
                makeContent(fetch, content);
            }
    
        } else if (result['result'] == 1) {
            
            content.innerHTML = "";
    
        } else if (result['result'] == 2) {
            
            location.replace("index.php");
    
        } else if (result['result'] == 3) {
            
            location.replace("login.php");
            
        }
    
    }
    ajax.open("POST", "inc/refresh/users.php");
    ajax.send();

}

function makeContent(fetch, content) {

    var myVar = "";

    for (let x in fetch) {

        const child = fetch[x];

        myVar += "<tr>";
        myVar += "<td>";
        myVar += "<div class='custom-control custom-checkbox'>";
        myVar += "<input type='checkbox' class='custom-control-input' name='itemsCheck' id='" + child['id'] + "'>";
        myVar += "<label class='custom-control-label' for='" + child['id'] + "'></label>";
        myVar += "</div>";
        myVar += "</td>";
        myVar += "<th scope='row'>" + child['id'] + "</th>";
        myVar += "<td>" + child['username'] + "</td>";
        myVar += "<td>" + child['first_name'] + "</td>";
        myVar += "<td>" + child['last_name'] + "</td>";
        myVar += "<td>" + child['email'] + "</td>";
        if (child['is_active'] == 1) {
            myVar += "<td><span class='tb-status fw-bold text-success'>Active</span></td>";
        } else {
            myVar += "<td><span class='tb-status fw-bold text-danger'>Inactive</span></td>";
        }
        if (child['is_superuser'] == 1) {
            myVar += "<td><span class='tb-status fw-bold text-success'>Super User</span></td>";
        } else {
            myVar += "<td><span class='tb-status fw-bold text-danger'>Not Super User</span></td>";
        }
        myVar += "<td>" + child['role_name'] + "</td>";
        myVar += "<td>" + child['date_joined'] + "</td>";
        myVar += "<td>";
        myVar += "<div class='drodown me-n1'>";
        myVar += "<a href='javascript: void(0);' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>";
        myVar += "<div class='dropdown-menu dropdown-menu-end'>";
        myVar += "<ul class='link-list-opt no-bdr'>";
        myVar += "<li onclick='updateUser(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-edit'></em><span>Update user</span></a></li>";
        myVar += "<li onclick='updatePw(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-lock-alt-fill'></em><span>Update password</span></a></li>";
        myVar += "<li onclick='removeUser(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-trash'></em><span>Remove user</span></a></li>";
        myVar += "</ul>";
        myVar += "</div>";
        myVar += "</div>";
        myVar += "</td>";
        myVar += "</tr>";

    }

    content.innerHTML = myVar;

}