<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/input_func.php');

$my_id = 1;

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 6)) {

        if (isset($_POST['my_title'])) {
        
            $my_title = $_POST['my_title'];
        
            if (input_32($my_title)) {

                $sql = "UPDATE my_settings SET my_title = ? WHERE id = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($my_title, $my_id));
                
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