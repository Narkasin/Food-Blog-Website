<?php

session_start();

require_once('inc/dbh/dbh.php');
require_once('inc/functions/general_func.php');
require_once('inc/functions/fetch_func.php');
require_once('inc/lang.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];
    
    if (!has_perm($dbh, $id, 6)) {

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
    <title>Settings | <?php echo my_title($dbh); ?></title>
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
                                            <h3 class="nk-block-title page-title">Settings</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <ul class="nav nav-tabs mt-n3" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5" aria-selected="true" role="tab"><span>Title</span></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem6" aria-selected="false" role="tab" tabindex="-1"><span>Logo</span></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem7" aria-selected="false" role="tab" tabindex="-1"><span>About</span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="tabItem5" role="tabpanel">
                                                    <form action="javascript: void(0);" method="post" id="updateProfileForm" class="form-validate is-alter">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="mytitle">Title</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="mytitle" placeholder="Title" value="<?php echo my_title($dbh); ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update title</button>
                                                        </div>
                                                    </form>
                                                    <div class="text-center pt-4 pb-3">
                                                        <p class="fw-bold text-danger" id="myResult" style="display: none;"></p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabItem6" role="tabpanel">
                                                    <form action="javascript: void(0);" method="post" id="updatePasswordForm" class="form-validate is-alter">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Logo</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="form-file">
                                                                        <input type="file" class="form-file-input" id="customFile">
                                                                        <label class="form-file-label" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update logo</button>
                                                        </div>
                                                    </form>
                                                    <div class="text-center pt-4 pb-3">
                                                        <p class="fw-bold text-danger" id="myPasswordResult" style="display: none;"></p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tabItem7" role="tabpanel">
                                                    <form action="javascript: void(0);" method="post" id="updateAboutForm" class="form-validate is-alter">
                                                        <div class="col-12">
                                                            <div class="quill-minimal">
                                                                <?php echo my_about($dbh); ?>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                    <div class="text-center pt-4 pb-3">
                                                        <p class="fw-bold text-danger" id="myAboutResult" style="display: none;"></p>
                                                    </div>
                                                </div>
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
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=3.1.2"></script>
    <script src="assets/js/scripts.js?ver=3.1.2"></script>
    <link rel="stylesheet" href="assets/css/editors/quill.css?ver=3.1.2">
    <script src="assets/js/libs/editors/quill.js?ver=3.1.2"></script>
    <script src="assets/js/editors.js?ver=3.1.2"></script>
    <script src="js/lang.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/pages/settings/settings.js"></script>
</body>
</html>