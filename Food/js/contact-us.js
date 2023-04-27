document.addEventListener("DOMContentLoaded", function() {

    const myForm = document.getElementById("myForm");
    const fullname = document.getElementById("fullname");
    const email = document.getElementById("email");
    const mySubject = document.getElementById("mySubject");
    const myDescription = document.getElementById("myDescription");
    const myResult = document.getElementById("myResult");

    myForm.addEventListener("submit", function() {

        const fd = new FormData();
        fd.append("extension_name", fullname.value);
        fd.append("email", email.value);
        fd.append("extension_subject", mySubject.value);
        fd.append("extension_description", myDescription.value);

        const ajax = new XMLHttpRequest();
        ajax.onload = function() {
            
            const result = JSON.parse(ajax.responseText);

            if (result['result'] == 0) {

                myResult.innerHTML = "Message sent successfully";
                myResult.className = "fw-bold text-success";
                myResult.style.display = "block";

            } else if (result['result'] == 1) {

                myResult.innerHTML = "Please fill in the form correctly";
                myResult.className = "fw-bold text-danger";
                myResult.style.display = "block";

            } else if (result['result'] == 2) {

                location.reload();
                
            }

        }
        ajax.open("POST", "inc/contact-us.php");
        ajax.send(fd);

    });

});