const updateProfileForm = document.getElementById("updateProfileForm");
const username = document.getElementById("username");
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const myResult = document.getElementById("myResult");
const updatePasswordForm = document.getElementById("updatePasswordForm");
const password = document.getElementById("password");
const newPassword = document.getElementById("newPassword");
const myPasswordResult = document.getElementById("myPasswordResult");

updateProfileForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("username", username.value);
    fd.append("first_name", fname.value);
    fd.append("last_name", lname.value);
    fd.append("email", email.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 1) {
            
            myResult.innerHTML = "Profile updated";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";

        } else if (result['result'] == 2) {

            myResult.innerHTML = "Username already exists";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 3) {

            myResult.innerHTML = "Please fill in the form correctly";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 4) {
            
            location.reload();

        } else if (result['result'] == 8) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/profile/profile.php");
    ajax.send(fd);

});

updatePasswordForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("pw", password.value);
    fd.append("new_pw", newPassword.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myPasswordResult.innerHTML = "Password updated";
            myPasswordResult.className = "fw-bold text-success";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 1) {

            myPasswordResult.innerHTML = "Incorrect password";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 2) {

            myPasswordResult.innerHTML = "Please fill in the form correctly";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 3) {
            
            location.reload();

        } else if (result['result'] == 4) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/profile/password.php");
    ajax.send(fd);

});