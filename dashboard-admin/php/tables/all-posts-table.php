<div class="card">
    <h5 class="card-header">All Posts</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php
                $_SESSION['get_all_post_error_msg'] = '';
                global $conn;
                $fetch_posts = "SELECT * FROM posts";
                $result = mysqli_query($conn, $fetch_posts);

                while ($postObj = mysqli_fetch_assoc($result)) {
                    $category_id = $postObj['category_id'];
                    $fetch_category = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($conn, $fetch_category);
                    $category = mysqli_fetch_assoc($category_result)

                        ?>

                    <tr>
                        <td>
                            <?php echo $postObj['id'] ?>
                        </td>
                        <td>
                            <?php echo $postObj['post_title'] ?>
                        </td>
                        <td>
                            <?php echo $category['category_name'] ?>
                        </td>
                        <td>
                            <?php echo $postObj['last_modified_date'] ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" target="__blank"
                                        href="/webcapz-capstone-project/blog/post.php?id=<?php echo $postObj['id'] ?>"><i
                                            class="bx bxs-show me-1"></i>
                                        View</a>
                                    <a class="dropdown-item" href="edit-post.php?id=<?php echo $postObj['id'] ?>"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item"
                                        href="functions/delete-post-handler.php?id=<?php echo $postObj['id'] ?>"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>