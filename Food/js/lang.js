function changeLang(myLang) {

    const fd = new FormData();
    fd.append("my_lang", myLang);

    const ajax = new XMLHttpRequest();
    ajax.onload = function() {
        
        const result = JSON.parse(ajax.responseText);

        if (result['result'] == 0) {

            location.reload();

        }
        
    }
    ajax.open("POST", "inc/current_lang.php");
    ajax.send(fd);

}