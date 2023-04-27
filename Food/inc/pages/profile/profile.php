<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (isset($_POST['username']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email'])) {

        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
    
        if (username_input($username) && name_input($first_name) && name_input($last_name) && email_input($email)) {
            
            if (same_username($dbh, $id, $username)) {

                $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ? WHERE id = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($username, $first_name, $last_name, $email, $id));
                
                echo json_encode(array('result' => 0));

            } else {

                if (!username_existence($dbh, $username)) {
                    
                    $sql = "UPDATE users SET username = ?, first_name = ?, last_name = ?, email = ? WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($username, $first_name, $last_name, $email, $id));
                    
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

?>