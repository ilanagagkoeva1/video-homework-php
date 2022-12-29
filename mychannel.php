<? include 'includes/header.php';
$post = getPost($_GET['id']);
if (!$post) {
    redirect('index.php');
}
$channel = $db->query("SELECT * FROM users WHERE id = " . intval($post['id']))->fetch();
?>
<p><?= var_dump($channel); ?></p>
<h2><?= $channel['channelname'] ?></h2>
<p><?= $channel['description'] ?></p>
<br>
<br>
<div class="videos">
    <?php
    $ch_id = $post['id'];
    // $sql = "SELECT * FROM videos WHERE id = $ch_id ORDER BY id DESC ";
    // $res = mysqli_query($conn, $sql);
    $sqlString = "SELECT * FROM videos WHERE channel_id = $ch_id ORDER BY id DESC";
    $videos = $db->query($sqlString)->fetchAll();
    echo 'Количество видео=' . count($videos);
    ?>
    <?php foreach ($videos as $video) :
        $video = preparePost($video);
    ?>
        <a href="channel.php?id=<?= $video['id'] ?>"><?= $channel['channelname'] ?></a>
        <h3><?= $video['videoname'] ?></h3>
        <p><?= $video['description'] ?></p>
        <br>
        <br>
        <a href="show.php?id=<?= $video['id'] ?>"><img src="<?= $video['image_url']  ?>" alt=""></a>
        <br>
        <br>
    <? endforeach; ?>
</div>
<br>
<br>