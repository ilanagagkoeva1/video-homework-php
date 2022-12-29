<?php
include 'includes/header.php';
?>

<?php
$post = getPost($_GET['id']);
if (!$post) {
    redirect('index.php');
}
?>
<div class="single-post">
    <!-- <h1><?= $post['title'] ?></h1> -->
    <!-- <img src="<?= $post['image_url'] ?>" alt="" style="width: 400px"> -->
    <p><?= $post['videoname'] ?></p>

    <p><?= $post['description'] ?></p>
    <? if ($user && $post && $user['id'] == $post['channel_id'])):?>
    <p><?= $user['channelname'] ?></p>
    <?endif;?>
    <video poster="<?= $post['image_url'] ?>" src="uploads/<?=$post['video_url']?>" controls>

    </video>

    <?php if ($user && $post && $user['id'] == $post['channel_id']) : ?>
        <a href="edit.php?id=<?= $post['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $post['id'] ?>">Delete</a>
    <?php endif; ?>


</div>