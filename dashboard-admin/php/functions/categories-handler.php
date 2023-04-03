<?php
header('Content-Type: application/json');

require_once('../db.php');
if (
    $_SERVER["REQUEST_METHOD"] === "GET"
) {
    if (
        isset($_GET['new-category']) &&
        isset($_GET['parent-category'])
    ) {
        global $conn;

        $create_category = "INSERT INTO categories (
                category_name,
                parent_category_id)
                VALUES (?,?)";

        if ($stmt = mysqli_prepare($conn, $create_category)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param(
                $stmt,
                "si",
                $new_category,
                $parent_category
            );

            /* Set the parameters values and execute
            the statement again to insert another row */
            $new_category = sanitize_input($_GET['new-category']);
            $parent_category = sanitize_input($_GET['parent-category']);
            if (empty($parent_category)) {
                $parent_category = 0;
            }

            if (empty($new_category)) {
                $response = [
                    "successful" => false,
                    "message" => "couldn't create new category - required fields missing"
                ];
                echo json_encode($response);
                return;
            }
            $result = mysqli_stmt_execute($stmt);
            if ($result) {
                $last_id = mysqli_insert_id($conn);
                $response = [
                    "successful" => true,
                    "message" => "new category created",
                    "new_category_id" => $last_id
                ];
                echo json_encode($response);
            } else {
                $response = [
                    "successful" => false,
                    "message" => "couldn't create new category"
                ];
                echo json_encode($response);
            }
        } else {
            $response = [
                "successful" => false,
                "message" => "couldn't create new category"
            ];
            echo json_encode($response);
        }

        // Close statement
        // mysqli_stmt_close($stmt);
    }
}