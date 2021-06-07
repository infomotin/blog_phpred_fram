<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand " href="<?php print_link(HOME_PAGE) ?>">
            <img class="img-responsive " src="<?php print_link(SITE_LOGO); ?>" /> <span class="text-capitalize"><?php echo SITE_NAME; ?></span>
        </a>
            <?php 
            if(user_login_status() == true ){ 
            ?>
            
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <?php Html :: render_menu(Menu :: $navbartopleft  , "navbar-nav mr-auto" ); ?>
                <?php Html :: render_menu(Menu :: $navbartopright  , "navbar-nav ml-auto" ); ?>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <?php 
                            if(!empty(USER_PHOTO)){
                            ?>
                            <img class="img-fluid" style="height:30px;" src="<?php print_link(set_img_src(USER_PHOTO,40,40)); ?>" />
                                <?php
                                }
                                else{
                                ?>
                                <span class="avatar-icon"><i class="icon-user"></i></span>
                                <?php
                                }
                                ?>
                                <span>Hi, <?php echo ucwords(USER_NAME); ?> it`s</span>
                                <span><?php echo ucwords(human_date(time_now())); ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="<?php print_link('account') ?>"><i class="icon-user"></i> My Account</a>
                                <a class="dropdown-item" href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>"><i class="icon-logout"></i> Logout</a>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php 
                } 
                ?>
            </div>
        </div>