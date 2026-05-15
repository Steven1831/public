<?php
$mysqli = @new mysqli('127.0.0.1', 'root', 'root', 'local', 10011);
if ($mysqli->connect_errno) {
    echo 'ERROR: ' . $mysqli->connect_error;
} else {
    echo 'OK: connected';
    $result = $mysqli->query("SELECT COUNT(*) as cnt FROM wp_posts WHERE post_type='page'");
    $row = $result->fetch_assoc();
    echo ' | pages: ' . $row['cnt'];
    $mysqli->close();
}
