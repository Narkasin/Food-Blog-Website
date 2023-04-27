<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 5)) {

        if (isset($_POST['id']) && isset($_POST['role_name'])) {
        
            $role_id = $_POST['id'];
            $role_name = $_POST['role_name'];
        
            if (is_numeric($role_id) && input_64($role_name)) {
                
                if (role_existence($dbh, $role_id)) {

                    if (same_role($dbh, $role_id, $role_name)) {

                        $sql = "UPDATE roles SET role_name = ? WHERE id = ?";
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array($role_name, $role_id));
                        
                        echo json_encode(array('result' => 0));

                    } else {

                        if (!role_name_existence($dbh, $role_name)) {

                            $sql = "UPDATE roles SET role_name = ? WHERE id = ?";
                            $sth = $dbh->prepare($sql);
                            $sth->execute(array($role_name, $role_id));
                            
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