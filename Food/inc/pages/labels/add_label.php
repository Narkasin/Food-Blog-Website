<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/input_func.php');

$uploaddir = './../../../uploads/';
$my_arr = array('jpg', 'jpeg', 'png');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 3)) {

        if (isset($_POST['category_id']) && isset($_POST['label_name']) && isset($_POST['label_description']) && $_FILES) {
        
            $category_id = $_POST['category_id'];
            $label_name = $_POST['label_name'];
            $label_description = $_POST['label_description'];
            $name = $_FILES['userfile']['name'];
            $tmp_name = $_FILES['userfile']['tmp_name'];
        
            if (is_numeric($category_id) && input_64($label_name) && input_long($label_description)) {

                if (category_existence($dbh, $category_id)) {
                    
                    if (!label_name_existence($dbh, $label_name, $category_id)) {

                        if ($extension = strtolower(pathinfo($name, PATHINFO_EXTENSION))) {
            
                            if (in_array($extension, $my_arr)) {

                                $sql = "INSERT INTO labels (label_name, category_id, label_description) VALUES (?, ?, ?)";
                                $sth = $dbh->prepare($sql);
                                $sth->execute(array($label_name, $category_id, $label_description));
                                $last_id = $dbh->lastInsertId();
            
                                $my_path = $uploaddir . $last_id . '.' . $extension;
            
                                if (move_uploaded_file($tmp_name, $my_path)) {
            
                                    echo json_encode(array('result' => 0));
            
                                } else {

                                    $sql = "DELETE FROM labels WHERE id = ?";
                                    $sth = $dbh->prepare($sql);
                                    $sth->execute(array($last_id));
            
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
                
            } else {
        
                echo json_encode(array('result' => 6));
        
            }
        
        } else {
        
            echo json_encode(array('result' => 7));
        
        }

    } else {

        echo json_encode(array('result' => 8));

    }

} else {

    echo json_encode(array('result' => 9));

}

?>