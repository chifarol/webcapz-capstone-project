<?php require_once('parts/header.php') ?>
<!-- Start Header -->
<?php require_once('parts/nav.php') ?>
<!-- chifarol: Fetch categories from database -->
<?php
if (isset($_GET['id'])) {
    $category_id = sanitize_input($_GET['id']);
    $fetch_posts = "SELECT * FROM categories WHERE id=$category_id";
    $result = mysqli_query($conn, $fetch_posts);

    if (mysqli_num_rows($result) > 0) {
        $category = mysqli_fetch_assoc($result);
    }else{
        $URL = "/webcapz-capstone-project/blog/404.php";
        echo("<script>location.href='$URL'</script>");

    }
}
?>
<!-- chifarol: End Fetch categories from database -->

<!-- Start Header -->
<div class="axil-breadcrumb-area breadcrumb-style-1 bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <h1 class="page-title">
                        Category: <?php echo $category['category_name'] ?> </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<!-- Start Page Wrapper -->
<div class="main-wrapper">
    <!-- Start Blog Area  -->
    <div class="axil-post-list-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 order-1 order-lg-2">
                    <!-- Start Post List  -->
                    
                    <!-- chifarol: Fetch posts from database -->
                    <?php
                    $_SESSION['fetch_category_posts_msg'] = '';
                    global $conn;
                    $fetch_posts = "SELECT * FROM posts WHERE category_id=$category_id";
                    $result = mysqli_query($conn, $fetch_posts);
                    if (mysqli_num_rows($result) > 0) {
                    while ($postObj = mysqli_fetch_assoc($result)) {
                        ?>

                        <div id="<?php echo $postObj['id'] ?>"
                            class="content-block post-list-view mt--30 post-662 post type-post status-publish format-standard has-post-thumbnail hentry category-careers">
                            <div class="post-thumbnail">
                                <a href="post.php?id=<?php echo $postObj['id'] ?>">
                                    <img width="295" height="250" src="<?php echo $postObj['post_image_path'] ?>"
                                        class="attachment-axil-blog-thumb size-axil-blog-thumb wp-post-image"
                                        alt="gallery-post-03" decoding="async" /> </a>
                            </div>
                            <div class="post-content">
                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                            href="/webcapz-capstone-project/blog/categories.php?id=<?php echo $category['id'] ?>">
                                            <span class="hover-flip-item"><span data-text="<?php echo $category['category_name'] ?>">
                                                    <?php echo $category['category_name'] ?>
                                                </span></span>
                                        </a>
                                    </div>
                                </div>
                                <h4 class="title"><a
                                        href="post.php?id=<?php echo $postObj['id'] ?>"><?php echo $postObj['post_title'] ?></a></h4>
                                <div class="post-meta-wrapper">
                                    <div class="post-meta">
                                        <div class="content">
                                            <h6 class="post-author-name">
                                                <a class="hover-flip-item-wrapper" href="#"><span class="hover-flip-item"><span data-text="Swiss Blog">Swiss Blog</span></span></a></h6>
                                            <ul class="post-meta-list">
                                                <li class="post-meta-date">
                                                    <?php echo $postObj['published_date'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                }else{
                    $_SESSION['fetch_category_posts_msg'] = 'No Posts Found';
                }
                    ?>
                    <h4 class="title">
                    <?php echo $_SESSION['fetch_category_posts_msg'] ?>
                    </h4>
                    <!-- chifarol: End Fetch posts from database -->
                    <!-- End Post List  -->
                </div>
                <div class="col-lg-4 col-xl-4 mt_md--40 mt_sm--40 order-2 order-lg-2">
                    <div class="search-1 axil-single-widget widget_search mt--30 mt_sm--30 mt_md--30">
                        <h5 class="widget-title">Search</h5>
                        <div class="inner">
                            <form id="search-2" action="https://new.axilthemes.com/themes/blogar/" method="GET"
                                class="blog-search">
                                <div class="axil-search form-group">
                                    <button type="submit" class="search-button"><i class="fal fa-search"></i></button>
                                    <input type="text" name="s" placeholder="Search ..." value="" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div
                        class="blogar_recent_post-1 axil-single-widget widget_blogar_recent_post mt--30 mt_sm--30 mt_md--30">
                        <h5 class="widget-title">Recent Posts</h5>
                        <?php
                    $_SESSION['get_all_post_error_msg'] = '';
                    global $conn;
                    $fetch_recent_posts = "SELECT * FROM posts ORDER BY published_date DESC LIMIT 4";
                    $result = mysqli_query($conn, $fetch_recent_posts);

                    while ($recentPostObj = mysqli_fetch_assoc($result)) {
                        ?>

                        
                        <div class="content-block post-medium mb--20">
                            <div class="post-thumbnail">
                                <a href="post.php?id=<?php echo $recentPostObj['id'] ?>">
                                <img width="150" height="150" src="<?php echo $recentPostObj['post_image_path'] ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="gallery-post-03" decoding="async" loading="lazy" sizes="(max-width: 150px) 100vw, 150px" />
                                </a>
                            </div>
                            <div class="post-content">
                                <h6 class="title">
                                    <a href="post.php?id=<?php echo $recentPostObj['id'] ?>"><?php echo $recentPostObj['post_title'] ?></a></h6>
                                <div class="post-meta">
                                    <ul class="post-meta-list">
                                        <li><?php echo $recentPostObj['published_date'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                        

                        <?php
                    }
                    ?></div>
                    <div
                        class="mc4wp_form_widget-1 axil-single-widget widget_mc4wp_form_widget mt--30 mt_sm--30 mt_md--30">
                        <script>(function () {
                                window.mc4wp = window.mc4wp || {
                                    listeners: [],
                                    forms: {
                                        on: function (evt, cb) {
                                            window.mc4wp.listeners.push(
                                                {
                                                    event: evt,
                                                    callback: cb
                                                }
                                            );
                                        }
                                    }
                                }
                            })();
                        </script>
                        <!-- Mailchimp for WordPress v4.9.0 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                        <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-703" method="post" data-id="703"
                            data-name="Blogar Form">
                            <div class="mc4wp-form-fields">
                                <div class="newsletter-inner text-center">
                                    <h4 class="title mb--15">Never Miss A Post!</h4>
                                    <p class="b2 mb--30">Sign up for free and be the first to <br> get notified
                                        about updates.</p>

                                    <div class="form-group">
                                        <input type="email" name="EMAIL" placeholder="Your email address" required />
                                    </div>
                                    <div class="form-submit">
                                        <button type="submit"
                                            class="cerchio axil-button button-rounded"><span>Subscribe</span></button>
                                    </div>
                                </div>
                            </div><label style="display: none !important;">Leave this field empty if you're
                                human: <input type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                    autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp"
                                value="1680296270" /><input type="hidden" name="_mc4wp_form_id" value="703" /><input
                                type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
                            <div class="mc4wp-response"></div>
                        </form><!-- / Mailchimp for WordPress Plugin -->
                    </div>
                    <div
                        class="blobar_social_widget-1 axil-single-widget blobar_social_widget mt--30 mt_sm--30 mt_md--30">
                        <h5 class="widget-title">Stay In Touch</h5>
                        <ul class="social-icon md-size justify-content-center">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tag_cloud-1 axil-single-widget widget_tag_cloud mt--30 mt_sm--30 mt_md--30">
                        <h5 class="widget-title">All Categories </h5>
                        <div class="tagcloud">
                                <?php
                    $_SESSION['get_all_post_error_msg'] = '';
                    global $conn;
                    $fetch_categories = "SELECT * FROM categories";
                    $categories_result = mysqli_query($conn, $fetch_categories);

                    while ($category = mysqli_fetch_assoc($categories_result)) {
                        ?>
                        <a href="#" class="tag-cloud-link tag-link-45 tag-link-position-1" style="font-size: 8pt;" aria-label="Design (1 item)"><?php echo $category['category_name'] ?></a>

                        <?php
                    }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Area  -->

</div>
<!-- End Page Wrapper -->

</div>
<!-- End main-content -->

<!-- Start Footer Area  -->
<?php require_once('parts/footer.php') ?>
<!-- End Footer Area  -->


<!-- Start Back To Top  -->
<a id="backto-top"></a>
<!-- End Back To Top  -->

</body>

</html>