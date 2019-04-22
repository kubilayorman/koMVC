<?php require APPROOT . "/views/inc/admin_header.php"; ?>
<nav class="admin-navbar">

    <div class="admin-navbar__menu">
        <ul class="admin-navbar__menu--list">

            <li class="admin-navbar__menu--item">
                <a class="admin-navbar__menu--link A-element__admin" href="?adminpage=admin_dashboard">Admin Page</a>
            </li>

            <li class="admin-navbar__menu--item admin-navbar__dropdown">
                <p class="admin-navbar__menu--link admin-navbar__dropdown--top" ">Admin Insights</p>
                <ul class="admin-navbar__dropdown--menu">
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/admin/insights">All Insights</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/insights/add">New Insight</a>
                    </li>
                </ul>
            </li>

            <li class="admin-navbar__menu--item admin-navbar__dropdown">
                <p class="admin-navbar__menu--link admin-navbar__dropdown--top">Admin Cases</p>
                <ul class="admin-navbar__dropdown--menu">
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/admin/cases">All Cases</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/cases/add">New Case</a>
                    </li>
                </ul>
            </li>

            <li class="admin-navbar__menu--item admin-navbar__dropdown">
                <p class="admin-navbar__menu--link  admin-navbar__dropdown--top" >General Settings</p>
                <ul class="admin-navbar__dropdown--menu">
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/admin/generalsettings">General Site Information</a>
                    </li>
                    <li class="admin-navbar__dropdown--item">
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/admin/accounts">Accounts</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <li class="admin-navbar__dropdown--item">    
                        <a class="admin-navbar__dropdown--link" href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

</nav>