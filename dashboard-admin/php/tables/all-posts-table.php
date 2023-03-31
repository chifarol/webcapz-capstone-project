<div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Categories</th>
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

                while ($postObj = mysqli_fetch_assoc($result)) { ?>

                    <tr>
                        <td>
                            <?php echo $postObj['id'] ?>
                        </td>
                        <td>
                            <?php echo $postObj['post_title'] ?>
                        </td>
                        <td>
                            <?php echo $postObj['category_id'] ?>
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
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bxs-show me-1"></i>
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
                    <tr>
                        <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>