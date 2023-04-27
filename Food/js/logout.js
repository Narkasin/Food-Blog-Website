document.addEventListener("DOMContentLoaded", function() {

    const logOut = document.getElementById("logOut");

    logOut.addEventListener("click", function() {
        
        const ajax = new XMLHttpRequest();
        ajax.onload = function() {

            console.log(ajax.responseText);

            const result = JSON.parse(ajax.responseText);

            if (result['result'] == 0) {
                location.replace("login.php");
            }

        }
        ajax.open("POST", "inc/logout.php");
        ajax.send();

    });

});