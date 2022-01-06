<nav class="navbar-default navbar-side" role="navigation">
    <div id="sideNav" href=""></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li >
                <a class="<?php if ($activebar == "Dashboard"){echo "active-menu";} ?>" href="<?php echo site_url("Dashboard"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a class="<?php if ($activebar == "บัญชีผู้ใช้งาน"){echo "active-menu";} ?>" href="<?php echo site_url("users_api"); ?>"><i class="fa fa-users"></i> บัญชีผู้ใช้งาน</a>
            </li>
            <li>
                <a class="<?php if ($activebar == "พิกัดผู้ใช้งาน"){echo "active-menu";} ?>" href="<?php echo site_url("users_database"); ?>"><i class="fa fa-map-marker-alt"></i> พิกัดผู้ใช้งาน</a>
            </li>
            <li>
                <a class="<?php if ($activebar == "พิกัดผู้ใช้งาน Google map"){echo "active-menu";} ?>" href="<?php echo site_url("GPS"); ?>"><i class="fa fa-bar-chart-o"></i> พิกัดผู้ใช้งาน Google map</a>
            </li>
		
            
<!--
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>
                            <li>
                                <a href="#">Third Level Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>
            <li>
                <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
            </li>
-->
        </ul>

    </div>

</nav>
