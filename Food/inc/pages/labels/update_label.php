<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/existence_func.php');
require_once('../../functions/fetch_func.php');
require_once('../../functions/input_func.php');

$uploaddir = './../../../uploads/';
$my_arr = array('jpg', 'jpeg', 'png');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 3)) {

        if (isset($_POST['category_id']) && isset($_POST['id']) && isset($_POST['label_name']) && isset($_POST['label_description'])) {
        
            $category_id = $_POST['category_id'];
            $label_id = $_POST['id'];
            $label_name = $_POST['label_name'];
            $label_description = $_POST['label_description'];
        
            if (is_numeric($category_id) && is_numeric($label_id) && input_64($label_name) && input_long($label_description)) {
                
                if (category_existence($dbh, $category_id) && label_existence($dbh, $label_id)) {

                    $result = fetch_label($dbh, $label_id);
                    $label_category_id = $result['category_id'];

                    if (same_label($dbh, $label_id, $label_name, $label_category_id)) {

                        $sql = "UPDATE labels SET label_name = ?, category_id = ?, label_description = ? WHERE id = ?";
                        $sth = $dbh->prepare($sql);
                        $sth->execute(array($label_name, $category_id, $label_description, $label_id));

                        if ($_FILES) {
                            
                            $name = $_FILES['userfile']['name'];
                            $tmp_name = $_FILES['userfile']['tmp_name'];

                            if ($extension = strtolower(pathinfo($name, PATHINFO_EXTENSION))) {
                
                                if (in_array($extension, $my_arr)) {
                
                                    $my_path = $uploaddir . $label_id . '.' . $extension;
                                    
                                    if (file_exists($uploaddir . $label_id . '.jpg')) {
                                        $picture = $uploaddir . $label_id . '.jpg';
                                        unlink($picture);
                                    } elseif (file_exists($uploaddir . $label_id . '.jpeg')) {
                                        $picture = $uploaddir . $label_id . '.jpeg';
                                        unlink($picture);
                                    } elseif (file_exists($uploaddir . $label_id . '.png')) {
                                        $picture = $uploaddir . $label_id . '.png';
                                        unlink($picture);
                                    }
                
                                    if (move_uploaded_file($tmp_name, $my_path)) {
                
                                        echo json_encode(array('result' => 0));
                
                                    } else {
                
                                        echo json_encode(array('result' => 8));
                
                                    }
                
                                } else {
                
                                    echo json_encode(array('result' => 9));
                
                                }
                
                            } else {
                
                                echo json_encode(array('result' => 10));
                
                            }

                        } else {

                            echo json_encode(array('result' => 0));

                        }

                    } else {

                        if (!label_name_existence($dbh, $label_name, $category_id)) {

                            $sql = "UPDATE labels SET label_name = ?, category_id = ?, label_description = ? WHERE id = ?";
                            $sth = $dbh->prepare($sql);
                            $sth->execute(array($label_name, $category_id, $label_description, $label_id));
                            
                            if ($_FILES) {
                                
                                $name = $_FILES['userfile']['name'];
                                $tmp_name = $_FILES['userfile']['tmp_name'];
    
                                if ($extension = strtolower(pathinfo($name, PATHINFO_EXTENSION))) {
                    
                                    if (in_array($extension, $my_arr)) {
                    
                                        $my_path = $uploaddir . $label_id . '.' . $extension;

                                        if (file_exists($uploaddir . $label_id . '.jpg')) {
                                            $picture = $uploaddir . $label_id . '.jpg';
                                            unlink($picture);
                                        } elseif (file_exists($uploaddir . $label_id . '.jpeg')) {
                                            $picture = $uploaddir . $label_id . '.jpeg';
                                            unlink($picture);
                                        } elseif (file_exists($uploaddir . $label_id . '.png')) {
                                            $picture = $uploaddir . $label_id . '.png';
                                            unlink($picture);
                                        }
                    
                                        if (move_uploaded_file($tmp_name, $my_path)) {
                    
                                            echo json_encode(array('result' => 1));
                    
                                        } else {
                    
                                            echo json_encode(array('result' => 8));
                    
                                        }
                    
                                    } else {
                    
                                        echo json_encode(array('result' => 9));
                    
                                    }
                    
                                } else {
                    
                                    echo json_encode(array('result' => 10));
                    
                                }
    
                            } else {
    
                                echo json_encode(array('result' => 1));
    
                            }
                            
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