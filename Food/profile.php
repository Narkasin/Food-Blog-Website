<?php

session_start();

require_once('inc/dbh/dbh.php');
require_once('inc/functions/general_func.php');
require_once('inc/functions/fetch_func.php');
require_once('inc/lang.php');

if (is_logged_in($dbh)) {

    $id = $_SESSION['file_manager_march_03_2023'];

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
    <title>Profile | <?php echo my_title($dbh); ?></title>
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
                                            <h3 class="nk-block-title page-title">Profile</h3>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-preview">
                                        <div class="card-inner">
                                            <ul class="nav nav-tabs mt-n3" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#tabItem5" aria-selected="true" role="tab"><em class="icon ni ni-user"></em><span>Personal</span></a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#tabItem6" aria-selected="false" role="tab" tabindex="-1"><em class="icon ni ni-lock-alt"></em><span>Security</span></a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="tabItem5" role="tabpanel">
                                                    <form action="javascript: void(0);" method="post" id="updateProfileForm" class="form-validate is-alter">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="username">Username</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="username" placeholder="Username" value="<?php echo $username; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fname">First Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="fname" placeholder="First Name" value="<?php echo $first_name; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="lname">Last Name</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php echo $last_name; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Email</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update profile</button>
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
                                                                <label class="form-label" for="password">Current password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" class="form-control" id="password" placeholder="Password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="newPassword">New password</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="password" class="form-control" id="newPassword" placeholder="Password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">Update password</button>
                                                        </div>
                                                    </form>
                                                    <div class="text-center pt-4 pb-3">
                                                        <p class="fw-bold text-danger" id="myPasswordResult" style="display: none;"></p>
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
    <script src="js/lang.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/pages/profile/profile.js"></script>
</body>
</html>