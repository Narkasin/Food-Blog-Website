<?php

session_start();

require_once('dbh/dbh.php');
require_once('functions/general_func.php');
require_once('functions/fetch_func.php');

$labels = array();
$uploaddir = './../uploads/';

if (isset($_POST['category_id'])) {

    $category_id = $_POST['category_id'];

    if (is_numeric($category_id)) {

        if ($result = fetch_labels_categories_where($dbh, $category_id)) {
        
            foreach($result as $label) {
        
                $label_id = $label['id'];
                $label_name = $label['label_name'];
                $label_description = $label['label_description'];
                $category_name = $label['category_name'];
                $cat_id = $label['category_id'];
                $picture = "";
                if (file_exists($uploaddir . $label_id . '.jpg')) {
                    $picture = $label_id . '.jpg';
                } elseif (file_exists($uploaddir . $label_id . '.jpeg')) {
                    $picture = $label_id . '.jpeg';
                } elseif (file_exists($uploaddir . $label_id . '.png')) {
                    $picture = $label_id . '.png';
                }
        
                $my_label = array('id' => $label_id, 'label_name' => $label_name, 'label_description' => $label_description, 'category_name' => $category_name, 'category_id' => $cat_id, 'picture' => $picture);
                array_push($labels, $my_label);
                
            }
        
            echo json_encode(array('result' => 0, 'fetch' => $labels));
        
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