<?php
$is_auth = true;
include 'includes/header.php';

$post = getPost($_GET['id']);
if (!($user && $post && $user['id'] == $post['channel_id'])) {
    redirect('index.php');
}

$errors = [];
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];



    if (count($errors) === 0) {
        $imagePath = $post['image_url'];
        if ($image['size'] > 0) {
            // удаляем старый файл
            @unlink($post['image_url']);
            move_uploaded_file($image['tmp_name'], $imagePath);
        }

        $query = $db->prepare("UPDATE videos SET  id = :id, video_url = :video_url, channelname = :channelname, videoname = :videoname, description = :description, image_url = :image_url, channel_id = :channel_id WHERE id = :id");
        $query->execute([
            'id' => $post['id'],
            'video_url' => $post['video_url'],
            'channelname' => $post['channelname'],
            'videoname' => $post['videoname'],
            'description' => $post['description'],
            'image_url' => $imagePath,
            'channel_id' => $post['channel_id']
        ]);

        redirect('show.php?id=' . $post['id']);
    }
}

?>

<h1>Edit post</h1>
<form action="edit.php?id=<?= $post['id'] ?>" novalidate method="post" enctype="multipart/form-data">

    <div>
        <label>
            Video image:<br>
            <img src="<?= $post['image_url'] ?>" alt="" style="width: 150px;"><br>
            <input type="file" name="image">
            <?= $errors['image'] ?? '' ?>
        </label>
    </div>
    <p><?= var_dump($post); ?></p>
    <div>
        <input type="submit" value="Edit" name="submit">
    </div>
</form>