<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/fetch_func.php');
require_once('../../functions/existence_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 5)) {

        if (isset($_POST['id'])) {
        
            $role_id = $_POST['id'];
        
            if (is_numeric($role_id)) {
                
                if (role_existence($dbh, $role_id)) {

                    if ($result = fetch_permissions($dbh)) {

                        foreach($result as $permission) {

                            $perm_id = $permission['id'];

                            if (isset($_POST[$perm_id])) {

                                $my_perm = $_POST[$perm_id];

                                if (is_numeric($my_perm)) {

                                    if ($my_perm == 0) {
                                        
                                        if (rel_role_perm($dbh, $role_id, $perm_id)) {
    
                                            $sql = "DELETE FROM rel_role_perm WHERE role_id = ? AND perm_id = ?";
                                            $sth = $dbh->prepare($sql);
                                            $sth->execute(array($role_id, $perm_id));
    
                                        }
    
                                    } else {
    
                                        if (!rel_role_perm($dbh, $role_id, $perm_id)) {
    
                                            $sql = "INSERT INTO rel_role_perm (role_id, perm_id) VALUES (?, ?)";
                                            $sth = $dbh->prepare($sql);
                                            $sth->execute(array($role_id, $perm_id));
    
                                        }
    
                                    }

                                }

                            }
                            
                        }

                        echo json_encode(array('result' => 0));

                    }

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