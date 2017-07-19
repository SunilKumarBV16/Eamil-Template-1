<?php
if(!isset($_SESSION['name'])) {
    header("location:index.html");
} else {
    session_destroy();
header("location:index.html");
}

?>