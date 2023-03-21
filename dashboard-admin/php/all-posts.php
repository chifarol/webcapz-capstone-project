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
            <span>All Posts</span>
            <a type="button" href="#" class="btn btn-outline-primary  btn-sm ms-3">
              Create Post
            </a>
            <!-- Search -->

            <form class="mt-3 w-50 sm:w-auto">
              <div class="input-group input-group-merge">
                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                <input type="text" name="search-term" class="form-control p-3" placeholder="Search Posts" aria-label="Search..." aria-describedby="basic-addon-search31">
              </div>
            </form>
          </div>
          <div class="mb-3">
            <?php require('tables/all-posts-table.php') ?>
          </div>
          <div class="">
          </div>
        </div>
        <!-- / Content -->

        <?php require('footer.php') ?>