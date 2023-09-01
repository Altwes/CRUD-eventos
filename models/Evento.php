<?php

    if(file_exists('../config/connect.php')){
        require_once('../config/connect.php');
    }else{
        require_once('./config/connect.php');
    }

    class EventosModel extends Connect{
        private $table;

        function __construct()
        {
            parent::__construct();
            $this->table = 'eventos';
        }

        function getAll(){
            $sqlSelect = $this->connection->query("SELECT * FROM $this->table");
            $resultQuery = $sqlSelect ->fetchAll();
            return $resultQuery;
        }

        function addEvent($name, $date, $start_time, $end_time, $description) {
            $sqlInsert = "INSERT INTO $this->table (name, date, start_time, end_time, description) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->connection->prepare($sqlInsert);
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $date);
            $stmt->bindParam(3, $start_time);
            $stmt->bindParam(4, $end_time);
            $stmt->bindParam(5, $description);
            $stmt->execute();
        }

        function updateEvent($eventId, $name, $date, $start_time, $end_time, $description) {
            $sqlUpdate = "UPDATE eventos SET name= '{$name}', date= '{$date}', start_time= '{$start_time}', end_time= '{$end_time}', description= '{$description}' WHERE id = {$eventId}";
            $stmt = $this->connection->prepare($sqlUpdate);
            if ($stmt->execute()) {
                echo "sucesso";
            } else {
                echo "Erro ao atualizar o evento: " . $stmt->error;
            }
        }

        function deletEvent($id){
            $sqlDelet = "DELETE FROM eventos WHERE id = {$id}";
            $stmt = $this->connection->prepare($sqlDelet);
            if ($stmt->execute()) {
                echo "sucesso";
            } else {
                echo "Erro ao atualizar o evento: " . $stmt->error;
            }
        }
        
        function getDetailsEvent($id){
            $sql = $this->connection->query("SELECT * FROM eventos WHERE id = $id");
            return $sql->fetchAll();
        }

    }   
?>