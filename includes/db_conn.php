<?php
session_start();

// connect to db
$db = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'root');
$sname = "localhost";
$uname = "root";
$password = "root";

$db_name = "test_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

/**
 * User
 */
$user = isset($_SESSION['user_id']) ? getUser($_SESSION['user_id']) : false;

function getUser($id)
{
    global $db;

    $user = $db->query("SELECT * FROM users WHERE id = " . intval($id))->fetch();

    if ($user) {
        $user['channelname'] = htmlspecialchars($user['channelname']);
    }

    return $user;
}
function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function preparePost($post)
{
    $post['videoname'] = htmlspecialchars($post['videoname']);
    $post['description'] = $post['description'];
    $post['video_url'] = htmlspecialchars($post['video_url']);
    $post['channelname'] = htmlspecialchars($post['channelname']);
    $post['image_url'] =  htmlspecialchars($post['image_url']);

    return $post;
}

function getPost($id)
{
    global $db;

    $post = $db->query("SELECT * FROM videos WHERE id = " . intval($id))->fetch();

    return $post ? preparePost($post) : false;
}
function redirect($url)
{
    header('Location: ' . $url);
    exit;
}
// function hasAccess($post)
// {
//     global $user;

//     return $user && $post && $user['channelname'] === $post['channelname'];
// }
