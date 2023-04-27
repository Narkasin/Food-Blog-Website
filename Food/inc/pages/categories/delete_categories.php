<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/fetch_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 2)) {

        if ($result = fetch_categories($dbh)) {

            foreach($result as $category) {

                $category_id = $category['id'];
    
                if (isset($_POST[$category_id])) {
    
                    $sql = "DELETE FROM categories WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($category_id));
                    
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