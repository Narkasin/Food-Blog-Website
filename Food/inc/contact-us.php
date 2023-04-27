<?php

require_once('dbh/dbh.php');
require_once('functions/input_func.php');

if (isset($_POST['extension_name']) && isset($_POST['email']) && isset($_POST['extension_subject']) && isset($_POST['extension_description'])) {

    $extension_name = $_POST['extension_name'];
    $email = $_POST['email'];
    $extension_subject = $_POST['extension_subject'];
    $extension_description = $_POST['extension_description'];

    if (name_input($extension_name) && email_input($email) && input_256($extension_subject) && input_512($extension_description)) {

        $sql = "INSERT INTO file_extensions (extension_name, email, extension_subject, extension_description) VALUES (?, ?, ?, ?)";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($extension_name, $email, $extension_subject, $extension_description));
        
        echo json_encode(array('result' => 0));
        
    } else {

        echo json_encode(array('result' => 1));

    }

} else {

    echo json_encode(array('result' => 2));

}

?>