<?php
require_once __DIR__ . '/../Models/Usuario.php';

Usuario::logout();

header('location: /Tweeb-2025/PI/App/user/View/pages/login.php');
exit;