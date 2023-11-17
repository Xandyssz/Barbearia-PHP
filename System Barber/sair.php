<?php
session_start();
session_destroy();
header("location: sysb_index.php");
?>