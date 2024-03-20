<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Account.php';

$currentPage = $_GET['page'] ?? 1;

$account = new Account();
$accounts = $account->accountsCount();
$accountsToView = $account->index($currentPage);

if (($accounts % 10) == 0) {
    $pagesCount = $accounts / 10;
} else {
    $pagesCount = intdiv($accounts, 10) + 1;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Accounts</title>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/scripts.js"></script>
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>
<body>
<main class="page-accounts" id="page-accounts">
    <h1 class="h">Список аккаунтов</h1>
    <a class="button" href="/manage_accounts/new">Добавить аккаунт</a>
    <div class="accounts-item-header">
        <b class="accounts-item-header-field">Имя</b>
        <b class="accounts-item-header-field">Фамилия</b>
        <b class="accounts-item-header-field">Почта</b>
        <b class="accounts-item-header-field">Название компании</b>
        <b class="accounts-item-header-field">Должность</b>
        <b class="accounts-item-header-field">Номер телефона</b>
        <b class="accounts-item-header-field">Доп. номер телефона</b>
        <b class="accounts-item-header-field">Доп. номер телефона</b>
    </div>
    <ul class="accounts_list">
        <?php foreach ($accountsToView as $account): ?>
        <li class="account-item">
            <span class="account-item-field" hidden=""><?=htmlspecialchars($account['id'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['first_name'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['last_name'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['email'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['company_name'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['position'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['phone_number_1'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['phone_number_2'])?></span>
            <span class="account-item-field"><?=htmlspecialchars($account['phone_number_3'])?></span>
            <a class="button" href="/manage_accounts/edit/?id=<?=$account['id']?>">Редактировать аккаунт</a>
            <button class="button delete" name="deleteAccount" value="<?=$account['id']?>">Удалить аккаунт</button>
        </li>
        <?php endforeach;?>
    </ul>
    <ul class="paginator">
        <?php for ($page = 1; $page <= $pagesCount; $page++): ?>
        <li>
            <a class="button" href="/?page=<?=$page?>"> <?=$page?></a>
        </li>
        <?php endfor; ?>
    </ul>
</main>
</body>
</html>
