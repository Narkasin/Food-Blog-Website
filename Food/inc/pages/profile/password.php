<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (isset($_POST['pw']) && isset($_POST['new_pw'])) {

        $pw = $_POST['pw'];
        $new_pw = $_POST['new_pw'];
    
        if (pw_input($pw) && pw_input($new_pw)) {

            $h_pw = hash('sha512', $pw);
            $h_new_pw = hash('sha512', $new_pw);

            if (same_pw($dbh, $id, $h_pw)) {

                $sql = "UPDATE users SET pw = ? WHERE id = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($h_new_pw, $id));
                
                echo json_encode(array('result' => 0));

            } else {

                echo json_encode(array('result' => 1));

            }
            
        } else {
    
            echo json_encode(array('result' => 2));
    
        }
    
    } else {
    
        echo json_encode(array('result' => 3));
    
    }

} else {

    echo json_encode(array('result' => 4));

}

?>