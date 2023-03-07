<?php

declare(strict_types=1);
session_start();
?>
<html>
!

<head>
    <title>Php examples</title>
    <script src="index.js" defer></script>
</head>
<?php
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
?>

<body>

    <?php
    // An associative array
    $marks = array("Peter" => 65, "Harry" => 80, "John" => 78, "Clark" => 90);

    echo json_encode($marks); // outputs {"Peter":65,"Harry":80,"John":78,"Clark":90}
    echo ("<br>");
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://official-joke-api.appspot.com/random_joke");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // process and return the response
    $response = curl_exec($curl);
    var_dump(json_decode($response, true));
    ?>
    <br>
    <form method="get" action="api.php">
        <input type="text" name="username" id="name" />
        <input type="email" name="email" id="email" />
        <input type="submit" value="Submit" id="submit" />
    </form>

</body>

</html>