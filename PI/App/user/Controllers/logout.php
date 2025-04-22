<?php
session_start();
session_destroy(); // Destroi a sessão
header('Location: /Tweeb-2025/PI/App/user/View/pages/login.php'); // Redireciona para login ou página inicial
exit;
