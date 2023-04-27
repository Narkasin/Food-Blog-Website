<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 4)) {

        if (isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['pw']) && isset($_POST['is_superuser']) && isset($_POST['role_id'])) {
        
            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];
            $is_superuser = $_POST['is_superuser'];
            $role_id = $_POST['role_id'];
        
            if (username_input($username) && name_input($first_name) && name_input($last_name) && email_input($email) && pw_input($pw) && is_numeric($is_superuser)) {
        
                $h_pw = hash('sha512', $pw);
        
                if (!username_existence($dbh, $username)) {

                    if ($is_superuser == 0) {

                        if (!empty($role_id)) {

                            if (role_existence($dbh, $role_id)) {

                                $sql = "INSERT INTO users (username, first_name, last_name, email, pw, is_superuser, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
                                $sth = $dbh->prepare($sql);
                                $sth->execute(array($username, $first_name, $last_name, $email, $h_pw, $is_superuser, $role_id));
                                
                                echo json_encode(array('result' => 0));

                            } else {

                                echo json_encode(array('result' => 1));

                            }

                        } else {

                            echo json_encode(array('result' => 2));

                        }

                    } else {

                        $sql = "INSERT INTO users (username, first_name, last_name, email, pw, is_superuser) VALUES (?, ?, ?, ?, ?, ?)";
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array($username, $first_name, $last_name, $email, $h_pw, $is_superuser));
                        
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

} else {

    echo json_encode(array('result' => 8));

}

?>