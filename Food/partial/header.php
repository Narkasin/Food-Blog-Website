
<div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ms-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <a href="index.php" class="logo-link">
                                    <?php
                                    if (file_exists('./logo/logo.jpg')) {
                                        echo "<img class='logo-img logo-img-lg' src='logo/logo.jpg' width='36' height='36'>";
                                    } elseif (file_exists('./logo/logo.jpeg')) {
                                        echo "<img class='logo-img logo-img-lg' src='logo/logo.jpeg' width='36' height='36'>";
                                    } elseif (file_exists('./logo/logo.png')) {
                                        echo "<img class='logo-img logo-img-lg' src='logo/logo.png' width='36' height='36'>";
                                    } else {
                                        echo "<h6>" . my_title($dbh) . "</h6>";
                                    }
                                    ?>
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <?php
                                                if (is_logged_in($dbh)) {
                                                    ?>
                                                    <div class="user-info d-none d-xl-block">
                                                        <div class="user-name dropdown-indicator"><?php echo $first_name . ' ' . $last_name; ?></div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <?php
                                            if (is_logged_in($dbh)) {
                                                ?>
                                                <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                    <div class="user-card">
                                                        <div class="user-info">
                                                            <span class="lead-text"><?php echo $first_name . ' ' . $last_name; ?></span>
                                                            <span class="sub-text"><?php echo $username; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <?php
                                                    if (is_logged_in($dbh)) {
                                                        ?>
                                                        <li><a href="profile.php"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                    <li><a class="dark-switch" href="javascript: void(0);"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <?php
                                                    if (is_logged_in($dbh)) {
                                                        ?>
                                                        <li><a href="javascript: void(0);" id="logOut"><em class="icon ni ni-signout"></em><span>Logout</span></a></li>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li><a href="login.php"><em class="icon ni ni-signin"></em><span>Login</span></a></li>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>