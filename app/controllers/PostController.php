<?php


$posts = $db->query("SELECT * FROM posts")->findAll();
require_once VIEWS . '/index.blade.php';