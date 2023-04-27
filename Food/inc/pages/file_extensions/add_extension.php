<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 1)) {

        if (isset($_POST['extension_name'])) {
        
            $extension_name = $_POST['extension_name'];
        
            if (input_64($extension_name)) {
        
                if (!extension_name_existence($dbh, $extension_name)) {

                    $sql = "INSERT INTO file_extensions (extension_name) VALUES (?)";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($extension_name));
                    
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