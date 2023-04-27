const updateProfileForm = document.getElementById("updateProfileForm");
const mytitle = document.getElementById("mytitle");
const myResult = document.getElementById("myResult");
const updatePasswordForm = document.getElementById("updatePasswordForm");
const customFile = document.getElementById("customFile");
const myPasswordResult = document.getElementById("myPasswordResult");
const updateAboutForm = document.getElementById("updateAboutForm");
const myAboutResult = document.getElementById("myAboutResult");

updateProfileForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("my_title", mytitle.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myResult.innerHTML = "Title updated";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";

        } else if (result['result'] == 1) {

            myResult.innerHTML = "Please fill in the form correctly";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 2) {
            
            location.reload();

        } else if (result['result'] == 3) {
            
            location.replace();
            
        } else if (result['result'] == 4) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/settings/title.php");
    ajax.send(fd);

});

updatePasswordForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("userfile", customFile.files[0]);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myPasswordResult.innerHTML = "Logo updated";
            myPasswordResult.className = "fw-bold text-success";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 1) {

            myPasswordResult.innerHTML = "Could not upload logo";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 2) {

            myPasswordResult.innerHTML = "Only jpg, jpeg and png formats are allowed";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 3) {

            myPasswordResult.innerHTML = "File does not have an extension";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 4) {

            myPasswordResult.innerHTML = "Please choose a file";
            myPasswordResult.className = "fw-bold text-danger";
            myPasswordResult.style.display = "block";

        } else if (result['result'] == 5) {
            
            location.replace("index.php");

        } else if (result['result'] == 6) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/settings/logo.php");
    ajax.send(fd);

});

updateAboutForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("my_about", miniquill.root.innerHTML);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myAboutResult.innerHTML = "Updated";
            myAboutResult.className = "fw-bold text-success";
            myAboutResult.style.display = "block";

        } else if (result['result'] == 1) {

            myAboutResult.innerHTML = "Please fill in the form correctly";
            myAboutResult.className = "fw-bold text-danger";
            myAboutResult.style.display = "block";

        } else if (result['result'] == 2) {
            
            location.reload();

        } else if (result['result'] == 3) {
            
            location.replace();
            
        } else if (result['result'] == 4) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/settings/about.php");
    ajax.send(fd);

});