<?php
    spl_autoload_register(function($class){
        require_once $class . ".php";
    });

    class SuggestionDAO{
        public $suggestions;
        function __construct(){
            $this->initializeSuggestions();
        }

        function initializeSuggestions(){
            $this->suggestions = [];
            
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select suggestion from suggestions";
            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            
            $stmt->execute();
            while($row = $stmt->fetch()){
                $suggestion = new Suggestion($row["suggestion"]);
                $this->suggestions[] = $suggestion;
            }
            
            $stmt->closeCursor();
            $pdo = null;
        }

        function add($suggestion){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into suggestions (suggestion) values (:suggestion)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":suggestion",$suggestion);
            $status = $stmt->execute();

            $this->users[] = new Suggestion($suggestion);
            $stmt->closeCursor();
            $pdo = null;
            return $status;
        }

        function getSuggestions(){
            $display = [];
            foreach ($this->suggestions as $item){
                $display[] = $item->suggestion;
            }
            return $display;
            // return ($this->suggestions);
        }
    }
?>