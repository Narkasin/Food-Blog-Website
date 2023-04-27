var itemID = 0;
const customCheck1 = document.getElementById("customCheck1");
const itemsCheck = document.getElementsByName("itemsCheck");
const addLabelForm = document.getElementById("addLabelForm");
const categoryName = document.getElementById("categoryName");
const LabelName = document.getElementById("LabelName");
const customFile = document.getElementById("customFile");
const myResult = document.getElementById("myResult");
const updateLabelButton = document.getElementById("updateLabelButton");
const updateLabelForm = document.getElementById("updateLabelForm");
const updateCategoryName = document.getElementById("updateCategoryName");
const updateLabelName = document.getElementById("updateLabelName");
const updatecustomFile = document.getElementById("updatecustomFile");
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

addLabelForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("category_id", categoryName.value);
    fd.append("label_name", LabelName.value);
    fd.append("label_description", miniquill.root.innerHTML);
    fd.append("userfile", customFile.files[0]);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            myResult.innerHTML = "Food added";
            myResult.className = "fw-bold text-success";
            myResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 1) {

            myResult.innerHTML = "Could not upload file";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 2) {

            myUpdateResult.innerHTML = "Only jpg, jpeg and png allowed";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 3) {

            myUpdateResult.innerHTML = "File has no extension";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 4) {

            myResult.innerHTML = "Title already exists";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 6) {

            myResult.innerHTML = "Please fill in the form correctly";
            myResult.className = "fw-bold text-danger";
            myResult.style.display = "block";

        } else if (result['result'] == 5 || result['result'] == 7) {
            
            location.reload();

        } else if (result['result'] == 8) {

            location.replace("index.php");
            
        } else if (result['result'] == 9) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/pages/labels/add_label.php");
    ajax.send(fd);

});

updateLabelForm.addEventListener("submit", function() {

    const fd = new FormData();
    fd.append("id", itemID);
    fd.append("category_id", updateCategoryName.value);
    fd.append("label_name", updateLabelName.value);
    fd.append("label_description", miniquilltwo.root.innerHTML);
    fd.append("userfile", updatecustomFile.files[0]);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        console.log(ajax.responseText);
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0 || result['result'] == 1) {
            
            myUpdateResult.innerHTML = "Food updated";
            myUpdateResult.className = "fw-bold text-success";
            myUpdateResult.style.display = "block";
            refresh(myContent);

        } else if (result['result'] == 2) {

            myUpdateResult.innerHTML = "Title already exists";
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

        } else if (result['result'] == 8) {

            myUpdateResult.innerHTML = "Could not upload file";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 9) {

            myUpdateResult.innerHTML = "Only jpg, jpeg and png allowed";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        } else if (result['result'] == 10) {

            myUpdateResult.innerHTML = "File has no extension";
            myUpdateResult.className = "fw-bold text-danger";
            myUpdateResult.style.display = "block";

        }

    }
    ajax.open("POST", "inc/pages/labels/update_label.php");
    ajax.send(fd);

});

function updateLabel(id) {

    itemID = id;

    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {
            
            const fetch = result['fetch'];

            updateCategoryName.value = fetch['category_id'];
            updateLabelName.value = fetch['label_name'];
            miniquilltwo.root.innerHTML = fetch['label_description'];
            updateLabelButton.click();

        } else if (result['result'] == 1 || result['result'] == 2 || result['result'] == 3) {
            
            location.reload();
            
        } else if (result['result'] == 4) {

            location.replace("index.php");
            
        } else if (result['result'] == 5) {
            
            location.replace("login.php");

        }

    }
    ajax.open("POST", "inc/refresh/label_name.php");
    ajax.send(fd);

}

function removeLabel(id) {
    
    const fd = new FormData();
    fd.append("id", id);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        console.log(ajax.responseText);
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
    ajax.open("POST", "inc/pages/labels/delete_label.php");
    ajax.send(fd);

}

function removeLabels() {
    
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
        ajax.open("POST", "inc/pages/labels/delete_labels.php");
        ajax.send(fd);
        
    }

}