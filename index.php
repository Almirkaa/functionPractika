<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?
    $flag = true;
    if (isset($_POST['valid'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    }


    function emptiy_value($str)
    {
        if (empty($str)) {

            return "<p class='err'>Заполните поле</p>";
        }
    }
    function minimal($str, $num)
    {
        if (strlen($str) < (int) $num) {

            return "Данные должны быть не меньше $num символов";
        }
    }
    function format_email($str)
    {
        if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {

            return "Не верный формат почты";
        }

    }

    function num_quantity($str, $num)
    {
        if (strlen($str) != $num) {
            return "Не верное количество знаков";
        }
    }

    // var_dump($flag)
    ?>
    <form action="" method="post" name="valid">
    <h2>Валидация</h2>

        <input type="text" name="name" id="">
        <?
        if (emptiy_value($name)) {
            $flag = false;
            echo emptiy_value($name);

        } elseif (minimal($name, 3)) {
            $flag = false;
            echo minimal($name, 3);

        }
        // var_dump($flag);
        
        ?>
        <input type="text" name="email" id="">
        <?
        if (emptiy_value($email)) {
            $flag = false;
            echo emptiy_value($email);
        } elseif (minimal($email, 6)) {
            $flag = false;
            echo minimal($email, 6);
        } elseif (format_email($email)) {
            $flag = false;
            echo format_email($email);
        }
        ?>
        <input type="text" name="phone" id="">
        <?
        if (emptiy_value($phone)) {
            $flag = false;

            echo emptiy_value($phone);
        } elseif (num_quantity($phone, 11)) {
            $flag = false;  

            echo num_quantity($phone, 11);
        }
        ?>
        <input type="submit" class="btn"  value="Проверить" name="valid">
    </form>
    <?

    if (isset($_POST['valid'])) {
        // var_dump($flag);
        if ($flag != false) {
            echo "<h3>Вы успешно прошли валидацию</h3>";
        }
    }
    ?>

</body>

</html>