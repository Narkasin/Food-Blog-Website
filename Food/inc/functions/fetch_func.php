<?php

function fetch_user($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM users WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_users($dbh) {

    $result = false;

    $sql = "SELECT * FROM users";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_role($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM roles WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_roles($dbh) {

    $result = false;

    $sql = "SELECT * FROM roles";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_permission($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM permissions WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_permissions($dbh) {

    $result = false;

    $sql = "SELECT * FROM permissions";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_file_extension($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM file_extensions WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_file_extensions($dbh) {

    $result = false;

    $sql = "SELECT * FROM file_extensions ORDER BY id DESC";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_category($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM categories WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_categories($dbh) {

    $result = false;

    $sql = "SELECT * FROM categories";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_label($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM labels WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_labels($dbh) {

    $result = false;

    $sql = "SELECT * FROM labels";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_label_category($dbh, $id) {

    $result = false;

    $sql = "SELECT labels.*, categories.category_name FROM labels INNER JOIN categories ON labels.category_id = categories.id WHERE labels.id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_labels_categories($dbh) {

    $result = false;

    $sql = "SELECT labels.*, categories.category_name FROM labels INNER JOIN categories ON labels.category_id = categories.id";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_labels_categories_where($dbh, $category_id) {

    $result = false;

    $sql = "SELECT labels.*, categories.category_name FROM labels INNER JOIN categories ON labels.category_id = categories.id WHERE labels.category_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($category_id));

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_category_labels($dbh, $category_id) {

    $result = false;

    $sql = "SELECT * FROM labels WHERE category_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($category_id));

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_folder($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM folders WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_folders($dbh) {

    $result = false;

    $sql = "SELECT * FROM folders";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_file($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM files WHERE id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_files($dbh) {

    $result = false;

    $sql = "SELECT * FROM files";
    $sth = $dbh->prepare($sql);
    $sth->execute();

    if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

function fetch_folders_where($dbh, $owner_id, $parent_folder, $is_personal) {

    $result = false;
    $fetch = true;

    if ($is_personal == 0) {

        if ($parent_folder == 0) {

            $is_independent = 1;

            $sql = "SELECT * FROM folders WHERE is_independent = ? AND is_personal = ?";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($is_independent, $is_personal));

        } else {

            if (folder_existence($dbh, $parent_folder)) {
                
                $is_independent = 0;

                $sql = "SELECT folders.* FROM folders INNER JOIN folders_hierarchy ON folders.id = folders_hierarchy.child_folder WHERE folders.is_independent = ? AND folders.is_personal = ? AND folders_hierarchy.parent_folder = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($is_independent, $is_personal, $parent_folder));

            } else {

                $fetch = false;

            }

        }

    } else {

        if ($parent_folder == 0) {

            $is_independent = 1;

            $sql = "SELECT * FROM folders WHERE owner_id = ? AND is_independent = ? AND is_personal = ?";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($owner_id, $is_independent, $is_personal));

        } else {
            
            if (folder_existence($dbh, $parent_folder)) {
                
                $is_independent = 0;

                $sql = "SELECT folders.* FROM folders INNER JOIN folders_hierarchy ON folders.id = folders_hierarchy.child_folder WHERE folders.owner_id = ? AND folders.is_independent = ? AND folders.is_personal = ? AND folders_hierarchy.parent_folder = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($owner_id, $is_independent, $is_personal, $parent_folder));

            } else {

                $fetch = false;
                
            }

        }

    }

    if ($fetch) {

        if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {
    
            $result = $fetch_result;
    
        } else {
    
            $result = false;
    
        }

    } else {

        $result = NULL;

    }

    return $result;
    
}

function fetch_files_where($dbh, $owner_id, $parent_folder, $is_personal, $is_favourite, $is_trashed) {

    $result = false;
    $fetch = true;

    if ($is_favourite == 0 && $is_trashed == 0) {

        if ($is_personal == 0) {

            if ($parent_folder == 0) {

                $is_independent = 1;

                $sql = "SELECT * FROM files WHERE is_independent = ? AND is_personal = ? AND is_trashed = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($is_independent, $is_personal, $is_trashed));

            } else {
                
                if (folder_existence($dbh, $parent_folder)) {
                    
                    $is_independent = 0;
    
                    $sql = "SELECT * FROM files WHERE is_independent = ? AND parent_folder = ? AND is_personal = ? AND is_trashed = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($is_independent, $parent_folder, $is_personal, $is_trashed));
    
                } else {
    
                    $fetch = false;
                    
                }

            }

        } else {

            if ($parent_folder == 0) {

                $is_independent = 1;

                $sql = "SELECT * FROM files WHERE owner_id = ? AND is_independent = ? AND is_personal = ? AND is_trashed = ?";
                $sth = $dbh->prepare($sql);
                $sth->execute(array($owner_id, $is_independent, $is_personal, $is_trashed));

            } else {
                
                if (folder_existence($dbh, $parent_folder)) {
                    
                    $is_independent = 0;
    
                    $sql = "SELECT * FROM files WHERE owner_id = ? AND is_independent = ? AND parent_folder = ? AND is_personal = ? AND is_trashed = ?";
                    $sth = $dbh->prepare($sql);
                    $sth->execute(array($owner_id, $is_independent, $parent_folder, $is_personal, $is_trashed));
    
                } else {
    
                    $fetch = false;
                    
                }

            }

        }
        
    } else {

        if ($is_favourite == 1 && $is_trashed == 0) {
            
            $sql = "SELECT * FROM files WHERE owner_id = ? AND is_favourite = ?";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($owner_id, $is_favourite));

        } elseif ($is_favourite == 0 && $is_trashed == 1) {

            $sql = "SELECT * FROM files WHERE owner_id = ? AND is_trashed = ?";
            $sth = $dbh->prepare($sql);
            $sth->execute(array($owner_id, $is_trashed));

        }

    }

    if ($fetch) {

        if ($fetch_result = $sth->fetchAll(PDO::FETCH_ASSOC)) {
    
            $result = $fetch_result;
    
        } else {
    
            $result = false;
    
        }

    } else {

        $result = NULL;

    }
    
    return $result;
    
}

function fetch_alarm($dbh, $id) {

    $result = false;

    $sql = "SELECT * FROM rel_alarm_file WHERE file_id = ?";
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));

    if ($fetch_result = $sth->fetch(PDO::FETCH_ASSOC)) {

        $result = $fetch_result;

    } else {

        $result = false;

    }

    return $result;
    
}

?>