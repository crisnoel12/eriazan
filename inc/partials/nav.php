<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div id="load_bar"></div>
    <div class="container">
        <div class="row">
            <img class="logo" alt="Eriazan Skin Clinic Logo" src="<?php echo BASE_URL;?>img/eriazan.png">
        </div>
        <div class="row navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#eriazan-nav-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="eriazan-nav-collapse">
                <ul class="nav navbar-nav">
                    <li class="<?php if($page == "Home"){ echo "active"; } ?>">
                        <a href="<?php echo BASE_URL;?>">HOME</a>
                    </li>
                <?php if (!empty($_SESSION['username'])){?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMIN</a>
                        <ul class="dropdown-menu">
                            <?php if ($usertype === 'admin') {?>
                                <li>
                                    <a href="<?php echo BASE_URL;?>add-user.php">Add User</a>
                                </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo BASE_URL;?>logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
                    <li class="<?php if($page == "About"){ echo "active"; } ?>"><a href="<?php echo BASE_URL;?>about">ABOUT</a></li>
                    <li class="<?php if($page == "Services"){ echo "active"; } ?>"><a href="<?php echo BASE_URL;?>services">SERVICES</a></li>
                    <li class="<?php if($page == "Products"){ echo "active"; } ?>"><a href="<?php echo BASE_URL;?>products">PRODUCTS</a></li>
                    <li class="<?php if($page == "Contact"){ echo "active"; } ?>"><a href="<?php echo BASE_URL;?>contact">CONTACT US</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
