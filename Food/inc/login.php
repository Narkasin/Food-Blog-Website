<?php

session_start();

require_once('dbh/dbh.php');
require_once('functions/input_func.php');

if (isset($_POST['username']) && isset($_POST['pw'])) {

    $username = $_POST['username'];
    $pw = $_POST['pw'];

    if (username_input($username) && pw_input($pw)) {

        $h_pw = hash('sha512', $pw);

        $sql = "SELECT * FROM users WHERE username = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($username));

        if ($result = $sth->fetch(PDO::FETCH_ASSOC)) {

            if ($result['pw'] == $h_pw) {

                $_SESSION['file_manager_march_03_2023'] = $result['id'];
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

?>