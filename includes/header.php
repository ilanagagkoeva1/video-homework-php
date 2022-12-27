<?php
// include './db_conn.php';
include 'db_conn.php';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VideoTube</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <nav>
        <b><a href="index.php">Home</a></b> |

        <?php if ($user) : ?>
            <!-- <a href="channel.php">channel</a> | -->
            <a href="view.php">Create video</a> |
            <a href="mychannel.php?id=<?= $user['id'] ?>">My channel</a> |
            <a href="logout.php">Logout (<?= $user['email'] ?>)</a>
        <?php else : ?>
            <a href="registration.php">Registration</a> |
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>