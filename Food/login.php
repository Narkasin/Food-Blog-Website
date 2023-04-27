<?php

session_start();

require_once('inc/dbh/dbh.php');
require_once('inc/functions/general_func.php');
require_once('inc/lang.php');

if (is_logged_in($dbh)) {

    header("Location: index.php");
    exit;

}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual Food Blog app.">
    <!-- Page Title  -->
    <title>Login | <?php echo my_title($dbh); ?></title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/css/dashlite.css?ver=3.1.2">
    <link id="skin-default" rel="stylesheet" href="assets/css/theme.css?ver=3.1.2">
    <script>
        const incorrectPassword = "<?php echo $lang[$current_lang]['login']['Incorrect password']; ?>";
        const invalidUsername = "<?php echo $lang[$current_lang]['login']['Invalid username']; ?>";
        const please = "<?php echo $lang[$current_lang]['login']['Please']; ?>";
    </script>
    <script src="js/login.js"></script>
</head>

<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="index.php" class="logo-link">
                                <?php
                                if (file_exists('./logo/logo.jpg')) {
                                    echo "<img class='logo-img logo-img-lg' src='logo/logo.jpg'>";
                                } elseif (file_exists('./logo/logo.jpeg')) {
                                    echo "<img class='logo-img logo-img-lg' src='logo/logo.jpeg'>";
                                } elseif (file_exists('./logo/logo.png')) {
                                    echo "<img class='logo-img logo-img-lg' src='logo/logo.png'>";
                                }
                                ?>
                                <h2><?php echo my_title($dbh); ?></h2>
                            </a>
                        </div>
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title"><?php echo $lang[$current_lang]['login']['Login']; ?></h4>
                                        <div class="nk-block-des">
                                            <p><?php echo $lang[$current_lang]['login']['Access']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <form action="javascript: void(0);" method="post" id="myForm">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="username"><?php echo $lang[$current_lang]['login']['Username']; ?></label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="username" placeholder="<?php echo $lang[$current_lang]['login']['Username']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password"><?php echo $lang[$current_lang]['login']['Password']; ?></label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" placeholder="<?php echo $lang[$current_lang]['login']['Password']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block"><?php echo $lang[$current_lang]['login']['Login']; ?></button>
                                    </div>
                                </form>
                                <div class="text-center pt-4 pb-3">
                                    <p class="fw-bold text-danger" id="myResult" style="display: none;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2023 <?php echo my_title($dbh); ?>. All Rights Reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="assets/js/bundle.js?ver=3.1.2"></script>
    <script src="assets/js/scripts.js?ver=3.1.2"></script>
    <script src="js/lang.js"></script>
</body>
</html>