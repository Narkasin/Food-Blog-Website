<?php

session_start();

require_once('inc/dbh/dbh.php');
require_once('inc/functions/general_func.php');
require_once('inc/functions/fetch_func.php');
require_once('inc/lang.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

    if (!has_perm($dbh, $id, 3)) {

        header("Location: index.php");
        exit;

    }

    if ($result = fetch_user($dbh, $id)) {

        $username = $result['username'];
        $first_name = $result['first_name'];
        $last_name = $result['last_name'];
        $email = $result['email'];

    } else {

        header("Location: login.php");
        exit;

    }

} else {

    header("Location: login.php");
    exit;

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Page Title  -->
    <title>Foods | <?php echo my_title($dbh); ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=3.1.2">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=3.1.2">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <?php require_once('partial/sidebar.php'); ?>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require_once('partial/header.php'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Foods</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#addLabel" class="btn btn-icon btn-primary d-md-none" data-bs-toggle="modal"><em class="icon ni ni-plus"></em></a>
                                                            <a href="#addLabel" class="btn btn-primary d-none d-md-inline-flex" data-bs-toggle="modal"><em class="icon ni ni-plus"></em><span>Add food</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                    <label class="custom-control-label" for="customCheck1"></label>
                                                                </div>
                                                            </th>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Picture</th>
                                                            <th scope="col">Title</th>
                                                            <th scope="col">Description</th>
                                                            <th scope="col">Category</th>
                                                            <th scope="col">
                                                                <div class="drodown">
                                                                <a href="javascript: void(0);" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li onclick="removeLabels()"><a href="javascript: void(0);"><em class="icon ni ni-trash"></em><span>Remove foods</span></a></li>
                                                                    </ul>
                                                                </div>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myContent">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require_once('partial/footer.php'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- @@ Share File Modal @e -->
    <?php require_once('partial/modal/labels/add_label.php'); ?>
    <!-- @@ Share File Modal @e -->
    <button type="button" style="display: none;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateLabel" id="updateLabelButton"></button>
    <?php require_once('partial/modal/labels/update_label.php'); ?>
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=3.1.2"></script>
    <script src="assets/js/scripts.js?ver=3.1.2"></script>
    <link rel="stylesheet" href="assets/css/editors/quill.css?ver=3.1.2">
    <script src="assets/js/libs/editors/quill.js?ver=3.1.2"></script>
    <script src="assets/js/editors.js?ver=3.1.2"></script>
    <script src="js/lang.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/pages/labels/refresh.js"></script>
    <script src="js/pages/labels/labels.js"></script>
</body>
</html>