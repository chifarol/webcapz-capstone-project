<?php require_once('parts/header.php') ?>
<!-- Start Header -->
<?php require_once('parts/nav.php') ?>
<?php
$_SESSION['get_post_error_msg'] = '';
if (isset($_GET['id'])) {
    $post_id = sanitize_input($_GET['id']);
    $fetch_posts = "SELECT * FROM posts WHERE id=$post_id";
    $result = mysqli_query($conn, $fetch_posts);

    if (mysqli_num_rows($result) > 0) {
        $postObj = mysqli_fetch_assoc($result);
        $category_id = $postObj['category_id'];
        $fetch_category = "SELECT * FROM categories WHERE id=$category_id";
        $category_result = mysqli_query($conn, $fetch_category);
        $category['category_name'] = '';
        if ($category_result) {
            $category = mysqli_fetch_assoc($category_result);
        } else {
            $URL = "/webcapz-capstone-project/blog/404.php";
            echo ("<script>location.href='$URL'</script>");

        }
    }
}
?>
<!-- Start Header -->
<div class="axil-breadcrumb-area breadcrumb-style-1 bg-color-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner">
                    <h1 class="page-title">
                        Blog </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb Area  -->
<!-- End Mobile Menu Area  --><!-- Start Page Wrapper -->
<div class="main-wrapper">
    <!-- Start Blog Details Area  -->
    <div class="post-single-wrapper axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">

                    <!-- Start Banner Area -->
                    <div class="banner banner-single-post post-formate post-video axil-section-gapBottom">
                        <!-- Start Single Slide  -->
                        <div class="content-block">
                            <!-- Start Post Content  -->
                            <div class="post-content">

                                <div class="post-cat">
                                    <div class="post-cat-list">
                                        <a class="hover-flip-item-wrapper"
                                            href="categories.php?id=<?php echo $category['id'] ?>">
                                            <span class="hover-flip-item"><span data-text="Featured Post">
                                                    <?php echo $category['category_name'] ?>
                                                </span></span>
                                        </a>
                                    </div>
                                </div>

                                <h1 class="title">
                                    <?php echo $postObj['post_title'] ?>
                                </h1>

                                <!-- Post Meta  -->
                                <div class="post-meta-wrapper">

                                    <div class="post-meta">
                                        <div class="post-author-avatar border-rounded">
                                            <img alt='' src='/webcapz-capstone-project/blog/avatar/your-avatar.png'
                                                class='avatar avatar-50 photo' style="height:50px;width:50px"
                                                loading='lazy' decoding='async' />
                                        </div>
                                        <div class="content">
                                            <h6 class="post-author-name"><a class="hover-flip-item-wrapper"
                                                    href="#"><span class="hover-flip-item"><span
                                                            data-text="axilthemes">chifarol</span></span></a>
                                            </h6>
                                            <ul class="post-meta-list">
                                                <li class="post-meta-date">
                                                    <?php echo $postObj['last_modified_date'] ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <ul class="social-share-transparent justify-content-end">
                                        <li><a href="#" target="_blank" class="aw-facebook"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#" target="_blank" class="aw-twitter"><i
                                                    class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" target="_blank" class="aw-linkdin"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li><button class="axilcopyLink" title="Copy Link" data-link="#"><i
                                                    class="fas fa-link"></i></button></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Post Content  -->
                        </div>
                        <!-- End Single Slide  -->
                        <!-- End Banner Area -->
                        <div class="breadcrumb-wrapper">
                            <!-- End Single Slide  -->
                            <ul id="breadcrumbs" class="axil-breadcrumb liststyle d-flex">
                                <li class="item-home"><a class="bread-link bread-home" href="#" title="Home">Home</a>
                                </li>
                                <li class="separator separator-home"> </li>
                                <li class="item-cat"><a href="categories.php?id=<?php echo $category['id'] ?>">
                                        <?php echo $category['category_name'] ?>
                                    </a></li>
                                <li class="separator"> </li>
                                <li class="item-current item-243"><span class="bread-current bread-243"
                                        title="Apple honors eight developers with annual Apple Design Awards"
                                        style="width:200px;overflow-x:hidden;whitespace:nowrap;text-overflow:ellipsis"><?php echo $postObj['post_title'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Banner Area -->

                    <div class="axil-post-details">

                        <div class="post-thumbnail mb--60 position-relative  wp-block-image alignwide">
                            <img width="810" height="550" src="<?php echo $postObj['post_image_path'] ?>"
                                class="w-100 wp-post-image" alt="image 69" decoding="async"
                                sizes="(max-width: 810px) 100vw, 810px" />
                        </div>
                        <div class="axil-post-details-content">

                            <p id="block-1689ea64-7b0d-4a60-93ee-d5d9cd7bc542">
                                <?php echo $postObj['post_content'] ?>
                            </p>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <!-- End Blog Details Area  -->


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