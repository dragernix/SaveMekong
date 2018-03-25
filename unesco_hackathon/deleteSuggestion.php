<?php
    require_once "SuggestionDAO.php";
    $suggestion = $_GET["delete"];
    $dao = new SuggestionDAO();
    $status = $dao->delete($suggestion);
    
    header('location: suggestions.php');
?>