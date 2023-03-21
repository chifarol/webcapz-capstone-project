<?php require('parts/header.php') ?>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php require('sidebar.php') ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <form action="" class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">

                        </form>
                    </div>
            </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="mb-5">
                        <span>Create Post</span>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-7">
                                <div class="card mb-4">
                                    <div class="card-body demo-vertical-spacing demo-only-element">
                                        <div>
                                            <label for="defaultFormControlInput" class="form-label">Post Title</label>
                                            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Post Title" name="post-title" aria-describedby="defaultFormControlHelp">
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Post Content</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                        </div>
                                        <button type="button" class="btn btn-primary">Publish
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Merged -->
                            <div class="col-md-5">
                                <div class="card mb-4">
                                    <div class="card-body demo-vertical-spacing demo-only-element">

                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Attach Image</label>
                                            <input type="file" class="form-control" id="inputGroupFile02">
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
                                            <div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> American News </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> Nigerian News </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> Sports </label>
                                                </div>
                                                <div class="form-check mt-3 ms-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> Football </label>
                                                </div>
                                                <div class="form-check mt-3 ms-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> BasketBall </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1"> Entertainment </label>
                                                </div>
                                            </div>
                                            <!-- add new category -->
                                            <div class="mt-5">
                                                <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Category Name" name="post-title" aria-describedby="defaultFormControlHelp">
                                                <select id="defaultSelect" class="form-select mt-2">
                                                    <option>--Parent Category--</option>
                                                    <option value="1">American News</option>
                                                    <option value="2">Sports</option>
                                                    <option value="3">Nigerian News</option>
                                                    <option value="3">Entertainment</option>
                                                </select>
                                                <a type="button" href="#" class="btn btn-outline-primary btn-sm mt-3">
                                                    Add New Category
                                                </a>
                                            </div>
                                            <!--/ add new category -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                    </div>
                </div>
                <!-- / Content -->

                <?php require('footer.php') ?>