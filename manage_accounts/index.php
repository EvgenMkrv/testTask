<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Account.php';

$account = new Account();

$edit = false;

if (isset($_GET['id'])) {
    $accountToUpdate = $account->findAccount($_GET['id']);
    $edit = true;
}

if (isset($_POST['update'])) {
    $account->update($_POST, $_POST['update']);
}

if (isset($_POST['add'])) {
    $account->store($_POST);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Manage accounts</title>

    <script src="/js/scripts.js"></script>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>
<body>
<main class="page-accounts">
    <form method="post" action="index.php" class="form">
        <div class="div">
            <label class="label">
                Имя
                <input type="text" name="first_name" required class="input" <?php if ($edit) echo 'value=' . $accountToUpdate['first_name'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Фамилия
                <input type="text" name="last_name" required <?php if ($edit) echo 'value=' . $accountToUpdate['last_name'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Почта
                <input type="email" name="email" required <?php if ($edit) echo 'value=' . $accountToUpdate['email'] ?>>
            </label>
        </div>
        <div class="div error">
            <?php if (isset($account->message)) echo($account->message); ?>
        </div>
        <div class="div">
            <label class="">
                Название компании
                <input type="text" name="company_name" <?php if ($edit) echo 'value=' . $accountToUpdate['company_name'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Должность
                <input type="text" name="position" <?php if ($edit) echo 'value=' . $accountToUpdate['position'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Номер телефона
                <input type="tel" name="phone_number_1" pattern="[0-9]{10}" <?php if ($edit) echo 'value=' . $accountToUpdate['phone_number_1'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Доп. номер телефона
                <input type="tel" name="phone_number_2" pattern="[0-9]{10}" <?php if ($edit) echo 'value=' . $accountToUpdate['phone_number_2'] ?>>
            </label>
        </div>
        <div class="div">
            <label class="">
                Доп. номер телефона
                <input type="tel" name="phone_number_3" pattern="[0-9]{10}" <?php if ($edit) echo 'value=' . $accountToUpdate['phone_number_3'] ?>>
            </label>
        </div>
        <button class="button" type="submit"
            <?php if ($edit): ?> name="update" value="<?=htmlspecialchars($accountToUpdate['id'])?>"> Обновить
            <?php else: ?> name="add" value="add"> Добавить
            <?php endif;?>
        </button>
        <a class="button" href="/">Главная</a>
    </form>
</main>
</body>
</html>