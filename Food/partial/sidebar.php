
<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="index.php" class="logo-link nk-sidebar-logo">
                            <?php
                            if (file_exists('./logo/logo.jpg')) {
                                echo "<img class='logo-img logo-img-lg' src='logo/logo.jpg' width='30' height='30'>";
                            } elseif (file_exists('./logo/logo.jpeg')) {
                                echo "<img class='logo-img logo-img-lg' src='logo/logo.jpeg' width='30' height='30'>";
                            } elseif (file_exists('./logo/logo.png')) {
                                echo "<img class='logo-img logo-img-lg' src='logo/logo.png' width='30' height='30'>";
                            }
                            ?>
                            <h6><?php echo my_title($dbh); ?></h6>
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="index.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-home-fill"></em></span>
                                        <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['File Manager']; ?></span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <?php
                                if (is_logged_in($dbh)) {
                                    ?>
                                    <?php
                                    if (has_perm($dbh, $id, 1) || has_perm($dbh, $id, 2) || has_perm($dbh, $id, 3) || has_perm($dbh, $id, 4) || has_perm($dbh, $id, 5)) {
                                        ?>
                                        <li class="nk-menu-heading">
                                            <h6 class="overline-title text-primary-alt"><?php echo $lang[$current_lang]['sidebar']['Settings']; ?></h6>
                                        </li><!-- .nk-menu-item -->
                                        <?php
                                        if (has_perm($dbh, $id, 1)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="messages.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-mail"></em></span>
                                                    <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['File extensions']; ?></span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (has_perm($dbh, $id, 2)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="categories.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                                                    <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['Categories']; ?></span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (has_perm($dbh, $id, 3)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="foods.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-tag-alt-fill"></em></span>
                                                    <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['Labels']; ?></span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (has_perm($dbh, $id, 4)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="users.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                                    <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['Users']; ?></span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (has_perm($dbh, $id, 5)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="roles.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                                                    <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['Roles']; ?></span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if (has_perm($dbh, $id, 6)) {
                                            ?>
                                            <li class="nk-menu-item">
                                                <a href="settings.php" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                                    <span class="nk-menu-text">Settings</span>
                                                </a>
                                            </li><!-- .nk-menu-item -->
                                            <?php
                                        }
                                        ?>
                                        <?php
                                    }
                                    ?>
                                    <li class="nk-menu-heading">
                                        <h6 class="overline-title text-primary-alt"><?php echo $lang[$current_lang]['sidebar']['Profile']; ?></h6>
                                    </li><!-- .nk-menu-item -->
                                    <li class="nk-menu-item">
                                        <a href="profile.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt"></em></span>
                                            <span class="nk-menu-text"><?php echo $lang[$current_lang]['sidebar']['Profile']; ?></span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <?php
                                }
                                ?>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Other pages</h6>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="contact-us.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-mail"></em></span>
                                        <span class="nk-menu-text">Contact Us</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item">
                                    <a href="About.php" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-info"></em></span>
                                        <span class="nk-menu-text">About</span>
                                    </a>
                                </li><!-- .nk-menu-item -->
                                <?php
                                if (!is_logged_in($dbh)) {
                                    ?>
                                    <li class="nk-menu-item">
                                        <a href="login.php" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-signin"></em></span>
                                            <span class="nk-menu-text">Login</span>
                                        </a>
                                    </li><!-- .nk-menu-item -->
                                    <?php
                                }
                                ?>
                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>