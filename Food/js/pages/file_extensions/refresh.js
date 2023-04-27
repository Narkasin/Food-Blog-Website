const myContent = document.getElementById("myContent");

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
    ajax.open("POST", "inc/refresh/file_extensions.php");
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
        myVar += "<td>" + child['extension_name'] + "</td>";
        myVar += "<td>" + child['email'] + "</td>";
        myVar += "<td>" + child['extension_subject'] + "</td>";
        myVar += "<td>" + child['extension_description'] + "</td>";
        myVar += "<td>" + child['created_at'] + "</td>";
        myVar += "<td>";
        myVar += "<div class='drodown me-n1'>";
        myVar += "<a href='javascript: void(0);' class='dropdown-toggle btn btn-icon btn-trigger' data-bs-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>";
        myVar += "<div class='dropdown-menu dropdown-menu-end'>";
        myVar += "<ul class='link-list-opt no-bdr'>";
        myVar += "<li onclick='removeExtension(" + child['id'] + ")'><a href='javascript: void(0);'><em class='icon ni ni-trash'></em><span>Remove message</span></a></li>";
        myVar += "</ul>";
        myVar += "</div>";
        myVar += "</div>";
        myVar += "</td>";
        myVar += "</tr>";

    }

    content.innerHTML = myVar;

}