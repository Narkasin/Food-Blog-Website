<?php

function is_logged_in($dbh) {

    $result = false;

    if (isset($_SESSION['file_manager_march_03_2023'])) {

        $id = $_SESSION['file_manager_march_03_2023'];

        $sql = "SELECT COUNT(*) FROM users WHERE id = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($id));
        $count = $sth->fetchColumn();
    
        if ($count > 0) {
    
            $result = true;
    
        } else {
    
            $result = false;
    
        }

    } else {

        $result = false;

    }

    return $result;

}

function same_username($dbh, $id, $username) {

    $result = false;

    $sql = "SELECT username FROM users WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['username'] == $username) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function same_pw($dbh, $id, $pw) {

    $result = false;

    $sql = "SELECT pw FROM users WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['pw'] == $pw) {

        $result = true;

    } else {

        $result = false;

    }
    
    return $result;
    
}

function is_superuser($dbh, $id) {

    $result = false;

    $sql = "SELECT is_superuser FROM users WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['is_superuser'] == 1) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function rel_role_perm($dbh, $role_id, $perm_id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM rel_role_perm WHERE role_id = ? AND perm_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($role_id, $perm_id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function has_perm($dbh, $id, $perm_id) {

    $result = false;

    if (is_superuser($dbh, $id)) {

        $result = true;

    } else {

        $sql = "SELECT role_id FROM users WHERE id = ?";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($id));
        $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);
        
        $role_id = $fetch_result['role_id'];
        
        if (rel_role_perm($dbh, $role_id, $perm_id)) {

            $result = true;

        } else {
    
            $result = false;
    
        }

    }

    return $result;
    
}

function file_ownership($dbh, $id, $owner_id) {

    $result = false;

    $sql = "SELECT owner_id FROM files WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['owner_id'] == $owner_id) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function folder_ownership($dbh, $id, $owner_id) {

    $result = false;

    $sql = "SELECT owner_id FROM folders WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['owner_id'] == $owner_id) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function same_extension($dbh, $id, $extension) {

    $result = false;

    $sql = "SELECT extension_name FROM file_extensions WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['extension_name'] == $extension) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function same_category($dbh, $id, $category) {

    $result = false;

    $sql = "SELECT category_name FROM categories WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['category_name'] == $category) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function same_label($dbh, $id, $label_name, $category_id) {

    $result = false;

    $sql = "SELECT label_name FROM labels WHERE id = ? AND category_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id, $category_id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['label_name'] == $label_name) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function role_name($dbh, $role_id) {

    $result = "";

    if (is_null($role_id)) {
        
        $result = "";
        
    } else {

        if ($role_id == "") {

            $result = "";

        } else {

            $sql = "SELECT role_name FROM roles WHERE id = ?";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($role_id));
            $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

            $result = $fetch_result['role_name'];

        }
        
    }

    return $result;
    
}

function same_role($dbh, $id, $role) {

    $result = false;

    $sql = "SELECT role_name FROM roles WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['role_name'] == $role) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function role_being_used($dbh, $role_id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM users WHERE role_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($role_id));
    $count = $sth->fetchColumn();

    if ($count > 0) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function is_favourite($dbh, $id) {

    $result = false;

    $sql = "SELECT is_favourite FROM files WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    if ($fetch_result['is_favourite'] == 1) {

        $result = true;

    } else {

        $result = false;

    }

    return $result;
    
}

function file_extension($dbh, $id) {
    
    $sql = "SELECT file_extension FROM files WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);
    $file_extension = $fetch_result['file_extension'];

    return $file_extension;
    
}

function not_empty_from_files($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM files WHERE parent_folder = ?";
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

function not_empty_from_folders($dbh, $id) {

    $result = false;

    $sql = "SELECT COUNT(*) FROM folders_hierarchy WHERE parent_folder = ?";
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

function empty_folder($dbh, $id) {

    $result = false;
    
    if (not_empty_from_files($dbh, $id) || not_empty_from_folders($dbh, $id)) {

        $result = false;

    } else {

        $result = true;

    }

    return $result;
    
}

function my_title($dbh) {

    $result = "";
    $my_id = 1;

    $sql = "SELECT my_title FROM my_settings WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($my_id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    $result = $fetch_result['my_title'];

    return $result;
    
}

function my_about($dbh) {

    $result = "";
    $my_id = 1;

    $sql = "SELECT my_about FROM my_settings WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($my_id));
    $fetch_result = $sth->fetch(PDO::FETCH_ASSOC);

    $result = $fetch_result['my_about'];

    return $result;
    
}

?>