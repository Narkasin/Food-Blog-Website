<?php

function username_existence($dbh, $username) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM users WHERE username = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($username));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function email_existence($dbh, $email) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM users WHERE email = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($email));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function id_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM users WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function file_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM files WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function folder_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM folders WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function category_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM categories WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function category_name_existence($dbh, $category) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM categories WHERE category_name = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($category));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function label_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM labels WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function label_name_existence($dbh, $label, $category) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM labels INNER JOIN categories ON labels.category_id = categories.id WHERE labels.label_name = ? AND categories.id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($label, $category));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function role_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM roles WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function role_name_existence($dbh, $role) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM roles WHERE role_name = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($role));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function extension_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM file_extensions WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function extension_name_existence($dbh, $extension) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM file_extensions WHERE extension_name = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($extension));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;

}

function alarm_existence($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM rel_alarm_file WHERE file_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

?>