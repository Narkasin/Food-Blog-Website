<?php

session_start();

require_once('../dbh/dbh.php');
require_once('../functions/general_func.php');
require_once('../functions/existence_func.php');
require_once('../functions/fetch_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 5)) {

        if (isset($_POST['id'])) {
        
            $role_id = $_POST['id'];
        
            if (is_numeric($role_id)) {
                
                if (role_existence($dbh, $role_id)) {
                    
                    $result = fetch_role($dbh, $role_id);
                    echo json_encode(array('result' => 0, 'fetch' => $result));

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