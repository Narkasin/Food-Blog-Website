var itemID = 0;
const customCheck1 = document.getElementById("customCheck1");
const itemsCheck = document.getElementsByName("itemsCheck");
const addRoleForm = document.getElementById("addRoleForm");
const roleName = document.getElementById("roleName");
const myResult = document.getElementById("myResult");
const updateRoleButton = document.getElementById("updateRoleButton");
const updateRoleForm = document.getElementById("updateRoleForm");
const updateRoleName = document.getElementById("updateRoleName");
const myUpdateResult = document.getElementById("myUpdateResult");
const updatePermissionsButton = document.getElementById("updatePermissionsButton");
const updatePermissionsForm = document.getElementById("updatePermissionsForm");
const customCheck2 = document.getElementById("customCheck2");
const myUpdatePermissionsResult = document.getElementById("myUpdatePermissionsResult");

customCheck1.addEventListener("click", function() {

    if (customCheck1.checked == true) {

        if (itemsCheck.length > 0) {

            for (let x = 0; x < itemsCheck.length; x++) {
                itemsCheck[x].checked = true;
            }

        }

    } else {

        if (itemsCheck.length > 0) {

            for (let x = 0; x < itemsCheck.length; x++) {
                itemsCheck[x].checked = false;
            }

        }

    }

});

customCheck2.addEventListener("click", function() {

    const permissionsCheck = document.getElementsByName("permissionsCheck");

    if (customCheck2.checked == true) {

        if (permissionsCheck.length > 0) {

            for (let x = 0; x < permissionsCheck.length; x++) {
                permissionsCheck[x].checked = true;
            }

        }

    } else {

        if (permissionsCheck.length > 0) {

            for (let x = 0; x < permissionsCheck.length; x++) {
                permissionsCheck[x].checked = false;
            }

        }

    }

});

addRoleForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("role_name", roleName.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myResult.innerHTML = "Role added";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 1) {

            myResult.innerHTML = "Role name already exists";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 2) {

            myResult.innerHTML = "Please fill in the form correctly";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 3) {
            
            location.reload();

        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/roles/add_role.php");
    ajax.send(fd);

});

updateRoleForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("id", itemID);
    fd.append("role_name", updateRoleName.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 1) {
            
            myUpdateResult.innerHTML = "Role updated";
            myUpdateResult.className = "fw-bold text-success";
            myUpdateResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 2) {

            myUpdateResult.innerHTML = "Role name already exists";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 3 || result['result'] == 5) {
            
            location.reload();

        } else if (result['result'] == 4) {

            myUpdateResult.innerHTML = "Please fill in the form correctly";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 6) {

            location.replace("index.php");
            
        } else if (result['result'] == 7) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/roles/update_role.php");
    ajax.send(fd);

});

function updateRole(id) {

    itemID = id;

    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            const fetch = result['fetch'];

            updateRoleName.value = fetch['role_name'];
            updateRoleButton.click();

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/refresh/role_name.php");
    ajax.send(fd);

}

function removeRole(id) {
    
    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {

            refresh(myContent);

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/roles/delete_role.php");
    ajax.send(fd);

}

function removeRoles() {
    
    if (itemsCheck.length > 0) {

        const fd = new FormData();
        for (let i = 0; i < itemsCheck.length; i++) {
            if (itemsCheck[i].checked == true) {
                fd.append(itemsCheck[i].id, itemsCheck[i].id);
            }
        }
    
        const ajax = new XMLHttpRequest();
        ajax.onload = function() {
            console.log(ajax.responseText);
            const result = JSON.parse(ajax.responseText);
    
            if (result['result'] == 0 || result['result'] == 1) {
    
                refresh(myContent);
                
            } else if (result['result'] == 2) {
    
                location.replace("index.php");
                
            } else if (result['result'] == 3) {
                
                location.replace("login.php");
    
            }
    
        }
        ajax.open("POST", "inc/pages/roles/delete_roles.php");
        ajax.send(fd);
        
    }

}

updatePermissionsForm.addEventListener("submit", function() {
    
    const permissionsCheck = document.getElementsByName("permissionsCheck");

    if (permissionsCheck.length > 0) {

        const fd = new FormData();
        fd.append("id", itemID);
        for (let i = 0; i < permissionsCheck.length; i++) {
            fd.append(permissionsCheck[i].id, Number(permissionsCheck[i].checked));
        }
    
        const ajax = new XMLHttpRequest();
        ajax.onload = function() {
            
            const result = JSON.parse(ajax.responseText);
    
            if (result['result'] == 0) {
                
                myUpdatePermissionsResult.innerHTML = "Permissions updated";
                myUpdatePermissionsResult.className = "fw-bold text-success";
                myUpdatePermissionsResult.style.display = "block";
    
            } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
                
                location.reload();
    
            } else if (result['result'] == 4) {
    
                location.replace("index.php");
                
            } else if (result['result'] == 5) {
                
                location.replace("login.php");
    
            }
    
        }
        ajax.open("POST", "inc/pages/roles/permissions.php");
        ajax.send(fd);

    }

});

function setPermissions(id) {

    itemID = id;

    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            const fetch = result['fetch'];
            
            if (fetch == false) {
                myPermissionsContent.innerHTML = "";
            } else {
                makePermissionsContent(fetch, myPermissionsContent);
            }

            updatePermissionsButton.click();

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/refresh/permissions.php");
    ajax.send(fd);

}

function makePermissionsContent(fetch, content) {

    myVar = "";

    for (let x in fetch) {

        const child = fetch[x];

        myVar += "<tr>";
        myVar += "<td>";
        myVar += "<div class='custom-control custom-checkbox'>";
        if (child['rel_role_perm'] == true) {
            myVar += "<input type='checkbox' class='custom-control-input' name='permissionsCheck' id='" + child['id'] + "' checked>";
        } else {
            myVar += "<input type='checkbox' class='custom-control-input' name='permissionsCheck' id='" + child['id'] + "'>";
        }
        myVar += "<label class='custom-control-label' for='" + child['id'] + "'></label>";
        myVar += "</div>";
        myVar += "</td>";
        myVar += "<th scope='row'>" + child['id'] + "</th>";
        myVar += "<td>" + child['permission_name'] + "</td>";
        myVar += "</tr>";

    }

    content.innerHTML = myVar;

}