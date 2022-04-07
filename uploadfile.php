/

//function uploadFile(): string
//{
//    try {
//        // Undefined | Multiple Files | $_FILES Corruption Attack
//        // If this request falls under any of them, treat it as invalid.
//        if (!isset($_FILES['newFile']['error'])
//            || is_array($_FILES['newFile']['error'])
//        ) {
//            throw new RuntimeException('Invalid parameters.');
//        }
//
//        // Check $_FILES['newFile']['error'] value.
//        switch ($_FILES['newFile']['error']) {
//            case UPLOAD_ERR_OK:
//                break;
//            case UPLOAD_ERR_NO_FILE:
//                throw new RuntimeException('No file sent.');
//            case UPLOAD_ERR_INI_SIZE:
//            case UPLOAD_ERR_FORM_SIZE:
//                throw new RuntimeException('Exceeded filesize limit.');
//            default:
//                throw new RuntimeException('Unknown error.');
//        }
//
//        $tempFilename = $_FILES['newFile']['tmp_name'];
//
//        $fileSize = filesize($tempFilename);
//
//        if ($fileSize === 0) {
//            throw new RuntimeException('The file is empty.');
//        }
//
//        if ($fileSize > 100000000) {
//            throw new RuntimeException('Exceeded filesize limit.');
//        }
//
//        // As the $_FILES['upfile']['mime'] value could be tampered with we will
//        // check it ourselves.
//        $finfo = new finfo(FILEINFO_MIME_TYPE);
//
//        $fileFormat = $finfo->file($tempFilename);
//
//        $allowedTypes = [
//            'image/png' => 'png',
//            'image/jpeg' => 'jpg'
//        ];
//
//        $isValidFormat = in_array(
//            $fileFormat,
//            array_keys($allowedTypes),
//            true);
//
//        if (false === $isValidFormat) {
//            throw new RuntimeException('Invalid file format.');
//        }
//
//        $extension = $allowedTypes[$fileFormat];
//
//        // The uploaded file needs naming uniquely.
//        // We should not trust $_FILES['upfile']['name'] in case it contains
//        // something dodgy.
//        // Hashing the given name will make it both unique and safe.
//        $safeUniqueName = sha1_file($tempFilename) . '.' . $extension;
//
//        // __DIR__ is the directory of the current PHP file
//        $targetDirectory = __DIR__ . '/Images';
//        $newFilepath = $targetDirectory . '/' . $safeUniqueName;
//
//        if (!move_uploaded_file($tempFilename, $newFilepath)) {
//            throw new RuntimeException('Failed to move uploaded file.');
//        }
//
//        return '-success-' . $safeUniqueName;
//
//    } catch (RuntimeException $e) {
//        return $e->getMessage();
//    }
//}
//
//
//
//
//
//function addNewSandwich(PDO $pdo, array $formdata, string $imageName): int
//{
//
//    $query = $pdo->prepare(
//        "INSERT INTO `sandwiches` (`name`,`bread`, `grain`, `temperature`, `image`)" .
//        "VALUES (:name, :bread, :grain, :temperature, :image);"
//    );
//    $name = $formdata['name'];
//    $bread = $formdata['bread'];
//    $grain = $formdata['grain'];
//    $temperature = $formdata['temperature'];
//    $image = $imageName;
//
//    $query->execute([
//        'name' => $name,
//        'bread' => $bread,
//        'grain' => $grain,
//        'temperature' => $temperature,
//        'image' => $image,
//    ]);
//    return (int)$pdo->lastInsertId();
//}
//
//$imageString = uploadFile(); // this calls the function and puts the return value in $imageString
//
//if (strpos(strtolower($imageString), 'success')) { // if the variable contains the string 'success'
//
//    $imageString = substr($imageString, 9); // remove the first 9 characters from -success-
//    $inserted = addToDb($_POST, $pdo, $imageString); // add to db
//}
//
//
//
//
//header("Location: index.php");
//
//function fetchGrains(PDO $pdo): array
//{
//    $sql =
//        'SELECT `grains`.`id`, `grains`.`grain`' .
//        ' FROM `grains` ' .
//        ' ORDER BY `grains`.`grain`;';
//
//    return fetchAll($pdo, $sql);
//}
//
//function fetchBreads(PDO $pdo): array
//{
//    $sql =
//        'SELECT `breads`.`id`,
//       `breads`.`bread`
//        FROM `breads`
//        ORDER BY `breads`.`bread`;';
//
//    return fetchAll($pdo, $sql);
//}
//
//function fetchTemperatures(PDO $pdo): array
//{
//    $sql =
//        'SELECT `temperatures`.`id`,
//       `temperatures`.`temperature`
//        FROM `temperatures`
//        ORDER BY `temperatures`.`temperature`;';
//
//    return fetchAll($pdo, $sql);
//}
//
//function fetchIngredients(PDO $pdo): array
//{
//    $sql =
//        'SELECT `ingredients`.`id`,
//       `ingredients`.`ingredient`
//        FROM `ingredients`
//        ORDER BY `ingredients`.`ingredient`;';
//
//    return fetchAll($pdo, $sql);
//}
//
//function addToJunct(PDO $pdo, int $sandwich_fk, int $ingredient_fk): void
//{
//    $query = $pdo->prepare(
//        'INSERT INTO `junct` (`sandwich_fk`, `ingredient_fk`)
//            VALUES (:sandwich_fk, :ingredient_fk);'
//    );
//    $query->execute([
//        'sandwich_fk' => $sandwich_fk,
//        'ingredient_fk' => $ingredient_fk,
//    ]);
}