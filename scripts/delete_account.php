<?php

require_once '/classes/Account.php';

$account = new Account();

$account->delete($_POST['id']);

