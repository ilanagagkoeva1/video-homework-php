<? include 'includes/header.php'; ?>
<a href="index.php">Перейти к видео на канале</a>
<br>
<br>
<?
// идентификатор пользователя
$errors = [];
$userId = $_GET['user_id'] ?? null;
if (isset($_POST['submit'])) {
    $video = $_FILES['my_video'];
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $image = $_FILES['image'];
    $channel = $_POST['channelname'];
    $channel_id = $_POST['channel_id'];

    if (!$title || mb_strlen($title) > 20) $errors['title'] = 'title not correct';
    if (mb_strlen($description) > 500) $errors['description'] = 'desc not correct';
    if ($image['size']=== 0) $errors['image'] = 'image not correct';
    else if ($image['type']!== 'image/jpeg' && $image['type']!== 'image/png' ) $errors['image'] = 'image format not correct';
    else if ($image['size'] > 2000000) $errors['image'] = 'image size not correct';
    
    if ($video['size']=== 0) $errors['video'] = 'video not correct';
    else if ($video['type']!== 'video/mp4') $errors['video'] = 'video format not correct';
    else if ($video['size'] > 500000000) $errors['video'] = 'video size not correct';



    if (count($errors) === 0) {
        $video_ex = pathinfo($video['name'], PATHINFO_EXTENSION);
        $extensionArray = explode('.', $image['name']);
        // получаем последний элемент массива, т.е. extension
        $extension = $extensionArray[count($extensionArray) - 1];
        // генерируем уникальное имя файла и подставляем расширение файла
        $fileName = uniqid() . '.' . $extension;
        // указываем путь к файлу от корня
        $imagePath = 'images/' . $fileName;
        $video_ex_lc = strtolower($video_ex);
        // перемещаем файл из временной директории в нашу
            $new_video_name = uniqid("video-", true) . '.' . $video_ex_lc;
            $video_upload_path = 'uploads/' . $new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);
            move_uploaded_file($image['tmp_name'], $imagePath);
            // $channel = $user['channelname'];
            // debug_to_console($user['channelname']);
            // Now let's Insert the video path into database
            // $sql = "INSERT INTO videos(video_url) 
            //        VALUES('$new_video_name')";
            // mysqli_query($conn, $sql);
            $db = new PDO('mysql:host=localhost;dbname=test_db', 'root', 'root');
            $query = $db->prepare("INSERT INTO videos (video_url, channelname, videoname, description, image_url, channel_id) VALUES (?, ?, ?, ?, ?, ?)");
            $query->bindParam(1, $new_video_name);
            $query->bindParam(2, $channel);
            $query->bindParam(3,  $title);
            $query->bindParam(4,  $description);
            $query->bindParam(5,  $imagePath);
            $query->bindParam(6, $channel_id);

            $query->execute();
            header("Location: index.php");
            exit;
        } 
    }

?>
<h2>Загрузите новое видео!</h2>


    <form action="view.php" method="post" enctype="multipart/form-data">
        <div>
            <label>
                Video title:<br>
                <input type="text" placeholder="Post title" name="title" value="<?= $title ?? '' ?>">
                <?= $errors['title'] ?? '' ?>
            </label>
        </div>
        <div>
            <label>
                Video description:<br>
                <textarea placeholder="Post description" name="description"><?= $description ?? '' ?></textarea>
                <?= $errors['description'] ?? '' ?>
            </label>
        </div>
        <div>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="500" /> -->
            <label>
                Video image:<br>
                <input type="file" name="image">
                <?= $errors['image'] ?? '' ?>
            </label>
        </div>
        <div>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="5000" /> -->
            <label>
                Video:<br>
                <input type="file" name="my_video">
                <?= $errors['video'] ?? '' ?>
            </label>
        </div>
        <p><?= $user['channelname'] ?></p>
        <input type="hidden" value="<?= $user['channelname'] ?>" name="channelname">
        <input type="hidden" value="<?= $user['id'] ?>" name="channel_id">



        <input type="submit" name="submit" value="Upload">
    </form>

</body>

</html>