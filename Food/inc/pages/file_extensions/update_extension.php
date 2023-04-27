<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 1)) {

        if (isset($_POST['id']) && isset($_POST['extension_name'])) {
        
            $extension_id = $_POST['id'];
            $extension_name = $_POST['extension_name'];
        
            if (is_numeric($extension_id) && input_64($extension_name)) {
                
                if (extension_existence($dbh, $extension_id)) {

                    if (same_extension($dbh, $extension_id, $extension_name)) {

                        $sql = "UPDATE file_extensions SET extension_name = ? WHERE id = ?";
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array($extension_name, $extension_id));
                        
                        echo json_encode(array('result' => 0));

                    } else {

                        if (!extension_name_existence($dbh, $extension_name)) {

                            $sql = "UPDATE file_extensions SET extension_name = ? WHERE id = ?";
                            $sth = $dbh->prepare($sql);
                            $sth->execute(array($extension_name, $extension_id));
                            
                            echo json_encode(array('result' => 1));

                        } else {

                            echo json_encode(array('result' => 2));

                        }

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

    } else {

        echo json_encode(array('result' => 6));

    }

} else {

    echo json_encode(array('result' => 7));

}

?>