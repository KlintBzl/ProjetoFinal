<link rel="icon" type="image/png" sizes="35x35" href="../assets/Hoje.png">
<link rel="stylesheet" href="../style.css">

<?php
session_start();
require_once "../dao/HistoriaDAO.php";

$dao = new HistoriaDAO();
$eventos = $dao->hoje();
?>
<div class="container">
<div class="card">
<a href="../index.php"><button>Voltar</button></a>
<?php if (isset($_SESSION['usuario'])): ?>
    <a href="./criar_historia.php"><button>Novo Evento</button></a>
</div><div class="card">
    <a href="./editar_historia.php"><button>Editar Evento</button></a>    
    <a href="./excluir_historia.php"><button>Excluir Evento</button></a>    
    <?php endif; ?>
</div>
</div>
    

<h1>Hoje na História</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Data</th>
    </tr>

    <?php foreach ($eventos as $e): ?>
        <tr>
            <td><?= $e['id'] ?></td>
            <td><?= $e['evento'] ?></td>
            <td><?= date('d/m/Y', strtotime($e['data_historica'])) ?></td>
        </tr>
    <?php endforeach; ?>

</table>