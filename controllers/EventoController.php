<?php
    //require_once('./models/Eventos.php');
    require_once('./models/Evento.php');
    class eventosController{
        private $model;

        function __construct()
        {
            $this->model = new EventosModel();
        }

        

        function getAll(){
            if (isset($_GET['action'])) {
                if ($_GET['action'] === 'createEvent') {
                    $this->createEvent();
                }
            } else {
                $resultData = $this->model->getAll();
                require_once('./views/index.php');

            }
        }

        function createEvent() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $date = $_POST['date'];
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
                $description = $_POST['description'];
                
                $this->model->addEvent($name, $date, $start_time, $end_time, $description);
    
                header('Location: index.php');
            }
        }

        function editEvent() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $eventId = intval($_POST['event_id']);
                $name = $_POST['name'];
                $date = $_POST['date'];
                $start_time = intval($_POST['start_time']);
                $end_time = intval($_POST['end_time']);
                $description = $_POST['description'];
                $this->model->updateEvent($eventId, $name, $date, $start_time, $end_time, $description);
                header('Location: index.php');
            }
        }

        function deletEvent() {
            //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $eventId = intval($_GET['id']);
                $this->model->deletEvent($eventId);
                header('Location: index.php');
            //}
        }
    }
?>