<?php

use classes\Database;

require_once '../core/const.php';
require_once CORE . '/funcs.php';

require_once CORE . '/classes/Database.php';
$db_config = require_once CONFIG . '/db.php';

$db = (Database::getInstance())->getConnection($db_config);
require_once CORE . '/router.php';