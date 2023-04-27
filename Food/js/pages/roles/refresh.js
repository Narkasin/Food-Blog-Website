const myContent = document.getElementById("myContent");
const myPermissionsContent = document.getElementById("myPermissionsContent");

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
    ajax.open("POST", "inc/refresh/roles.php");
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
        myVar += "<td>" + child['role_name'] + "</td>";
        myVar += "<td><a href='javascript: void(0);' onclick='setPermissions(" + child['id'] + ")'><em class='icon ni ni-user-list-fill'></em></a></td>";
        myVar += "<td>" + child['creation_date'] + "</td>";
        myVar += "<td>" + child['modification_date'] + "</td>";
        myVar += "<td>";
        myVar += "<div class='drodown me-n1'>";
        myVar += "<a href='javascript: void(0);' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>";
        myVar += "<div class='dropdown-menu dropdown-menu-end'>";
        myVar += "<ul class='link-list-opt no-bdr'>";
        myVar += "<li onclick='updateRole(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-edit'></em><span>Update role</span></a></li>";
        myVar += "<li onclick='removeRole(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-trash'></em><span>Remove role</span></a></li>";
        myVar += "</ul>";
        myVar += "</div>";
        myVar += "</div>";
        myVar += "</td>";
        myVar += "</tr>";

    }

    content.innerHTML = myVar;

}