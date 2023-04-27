var itemID = 0;
const customCheck1 = document.getElementById("customCheck1");
const itemsCheck = document.getElementsByName("itemsCheck");
const addUserForm = document.getElementById("addUserForm");
const username = document.getElementById("username");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const isSuperuser = document.getElementById("isSuperuser");
const myRole = document.getElementById("myRole");
const role = document.getElementById("role");
const myResult = document.getElementById("myResult");
const updateUserButton = document.getElementById("updateUserButton");
const updateUserForm = document.getElementById("updateUserForm");
const updateUsername = document.getElementById("updateUsername");
const updateFname = document.getElementById("updateFname");
const updateLname = document.getElementById("updateLname");
const updateEmail = document.getElementById("updateEmail");
const updateIsActive = document.getElementById("updateIsActive");
const updateIsSuperuser = document.getElementById("updateIsSuperuser");
const myUpdateRole = document.getElementById("myUpdateRole");
const updateRole = document.getElementById("updateRole");
const myUpdateResult = document.getElementById("myUpdateResult");
const updatePwButton = document.getElementById("updatePwButton");
const updatePwForm = document.getElementById("updatePwForm");
const updatePassword = document.getElementById("updatePassword");
const myUpdatePwResult = document.getElementById("myUpdatePwResult");

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

isSuperuser.addEventListener("change", function() {

    if (isSuperuser.value == 0) {

        myRole.style.display = "block";

    } else {

        myRole.style.display = "none";

    }

});

updateIsSuperuser.addEventListener("change", function() {

    if (updateIsSuperuser.value == 0) {

        myUpdateRole.style.display = "block";

    } else {

        myUpdateRole.style.display = "none";

    }

});

addUserForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("username", username.value);
    fd.append("first_name", fname.value);
    fd.append("last_name", lname.value);
    fd.append("email", email.value);
    fd.append("pw", password.value);
    fd.append("is_superuser", isSuperuser.value);
    fd.append("role_id", role.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 3) {
            
            myResult.innerHTML = "User added";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 1 || result['result'] == 6) {

            location.reload();
            
        } else if (result['result'] == 2 || result['result'] == 5) {

            myResult.innerHTML = "Please fill in the form correctly";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 4) {

            myResult.innerHTML = "Username already exists";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 7) {

            location.replace("index.php");
            
        } else if (result['result'] == 8) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/users/add_user.php");
    ajax.send(fd);

});

updateUserForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("id", itemID);
    fd.append("username", updateUsername.value);
    fd.append("first_name", updateFname.value);
    fd.append("last_name", updateLname.value);
    fd.append("email", updateEmail.value);
    fd.append("is_active", updateIsActive.value);
    fd.append("is_superuser", updateIsSuperuser.value);
    fd.append("role_id", updateRole.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 3 || result['result'] == 4 || result['result'] == 7) {
            
            myUpdateResult.innerHTML = "User updated";
            myUpdateResult.className = "fw-bold text-success";
            myUpdateResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 1 || result['result'] == 5 || result['result'] == 9 || result['result'] == 11) {

            location.reload();
            
        } else if (result['result'] == 2 || result['result'] == 6 || result['result'] == 10) {

            myUpdateResult.innerHTML = "Please fill in the form correctly";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 8) {

            myUpdateResult.innerHTML = "Username already exists";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 12) {

            location.replace("index.php");
            
        } else if (result['result'] == 13) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/users/update_user.php");
    ajax.send(fd);

});

updatePwForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("id", itemID);
    fd.append("pw", updatePassword.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        console.log(ajax.responseText);
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myUpdatePwResult.innerHTML = "Password updated";
            myUpdatePwResult.className = "fw-bold text-success";
            myUpdatePwResult.style.display = "block";

        } else if (result['result'] == 1 || result['result'] == 3) {

            location.reload();
            
        } else if (result['result'] == 2) {

            myUpdatePwResult.innerHTML = "Please fill in the form correctly";
            myUpdatePwResult.className = "fw-bold text-danger";
            myUpdatePwResult.style.display = "block";

        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/users/update_pw.php");
    ajax.send(fd);

});

function updateUser(id) {

    itemID = id;

    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            const fetch = result['fetch'];

            updateUsername.value = fetch['username'];
            updateFname.value = fetch['first_name'];
            updateLname.value = fetch['last_name'];
            updateEmail.value = fetch['email'];
            updateIsActive.value = fetch['is_active'];
            updateIsSuperuser.value = fetch['is_superuser'];
            if (fetch['is_superuser'] == 0) {
        
                myUpdateRole.style.display = "block";
        
            } else {
        
                myUpdateRole.style.display = "none";
        
            }
            updateRole.value = fetch['role_id'];
            updateUserButton.click();

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/refresh/user.php");
    ajax.send(fd);

}

function updatePw(id) {

    itemID = id;
    updatePwButton.click();

}

function removeUser(id) {
    
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
    ajax.open("POST", "inc/pages/users/delete_user.php");
    ajax.send(fd);

}

function removeUsers() {
    
    if (itemsCheck.length > 0) {

        const fd = new FormData();
        for (let i = 0; i < itemsCheck.length; i++) {
            if (itemsCheck[i].checked == true) {
                fd.append(itemsCheck[i].id, itemsCheck[i].id);
            }
        }
    
        const ajax = new XMLHttpRequest();
        ajax.onload = function() {
            
            const result = JSON.parse(ajax.responseText);
    
            if (result['result'] == 0 || result['result'] == 1) {
    
                refresh(myContent);
                
            } else if (result['result'] == 2) {
    
                location.replace("index.php");
                
            } else if (result['result'] == 3) {
                
                location.replace("login.php");
    
            }
    
        }
        ajax.open("POST", "inc/pages/users/delete_users.php");
        ajax.send(fd);
        
    }

}