<?php
    require_once('./controllers/EventoController.php');

    $action = !empty($_GET['a']) ? $_GET['a'] : 'getAll';
    
    @$id = $_GET['id'];
    if(@$_GET['action'] == 'editEvent'){
        @$action = 'editEvent';
    }
    if(@$_GET['action'] == 'deletEvent'){
        @$action = 'deletEvent';
    }
    $controller = new eventosController();
    $controller->{$action}();
?> 