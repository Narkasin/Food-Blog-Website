<?php

session_start();

if (isset($_POST['my_lang'])) {

    $_SESSION['current_lang'] = $_POST['my_lang'];
    echo json_encode(array('result' => 0));

}

?>