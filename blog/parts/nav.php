<header class="header axil-header header-style-1 header-light header-with-shadow   ">
    <div class="header-wrap">
        <div class="row justify-content-between align-items-center">
            <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="logo">
                    <a href="/webcapz-capstone-project/blog/" title="Blogar" rel="home">
                        <img class="dark-logo"
                            src="https://new.axilthemes.com/themes/blogar/wp-content/themes/blogar/assets/images/logo/logo.png"
                            alt="Blogar">
                        <img class="light-logo"
                            src="https://new.axilthemes.com/themes/blogar/wp-content/themes/blogar/assets/images/logo/white-logo.png"
                            alt="Blogar">
                    </a>

                </div> <!-- End Logo-->
            </div>

            <div class="axil-mainmenu-withbar col-md-3 col-sm-3 col-3 col-xl-6">
                <div class="mainmenu-wrapper d-none d-xl-block">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav d-none d-lg-block">
                        <ul id="main-menu" class="mainmenu">
                            <li id="menu-item-437"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-437 axil-post-type-post has-dropdown">
                                <a href="/webcapz-capstone-project/blog/">Home</a>
                            </li>
                            <li id="menu-item-380"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-380 axil-post-type-post has-dropdown">
                                <a href="#">Categories</a>
                                <ul class="axil-submenu">
                                    <?php
                                    global $conn;
                                    $fetch_categories = "SELECT * FROM categories";
                                    $categories_result = mysqli_query($conn, $fetch_categories);

                                    while ($category = mysqli_fetch_assoc($categories_result)) {
                                        ?>
                                        <li id="menu-item-381"
                                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-381 axil-post-type-post">
                                            <a
                                                href="/webcapz-capstone-project/blog/categories.php?id=<?php echo $category['id'] ?>">
                                                <?php echo $category['category_name'] ?>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </nav> <!-- End Mainmanu Nav -->
                </div>
                <!-- Start Hamburger Menu  -->
                <div class="hamburger-menu d-block d-xl-none text-right">
                    <div class="hamburger-inner">
                        <div class="icon"><i class="ph ph-list"></i></div>
                    </div>
                </div>
                <!-- End Hamburger Menu  -->
            </div>


            <div class="d-none d-sm-block col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="header-search text-right d-flex align-items-center justify-content-end">

                    <form id="header-search-1" action="/webcapz-capstone-project/blog/" method="GET"
                        class="blog-search">
                        <div class="axil-search form-group">
                            <button type="submit" class="search-button"><i class="ph ph-magnifying-glass"></i></button>
                            <input type="text" name="s" class="form-control" placeholder="Search ..." value="" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="mobile-search-wrapper d-block d-sm-none col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="header-search text-right d-flex align-items-center justify-content-end">
                    <div class="search-mobile-icon">
                        <button><i class="ph ph-magnifying-glass"></i></button>
                    </div>
                    <form id="header-search-1" action="/webcapz-capstone-project/blog/" method="GET"
                        class="blog-search large-mobile-blog-search">
                        <div class="axil-search-mobile form-group">
                            <button type="submit" class="search-button"><i class="ph ph-magnifying-glass"></i></button>
                            <input type="text" name="s" class="form-control" placeholder="Search ..." value="" />
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>


<!-- Start Mobile Menu Area  -->
<div class="popup-mobilemenu-area">
    <div class="inner">
        <div class="mobile-menu-top">
            <div class="logo">
                <a href="/webcapz-capstone-project/blog/" title="Blogar" rel="home">
                    <img class="dark-logo"
                        src="https://new.axilthemes.com/themes/blogar/wp-content/themes/blogar/assets/images/logo/logo.png"
                        alt="Blogar">

                    <img class="light-logo"
                        src="https://new.axilthemes.com/themes/blogar/wp-content/themes/blogar/assets/images/logo/white-logo.png"
                        alt="Blogar">
                </a>
            </div>
            <div class="mobile-close">
                <div class="icon">
                    <i class="ph ph-x"></i>
                </div>
            </div>
        </div>
        <nav class="menu-item">
            <ul id="mobile-menu" class="mainmenu-item">
                <li
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-has-children menu-item-437 axil-post-type-post has-children">
                    <a href="/webcapz-capstone-project/blog/">Home</a>
                </li>
                <li
                    class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-118 current_page_item current_page_parent menu-item-has-children menu-item-280 axil-post-type-post has-children is-active">
                    <a href="https://new.axilthemes.com/themes/blogar/posts/" aria-current="page">Categories</a>
                    <ul class="submenu">

                        <?php
                        global $conn;
                        $fetch_categories = "SELECT * FROM categories";
                        $categories_result = mysqli_query($conn, $fetch_categories);

                        while ($category = mysqli_fetch_assoc($categories_result)) {
                            ?>
                            <li
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-429 axil-post-type-post">
                                <a
                                    href="https://new.axilthemes.com/themes/blogar/apple-reimagines-the-iphone-experience-with-ios-14/">
                                    <?php echo $category['category_name'] ?>

                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- End Mobile Menu Area  --><!-- Start Breadcrumb Area  -->