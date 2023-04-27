const categoryName = document.getElementById("categoryName");
const myContent = document.getElementById("myContent");

refresh(myContent);

categoryName.addEventListener("change", function() {
    refresh(myContent);
});

function refresh(content) {

    const fd = new FormData();
    fd.append("category_id", categoryName.value);
    
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
    
        } else if (result['result'] == 2 || result['result'] == 3) {
            
            location.reload();

        }
    
    }
    ajax.open("POST", "inc/refresh.php");
    ajax.send(fd);

}

function refreshLabel(catId) {

    const fd = new FormData();
    fd.append("category_id", catId);
    
    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);
    
        if (result['result'] == 0) {
    
            const fetch = result['fetch'];
    
            if (fetch == false) {
                myContent.innerHTML = "";
            } else {
                makeContent(fetch, myContent);
            }
    
        } else if (result['result'] == 1) {
            
            myContent.innerHTML = "";
    
        } else if (result['result'] == 2 || result['result'] == 3) {
            
            location.reload();

        }
    
    }
    ajax.open("POST", "inc/refresh-label.php");
    ajax.send(fd);

}

function makeContent(fetch, content) {

    var myVar = "";

    for (let x in fetch) {

        const child = fetch[x];
        
        myVar += "<div class='col-xxl-3 col-lg-4 col-sm-6'>";
        myVar += "<div class='card card-bordered product-card'>";
        myVar += "<div class='product-thumb'>";
        myVar += "<a href='product.php?id=" + child['id'] + "'>";
        myVar += "<img class='card-img-top' src='./uploads/" + child['picture'] + "' alt=''>";
        myVar += "</a>";
        myVar += "</div>";
        myVar += "<div class='card-inner text-center'>";
        myVar += "<ul class='product-tags'>";
        myVar += "<li><a href='javascript: void(0);' onclick='refreshLabel(" + child['category_id'] + ")'>" + child['category_name'] + "</a></li>";
        myVar += "</ul>";
        myVar += "<h5 class='product-title'><a href='product.php?id=" + child['id'] + "'>" + child['label_name'] + "</a></h5>";
        myVar += "</div>";
        myVar += "</div>";
        myVar += "</div>";

    }

    content.innerHTML = myVar;

}