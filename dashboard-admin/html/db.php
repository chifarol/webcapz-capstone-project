<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE lastname='micheal'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
} else {
    echo "0 results";
}

// // Prepare an insert statement
// $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (? ,?, ?)";
// $stmt = mysqli_prepare($conn, $sql);
// if ($stmt) {
//     // Bind variables to the prepared statement as parameters
//     mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);

//     /* Set the parameters values and execute
//     the statement again to insert another row */
//     $firstname = "Hermione";
//     $lastname = "Granger";
//     $email = "hermionegranger@mail.com";
//     mysqli_stmt_execute($stmt);

//     /* Set the parameters values and execute
//     the statement to insert a row */
//     $firstname = "Ron";
//     $lastname = "Weasley";
//     $email = "ronweasley@mail.com";
//     mysqli_stmt_execute($stmt);

//     echo "Records inserted successfully.";
// } else {
//     echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
// }

// // Close statement
// mysqli_stmt_close($stmt);

// Close connection
mysqli_close($conn);
