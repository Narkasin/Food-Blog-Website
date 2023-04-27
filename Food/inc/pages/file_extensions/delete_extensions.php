<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/fetch_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 1)) {

        if ($result = fetch_file_extensions($dbh)) {

            foreach($result as $extension) {

                $extension_id = $extension['id'];
    
                if (isset($_POST[$extension_id])) {
    
                    $sql = "DELETE FROM file_extensions WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($extension_id));
                    
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