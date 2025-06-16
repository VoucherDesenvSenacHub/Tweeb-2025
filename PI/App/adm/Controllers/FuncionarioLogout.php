<?php

session_start();

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Destruir a sessão
session_destroy();

// Redirecionar para a página inicial
header('Location: /Tweeb-2025/PI/app/adm/views/pages/login-funcionario.php');
exit;