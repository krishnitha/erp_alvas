<?php
    require_once "../config.php";

    $sub = $_POST["sub"];

    $link -> query('update co_pso set approval="approved" where sub="' . $sub . '"');

    header("Location: approvals.php");

?>