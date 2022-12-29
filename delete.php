<?php
$is_auth = true;
include 'includes/db_conn.php';

$post = getPost($_GET['id']);

if ($user && $post && $user['channel_id'] == $post['channel_id']) {
    @unlink('uploads/' . $post['video_url']);
    @unlink($post['image_url']);
    $db->query("DELETE FROM videos WHERE id = " . $post['id']);
}

redirect('index.php');
