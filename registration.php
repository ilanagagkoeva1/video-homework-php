<?php
include 'includes/header.php';

$errors = [];
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $description = trim($_POST['description']);


    $password = $_POST['password'];

    $nameLength = mb_strlen($name);
    if ($nameLength < 1 || $nameLength > 30) {
        $errors['name'] = 'Name is not correct';
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Email is not correct';
    }

    $existEmailQuery = $db->prepare("SELECT * FROM users WHERE email = :email");
    $existEmailQuery->execute([
        'email' => $email,
    ]);
    if ($existEmailQuery->fetch() !== false) {
        $errors['email'] = 'EMail is exist';
    }

    $passwordLength = mb_strlen($password);
    if ($passwordLength < 3) {
        $errors['password'] = 'Password is not correct';
    }

    if (count($errors) === 0) {
        $insertQuery = $db->prepare("INSERT INTO users (channelname, email, password, description) VALUES (:channelname, :email, :password, :description)");
        $insertQuery->execute([
            'channelname' => $name,
            'email' => $email,
            'password' => md5($password),
            'description' => $description

        ]);
        header('Location: login.php');
        exit;
    }
}
?>

<h1>Registration</h1>
<form action="registration.php" novalidate method="post">
    <div>
        <label>
            Name:
            <input type="text" placeholder="Your channel name" name="name" value="<?= $name ?? '' ?>">
            <?= $errors['name'] ?? '' ?>
        </label>
    </div>
    <div>
        <label>
            DESCRIPTION:
            <input type="text" placeholder="Your channel description" name="description" value="<?= $description ?? '' ?>">
            <?= $errors['description'] ?? '' ?>
        </label>
    </div>
    <div>
        <label>
            E-Mail:
            <input type="email" placeholder="Your email" name="email" value="<?= $email ?? '' ?>">
            <?= $errors['email'] ?? '' ?>
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="password" placeholder="Your password" name="password">
            <?= $errors['password'] ?? '' ?>
        </label>
    </div>

    <div>
        <input type="submit" name="submit" value="Registration">
    </div>
</form>

<?php
// include 'includes/footer.php';
