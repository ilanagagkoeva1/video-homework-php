<?php
include 'includes/header.php';

unset($_SESSION['user_id']);
header('Location: index.php');
