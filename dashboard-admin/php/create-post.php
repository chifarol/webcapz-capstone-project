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
                    <div>
                        <?php
                        require('functions/create-post-handler.php')
                        ?>
                    </div>
                    <div class="mb-3">
                        <!-- parent form -->
                        <form enctype="multipart/form-data" id="create-post-form" method="post"></form>
                        <div class="row">
                            <!-- Basic -->
                            <div class="col-md-7">
                                <div class="card mb-4">
                                    <div class="card-body demo-vertical-spacing demo-only-element">
                                        <span class="text-danger"><?php echo ($error_msg) ?></span>
                                        <div>
                                            <label for="defaultFormControlInput" class="form-label">Post Title*</label>
                                            <input form="create-post-form" type="text" class="form-control" id="defaultFormControlInput" placeholder="Post Title" name="post-title" aria-describedby="defaultFormControlHelp" required>
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Post Content*</label>
                                            <textarea form="create-post-form" class="form-control" id="exampleFormControlTextarea1" rows="10" name="post-content"></textarea required>
                                        </div>
                                        <input type="submit" name="submit-post" form="create-post-form" class="btn btn-primary" value="Publish" />
                                    </div>
                                </div>
                            </div>

                            <!-- Merged -->
                            <div class="col-md-5">
                                <div class="card mb-4">
                                    <div class="card-body demo-vertical-spacing demo-only-element">

                                        <div>
                                            <label for="post-image" class="form-label">Attach Image*</label>
                                            <input form="create-post-form" type="text" class="form-control mb-2" id="defaultFormControlInput" placeholder="Post Image URL" name="post-image-url" aria-describedby="defaultFormControlHelp" required>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="mt-3">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal">
                                                        Choose from library
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="basicModal" tabindex="-1" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel1">Choose Image</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div>
                                                                        <input type="file" class="form-control d-none" id="post-image" name="post-image" form="create-post-form" accept="image/jpeg, image/png, image/jpg">
                                                                        <label type="button" class="btn btn-primary btn-sm mb-2" for="post-image">Upload Image
                                                                        </label>
                                                                    </div>
                                                                    <div class="d-flex flex-wrap mt-3" style="gap:1.5rem">
                                                                        <img src="" style="width:120px;height:120px" />
                                                                        <img src="" style="width:120px;height:120px" />
                                                                        <img src="" style="width:120px;height:120px" />
                                                                        <img src="" style="width:120px;height:120px" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="exampleFormControlTextarea1" class="form-label">Categories*</label>
                                            <div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> American News </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="2" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> Nigerian News </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="3" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> Sports </label>
                                                </div>
                                                <div class="form-check mt-3 ms-3">
                                                    <input class="form-check-input" type="checkbox" value="4" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> Football </label>
                                                </div>
                                                <div class="form-check mt-3 ms-3">
                                                    <input class="form-check-input" type="checkbox" value="5" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> BasketBall </label>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox" value="6" id="defaultCheck1" name="category" form="create-post-form">
                                                    <label class="form-check-label" for="defaultCheck1"> Entertainment </label>
                                                </div>
                                            </div>
                                            <!-- add new category -->
                                            <div class="mt-5">
                                                <input type="text" class="form-control" id="new-category-field" placeholder="Category Name" name="new-category" form="create-post-form" aria-describedby="defaultFormControlHelp">

                                                <select class="form-select mt-2" form="create-post-form" name="parent-category" id="parent-category-field">
                                                    <option>--Parent Category--</option>
                                                    <option value="1">American News</option>
                                                    <option value="2">Sports</option>
                                                    <option value="3">Nigerian News</option>
                                                    <option value="4">Entertainment</option>
                                                </select>
                                                <div type="button" href="#" id="create-new-category" class="btn btn-outline-primary btn-sm mt-3">
                                                    Add New Category
                                                </div>
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
<script>
const newCategoryField=document.querySelector('#new-category-field');
const parentCategoryField=document.querySelector('#parent-category-field');
const createCategoryButton=document.querySelector('#create-new-category');

createCategoryButton.addEventListener('click',()=>{
    const newCategoryName=newCategoryField.value
    const parentCategoryid=parentCategoryField.value

    fetch(`categories-handler.php?new-category=${newCategoryName}&parent-category=${parentCategoryid}`)
    .then((response) => response.json())
    .then((data) => console.log(data));
//    console.dir(newCategoryField);
//    console.dir(parentCategoryField);
})
</script>
                <?php require('footer.php') ?>