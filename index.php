<?php session_start(); ob_start(); require('core/Database.php'); if (isset($_SESSION['user'])) { header("Location: main.php"); } ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure File Sharing System</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/application.js"></script>
        <style type="text/css">
            #main-holder {
                width: 550px;
                margin: 0 auto;
                padding-top: 50px;
            }
            
            #main-holder fieldset {
                width: 500px;
                height: auto;
                padding: 5px 10px 5px 10px;
            }
            
            #key {
                margin-top: 5px;
                margin-right: 27px;
            }
            
            #key-input {
                margin-top: 5px;
            }
            
            #button {
                float: right;
                margin-top: 5px;
                margin-right: 27px;
            }
        </style>
    </head>
    <body>
        <div id="main-holder">
            <form method="post" action="">
                <fieldset>
                    <legend>Вход в системата на SHSS:</legend>
                    <label>Потребителско име: </label>
                    <input type="text" name="username" autocomplete="off" />
                    <label>Парола: </label>
                    <input type="password" name="password" autocomplete="off" />
                    <label id="key">Секретен ключ: </label>
                    <input id="key-input" type="password" name="secret_key" autocomplete="off" />
                    <input id="button" type="submit" name="login" value="Вход" />
                </fieldset>
            </form>
            <?php
                $db = new Database();
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    $secret_key = md5($_POST['secret_key']);
                    
                    if (empty($username) || empty($password) || empty($secret_key)) {
                        $error = "Всички полета трябва задължително да са попълнени!";
                    }
                    
                    if (!isset($error)) {
                        $db->logIn($username, $password, $secret_key);
                    } else {
                        echo $error;
                    }
                }
            ?>
        </div>
    </body>
</html>
