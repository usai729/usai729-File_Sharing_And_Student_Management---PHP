<?php
    if (isset($_POST['post'])) {
        $linkRaw = mysqli_real_escape_string($conn, $_POST['link']);
        $class = intval($_POST['class']);

        $link = str_replace('/watch?v=', '/embed/', $linkRaw);

        $sql = "INSERT INTO youtubeLinks(link, class) VALUES('$link', '$class')";

        if (mysqli_query($conn, $sql)) {
            header("Location: videoUp.php");
        }
    }
?>