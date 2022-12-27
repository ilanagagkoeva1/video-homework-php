<?


// function validatePost($title, $description, $content, $image, $isEdit = false)
// {
//     $errors = [];

//     // проверяем отправлен ли файл
//     if ($image['size'] > 0 || $isEdit === false) {
//         // объявляем массив с разрешенными типами файлов
//         $types = [
//             'image/jpeg',
//             'image/png',
//             'image/gif',
//         ];
//         // проверяем входит ли тип файла в разрешенные типы
//         if (!in_array($image['type'], $types)) {
//             $errors['image'] = 'Incorrect file type';
//         }
//         // проверяем размер файла в байтах
//         if ($image['size'] > 1 * 1024 * 1024) {
//             $errors['image'] = 'Incorrect image size';
//         }
//     }

//     $titleLength = mb_strlen($title);
//     if (!$title || $titleLength > 255) {
//         $errors['title'] = 'Incorrect title';
//     }

//     $descriptionLength = mb_strlen($description);
//     if (!$description || $descriptionLength > 500) {
//         $errors['description'] = 'Incorrect description';
//     }

//     if (!$content) {
//         $errors['content'] = 'Field is required';
//     }

//     return $errors;
// }
