document.addEventListener("DOMContentLoaded", function() {

    const myForm = document.getElementById("myForm");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const myResult = document.getElementById("myResult");

    myForm.addEventListener("submit", function() {

        const fd = new FormData();
        fd.append("username", username.value);
        fd.append("pw", password.value);

        const ajax = new XMLHttpRequest();
        ajax.onload = function() {

            console.log(ajax.responseText);

            const result = JSON.parse(ajax.responseText);

            if (result['result'] == 0) {

                location.replace("index.php");

            } else if (result['result'] == 1) {

                myResult.innerHTML = incorrectPassword;
                myResult.style.display = "block";

            } else if (result['result'] == 2) {

                myResult.innerHTML = invalidUsername;
                myResult.style.display = "block";

            } else if (result['result'] == 3) {

                myResult.innerHTML = please;
                myResult.style.display = "block";

            } else if (result['result'] == 4) {

                location.reload();
                
            }

        }
        ajax.open("POST", "inc/login.php");
        ajax.send(fd);

    });

});