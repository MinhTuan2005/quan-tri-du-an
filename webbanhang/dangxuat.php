<?php

    session_start();
    unset($_SESSION['amin_name']);
    unset($_SESSION['amin_id']);

    header("location: index.php");

?>