<?php
    session_start(); ob_start();
    require('core/Database.php');
    $db = new Core(); $db->redirectIfSetSession();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure File Sharing System</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/application.js"></script>
        <style type="text/css">
            body {
                font-family: "Times New Roman", Times, serif;
                font-style: normal;
                font-size: 17px;
            }

            footer {
                text-align: center;
                margin-top: 10px;
            }

            #main-holder {
                width: 550px;
                margin: 0 auto;
                padding-top: 50px;
            }

            #main-holder fieldset {
                margin-top: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 20px;
            }

            #main-holder label, input {
                margin-top: 5px;
            }

            #button {
                float: right;
                margin-top: 5px;
                margin-right: 53px;
            }

            #key-input {
                margin-left: 31px;
            }

            #pass-label {

            }

            #email-input {
                margin-left: 12px;
                margin-right: 20px;
            }

            #second-pass {
                margin-left: 33px;
            }

            #name-input {
                margin-left: 110px;
            }

            #family-label {
                margin-right: 17px;
            }
        </style>
    </head>
    <body>
        <div id="main-holder">
            <form method="post" action="">
                <fieldset>
                    <legend>Вход в системата на SFSS:</legend>
                    <label>Потребителско име: </label>
                    <input type="text" name="username" autocomplete="off" />

                    <label>Парола: </label>
                    <input type="password" name="password" autocomplete="off" />

                    <label>Секретен ключ: </label>
                    <input id="key-input" type="password" name="secret_key" autocomplete="off" />

                    <input id="button" type="submit" name="login" value="Вход" />
                </fieldset>
            </form>
            <?php
                if (isset($_POST['login'])) {
                    $logInData = array(
                        'username' => $_POST['username'],
                        'password' => md5($_POST['password']),
                        'secret_key' => md5($_POST['secret_key'])
                    );

                    $db->logIn($logInData);
                }
            ?>

            <form method="post" action="">
                <fieldset id="second_fieldset">
                    <legend>Регистрация на нов потребител в SFSS:</legend>
                    <label>Потребителско име: </label>
                    <input type="text" name="reg_user" autocomplete="off" />

                    <label id="pass-label">Парола: </label>
                    <input type="password" name="reg_pass" autocomplete="off" />

                    <label>Отново парола: </label>
                    <input id="second-pass" type="password" name="reg_pass_repeat" autocomplete="off" />

                    <label>Email: </label>
                    <input id="email-input" type="email" name="reg_email" autocomplete="off" />

                    <label>Име: </label>
                    <input id="name-input" type="text" name="reg_name" autocomplete="off" />

                    <label id="family-label">Фам.: </label>
                    <input type="text" name="reg_family" autocomplete="off" />

                    <input id="button" type="submit" name="register" value="Изпращане" />
                </fieldset>
            </form>
            <?php
                if (isset($_POST['register'])) {
                    $sentData = array(
                        'username' => $_POST['reg_user'],
                        'password' => $_POST['reg_pass'],
                        'repeat_password' => $_POST['reg_pass_repeat'],
                        'email' => $_POST['reg_email'],
                        'first_name' => $_POST['reg_name'],
                        'last_name' => $_POST['reg_family'],
                        'role' => 'user',
                        'avatar_source' => 'NULL'
                        );

                    $db->registerUser($sentData);
                }
            ?>
        </div>
        <footer>
            Secure File Sharing System 2016 &copy;
        </footer>
    </body>
</html>
