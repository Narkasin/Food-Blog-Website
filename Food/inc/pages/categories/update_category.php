<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 2)) {

        if (isset($_POST['id']) && isset($_POST['category_name'])) {
        
            $category_id = $_POST['id'];
            $category_name = $_POST['category_name'];
        
            if (is_numeric($category_id) && input_64($category_name)) {
                
                if (category_existence($dbh, $category_id)) {

                    if (same_category($dbh, $category_id, $category_name)) {

                        $sql = "UPDATE categories SET category_name = ? WHERE id = ?";
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array($category_name, $category_id));
                        
                        echo json_encode(array('result' => 0));

                    } else {

                        if (!category_name_existence($dbh, $category_name)) {

                            $sql = "UPDATE categories SET category_name = ? WHERE id = ?";
                            $sth = $dbh->prepare($sql);
                            $sth->execute(array($category_name, $category_id));
                            
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