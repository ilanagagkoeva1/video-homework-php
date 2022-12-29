<? include 'includes/header.php'; ?>
<? if ($user) : ?>
    <a href="view.php">Загрузить новое видео</a>
<? endif;
$perPage = 10;
$page = $_GET['page'] ?? 1;

$sqlString = "SELECT * FROM videos";

$videos = $db->query($sqlString)->fetchAll();

$count = $page * $perPage;

$display = array_slice($videos, 0, $count);
shuffle($display);
?>
<p>отображаемые видео<?= count($display) ?></p>
<p>всего видео<?= count($videos) ?></p>

<?php foreach ($display as $video) :
    $video = preparePost($video);
   
?>
    <article>
        <div class="videos">
            <a href="channel.php?id=<?= $video['channel_id'] ?>"><?= $video['channelname'] ?></a>
            <h3><?= $video['videoname'] ?></h3>
            <p><?= $video['description'] ?></p>
            <br>
            <br>
          
            <a href="show.php?id=<?= $video['id'] ?>"><img src="<?= $video['image_url']  ?>" alt=""></a>
            <!-- добавить расширение картинки !!!!!!! или в бд или сюда локально -->
            <!-- <video poster="<?= $video['image_url'] ?>" src="uploads/<?= $video['video_url'] ?>" controls>
            </video> -->
            <br>
            <br>
    </article>
    <hr>

<?php endforeach; ?>
<?
if (count($display) < count($videos)) {
    echo '<a href="index.php?page=' . ($page + 1) . '">Показать ещё</a>';
} else {
    echo 'Вы просмотрели все видео';
}
?>



</div>
</body>

</html>