<?php

function set_roll_to_null($dbh, $role_id) {

    $my_null = NULL;

    $sql = "UPDATE users SET role_id = ? WHERE role_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($my_null, $role_id));

}

?>