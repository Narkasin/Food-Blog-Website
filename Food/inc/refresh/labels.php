<?php

session_start();

require_once('../dbh/dbh.php');
require_once('../functions/general_func.php');
require_once('../functions/fetch_func.php');

$labels = array();
$uploaddir = './../../uploads/';

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 3)) {

        if ($result = fetch_labels_categories($dbh)) {

            foreach($result as $label) {

                $label_id = $label['id'];
                $label_name = $label['label_name'];
                $label_description = $label['label_description'];
                $category_name = $label['category_name'];
                $picture = "";
                if (file_exists($uploaddir . $label_id . '.jpg')) {
                    $picture = $label_id . '.jpg';
                } elseif (file_exists($uploaddir . $label_id . '.jpeg')) {
                    $picture = $label_id . '.jpeg';
                } elseif (file_exists($uploaddir . $label_id . '.png')) {
                    $picture = $label_id . '.png';
                }

                $my_label = array('id' => $label_id, 'label_name' => $label_name, 'label_description' => $label_description, 'category_name' => $category_name, 'picture' => $picture);
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