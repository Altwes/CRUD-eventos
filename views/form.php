<?php
require_once('../models/Evento.php');
$objEvent = new EventosModel;
$acao = 'create';

$formRoute = 'createEvent';
$event = ['name' => '', 'date' => '', 'start_time' => '', 'end_time' => '', 'description' => '','event_id','id' => ''];
$tittle = 'Cadastro';
if(count($_GET) > 0){
    $eventId = $_GET['id'];
    $tittle = 'Editar evento';
    $acao = 'update';
    $eventId = $_GET['id'];
    $event = $objEvent->getDetailsEvent($eventId)[0];
    $formRoute = 'editEvent&id='.$event['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?= $tittle ?></title>
</head>
<body>
    <div class="container w-75 p-3">
        <h2 class="row justify-content-center"><?= $tittle ?></h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="../index.php?action=<?= $formRoute ?>"method="post">
                    <input type="hidden" name="event_id" id="event_id" value="<?=$event['id']?>" />
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Evento</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $event['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Data do Evento</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?= $event['date'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Hora de Início</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" value="<?= $event['start_time'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Hora do Fim</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" value="<?= $event['end_time'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?= $event['description'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" value="Salvar">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

