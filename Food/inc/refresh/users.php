<?php

session_start();

require_once('../dbh/dbh.php');
require_once('../functions/general_func.php');
require_once('../functions/fetch_func.php');

$users = array();

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (has_perm($dbh, $id, 4)) {

        if ($result = fetch_users($dbh)) {

            foreach($result as $user) {

                $user_id = $user['id'];
                $username = $user['username'];
                $first_name = $user['first_name'];
                $last_name = $user['last_name'];
                $email = $user['email'];
                $is_active = $user['is_active'];
                $is_superuser = $user['is_superuser'];
                $role_id = $user['role_id'];
                $role_name = role_name($dbh, $role_id);
                $date_joined = $user['date_joined'];

                $my_user = array('id' => $user_id, 'username' => $username, 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'is_active' => $is_active, 'is_superuser' => $is_superuser, 'role_name' => $role_name, 'date_joined' => $date_joined);
                array_push($users, $my_user);
                
            }

            echo json_encode(array('result' => 0, 'fetch' => $users));

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