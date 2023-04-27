<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/fetch_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 4)) {

        if ($result = fetch_users($dbh)) {

            foreach($result as $user) {

                $user_id = $user['id'];
    
                if (isset($_POST[$user_id])) {
    
                    $sql = "DELETE FROM users WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($user_id));
                    
                }

            }

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

?>