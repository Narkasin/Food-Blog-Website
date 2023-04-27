<?php

session_start();

require_once('../../dbh/dbh.php');
require_once('../../functions/general_func.php');
require_once('../../functions/fetch_func.php');

$uploaddir = './../../../uploads/';

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 3)) {

        if ($result = fetch_labels($dbh)) {

            foreach($result as $label) {

                $label_id = $label['id'];
    
                if (isset($_POST[$label_id])) {

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
    
                    $sql = "DELETE FROM labels WHERE id = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($label_id));
                    
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