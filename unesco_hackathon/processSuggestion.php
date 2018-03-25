<?php
    require_once "SuggestionDAO.php";
    $suggestion = $_GET["suggest"];
    $dao = new SuggestionDAO();
    $status = $dao->add($suggestion);
    if($status){
        echo "Successful";
    }
    else{
        echo "Failed";
    }
    header('location: suggestions.php');
?>