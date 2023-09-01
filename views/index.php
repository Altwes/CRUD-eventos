<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Eventos</title>
</head>
<body>
        <br><br><br><br>
        <h2 class="card-container mb-2">Lista de eventos</h2>
        <br>
        <div class="card-container mt-2" >
        <button id="new_event" class="btn btn-primary ml-6">Cadastrar Novo Evento</button>
        </div>
        <br><br>
        <div class="container">
            <div class="card-container">
                <?php foreach($resultData as $data): ?>
                    <div class="card">
                        <img src="./img/festa.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['name']?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">Cod: <?= $data['id']?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $data['date']?></h6>
                            <p class="card-text"><?= $data['start_time'] ?> - <?= $data['end_time'] ?> </p>
                            <p class="card-text"><?= $data['description']?></p>
                        </div>
                        <div class="card-footer">
                            <a href="views/form.php?id=<?= $data['id'] ?>" class="btn btn-primary">Editar</a>
                            <a href="index.php?action=deletEvent&id=<?= $data['id'] ?>" class="btn btn-primary">Apagar</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $('#new_event').on('click',function(){
            location.href = 'http://localhost/avanz/views/form.php';
        });
    </script>
</html>