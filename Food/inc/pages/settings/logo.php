<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');

$uploaddir = './../../../logo/';
$my_arr = array('jpg', 'jpeg', 'png');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 6)) {

        if ($_FILES) {

            $name = $_FILES['userfile']['name'];
            $tmp_name = $_FILES['userfile']['tmp_name'];

            if ($extension = strtolower(pathinfo($name, PATHINFO_EXTENSION))) {

                if (in_array($extension, $my_arr)) {

                    $my_path = $uploaddir . 'logo.' . $extension;

                    if (file_exists($uploaddir . 'logo.jpg')) {
                        $picture = $uploaddir . 'logo.jpg';
                        unlink($picture);
                    } elseif (file_exists($uploaddir . 'logo.jpeg')) {
                        $picture = $uploaddir . 'logo.jpeg';
                        unlink($picture);
                    } elseif (file_exists($uploaddir . 'logo.png')) {
                        $picture = $uploaddir . 'logo.png';
                        unlink($picture);
                    }

                    if (move_uploaded_file($tmp_name, $my_path)) {

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

        } else {

            echo json_encode(array('result' => 4));

        }

    } else {

        echo json_encode(array('result' => 5));

    }

} else {

    echo json_encode(array('result' => 6));

}

?>