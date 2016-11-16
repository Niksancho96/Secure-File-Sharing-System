<?php
    session_start(); ob_start(); 
    require('core/Database.php'); 
    $db = new Core(); $db->redirectIfNotSetSession();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Niko Mitov">
        <meta name="description" content="Secure file sharing and storage system">
        <title>Secure File Sharing System</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script src="js/application.js"></script>
        <script>
            
        </script>
    </head>
    <body>