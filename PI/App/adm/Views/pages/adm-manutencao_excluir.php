<?php
require_once __DIR__ . '/../../Controllers/OrdemServicoController.php';

if (!isset($_GET['id_os']) || !is_numeric($_GET['id_os'])) {
    header('Location: ../pages/adm-manutencao.php');
    exit;
}

$id = (int)$_GET['id_os'];
$controller = new OrdemServicoController();
$result = $controller->excluir($id);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir O.S.</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php if ($result): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Ordem de serviço excluída com sucesso!',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = '../pages/adm-manutencao.php';
        });
    </script>
<?php else: ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erro ao excluir!',
            text: 'Não foi possível excluir a ordem de serviço.',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = '../pages/adm-manutencao.php';
        });
    </script>
<?php endif; ?>
</body>
</html>
