<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 4)) {

        if (isset($_POST['id']) && isset($_POST['pw'])) {
        
            $user_id = $_POST['id'];
            $pw = $_POST['pw'];
        
            if (is_numeric($user_id) && pw_input($pw)) {

                $h_pw = hash('sha512', $pw);

                if (id_existence($dbh, $user_id)) {

                    $sql = "UPDATE users SET pw = ? WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($h_pw, $user_id));
                    
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

} else {

    echo json_encode(array('result' => 5));

}

?>