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

    }

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
    <title>About | <?php echo my_title($dbh); ?></title>
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
                                <div class="nk-content ">
                                    <div class="container-fluid">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div class="content-page wide-md m-auto">
                                                    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
                                                        <div class="nk-block-head-content text-center">
                                                            <h2 class="nk-block-title fw-normal">About</h2>
                                                        </div>
                                                    </div><!-- .nk-block-head -->
                                                    <div class="nk-block">
                                                        <div class="card">
                                                            <div class="card-inner card-inner-xl">
                                                                <article class="entry">
                                                                    <?php echo my_about($dbh); ?>
                                                                </article>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-block -->
                                                </div><!-- .content-page -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
</body>
</html>