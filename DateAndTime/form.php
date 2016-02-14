<?php
require_once '../Validator/Validator.php';

$post = file_get_contents('php://input');

if($post){
    $postArray = explode('&', $post);
    $postDictionary = [];
    $errors = [];

    foreach ($postArray as $value) {
        $val = explode('=', $value);
        if($message = Validator::validateIfWholeNumber($val[1], $val[0])){
            array_push($errors, $message);
        }
        $postDictionary[$val[0]] = $val[1];
    }
    $dateTime = new DateTime();
    $dateTime->setDate($postDictionary['year'], $postDictionary['month'], $postDictionary['day']);

    if(intVal($dateTime->format('d')) != $postDictionary['day'] || intVal($dateTime->format('m')) != $postDictionary['month']){
        array_push($errors, "Data is not correct format!");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date form</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <?php if ($errors):
        foreach($errors as $value){
            echo $value;
        }
        ?>

    <?php endif; ?>
    <div>
        <label for="day">Day</label>
        <input type="text" id="day" name="day">
    </div>
    <div>
        <label for="month">Month</label>
        <input type="text" id="month" name="month">
    </div>
    <div>
        <label for="year">Year</label>
        <input type="text" id="year" name="year">
    </div>
    <button type="submit">Send</button>
</form>
</body>
</html>