var itemID = 0;
const customCheck1 = document.getElementById("customCheck1");
const itemsCheck = document.getElementsByName("itemsCheck");
const addExtensionForm = document.getElementById("addExtensionForm");
const extensionName = document.getElementById("extensionName");
const myResult = document.getElementById("myResult");
const updateExtensionButton = document.getElementById("updateExtensionButton");
const updateExtensionForm = document.getElementById("updateExtensionForm");
const updateExtensionName = document.getElementById("updateExtensionName");
const myUpdateResult = document.getElementById("myUpdateResult");

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

addExtensionForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("extension_name", extensionName.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myResult.innerHTML = "Extension added";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 1) {

            myResult.innerHTML = "Extension name already exists";
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
    ajax.open("POST", "inc/pages/file_extensions/add_extension.php");
    ajax.send(fd);

});

updateExtensionForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("id", itemID);
    fd.append("extension_name", updateExtensionName.value);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 1) {
            
            myUpdateResult.innerHTML = "Extension updated";
            myUpdateResult.className = "fw-bold text-success";
            myUpdateResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 2) {

            myUpdateResult.innerHTML = "Extension name already exists";
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
    ajax.open("POST", "inc/pages/file_extensions/update_extension.php");
    ajax.send(fd);

});

function updateExtension(id) {

    itemID = id;

    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            const fetch = result['fetch'];

            updateExtensionName.value = fetch['extension_name'];
            updateExtensionButton.click();

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/refresh/extension_name.php");
    ajax.send(fd);

}

function removeExtension(id) {
    
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
    ajax.open("POST", "inc/pages/file_extensions/delete_extension.php");
    ajax.send(fd);

}

function removeExtensions() {
    
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
        ajax.open("POST", "inc/pages/file_extensions/delete_extensions.php");
        ajax.send(fd);
        
    }

}