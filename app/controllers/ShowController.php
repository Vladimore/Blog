<?php

$id = (int)$_GET['id'];
$post = $db->query("SELECT * FROM posts WHERE id = ?", [$id])->find();
require_once VIEWS . '/show.blade.php';