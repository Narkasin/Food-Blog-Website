<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 4)) {

        if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['is_active']) && isset($_POST['is_superuser']) && isset($_POST['role_id'])) {
        
            $user_id = $_POST['id'];
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $is_active = $_POST['is_active'];
            $is_superuser = $_POST['is_superuser'];
            $role_id = $_POST['role_id'];
        
            if (is_numeric($user_id) && username_input($username) && name_input($first_name) && name_input($last_name) && email_input($email) && is_numeric($is_active) && is_numeric($is_superuser)) {

                if (id_existence($dbh, $user_id)) {
                    
                    if (same_username($dbh, $user_id, $username)) {

                        if ($is_superuser == 0) {
    
                            if (!empty($role_id)) {
    
                                if (role_existence($dbh, $role_id)) {
    
                                    $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?, is_active = ?, is_superuser = ?, role_id = ? WHERE id = ?";
                                    $sth = $dbh->prepare($sql);
                                    $sth->execute(array($username, $first_name, $last_name, $email, $is_active, $is_superuser, $role_id, $user_id));
                                    
                                    echo json_encode(array('result' => 0));
    
                                } else {
    
                                    echo json_encode(array('result' => 1));
    
                                }
    
                            } else {
                            
                                echo json_encode(array('result' => 2));
    
                            }
    
                        } else {
    
                            $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?, is_active = ?, is_superuser = ? WHERE id = ?";
                            $sth = $dbh->prepare($sql);
                            $sth->execute(array($username, $first_name, $last_name, $email, $is_active, $is_superuser, $user_id));
                            
                            echo json_encode(array('result' => 3));
    
                        }

                    } else {

                        if (!username_existence($dbh, $username)) {
        
                            if ($is_superuser == 0) {
        
                                if (!empty($role_id)) {
        
                                    if (role_existence($dbh, $role_id)) {
        
                                        $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?, is_active = ?, is_superuser = ?, role_id = ? WHERE id = ?";
                                        $sth = $dbh->prepare($sql);
                                        $sth->execute(array($username, $first_name, $last_name, $email, $is_active, $is_superuser, $role_id, $user_id));
                                        
                                        echo json_encode(array('result' => 4));
        
                                    } else {
        
                                        echo json_encode(array('result' => 5));
        
                                    }
        
                                } else {
                            
                                    echo json_encode(array('result' => 6));
        
                                }
        
                            } else {
        
                                $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ?, is_active = ?, is_superuser = ? WHERE id = ?";
                                $sth = $dbh->prepare($sql);
                                $sth->execute(array($username, $first_name, $last_name, $email, $is_active, $is_superuser, $user_id));
                                
                                echo json_encode(array('result' => 7));
        
                            }
        
                        } else {
                
                            echo json_encode(array('result' => 8));
                
                        }

                    }

                } else {

                    echo json_encode(array('result' => 9));

                }

            } else {
        
                echo json_encode(array('result' => 10));
        
            }
        
        } else {
        
            echo json_encode(array('result' => 11));
        
        }

    } else {

        echo json_encode(array('result' => 12));

    }

} else {

    echo json_encode(array('result' => 13));

}

?>