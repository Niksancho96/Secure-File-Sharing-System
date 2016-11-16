<?php require('incl/header.php'); ?>
        <div id="wrap">
            <div id="header">
                <h1><a href="index.php">S.F.S.S.</a></h1>
                <h2 style="padding-top: 2px;">Secure File Sharing System</h2>
            </div>
            
            <div id="menu">
                <ul>
                    <li id="index-button"><a href="#">Начало</a></li>
                    <li id="news-button"><a href="#">Новини</a></li>
                    <li id="users-button"><a href="#">Потребители</a></li>
                    <li id="about-button"><a href="#">За нас</a></li>
                    <li id="search-bar">
                        <form method="post" action="">
                            <input id="search-input" type="text" name="searchbar" placeholder="Търси във файловете" />
                        </form>
                    </li>
                </ul>
            </div>
            
            <div id="content">
                <div class="right">
                    <div id="file-tables">
                        <h2 id="title">Последно качени файлове</h2>
                        <table>
                            <tr>
                                <th>Тип</th>
                                <th>Име</th>
                                <th>Описание</th>
                                <th>Сваляне</th>
                            </tr>
                            <?php
                                $query = $db->getConnectionData()->query("SELECT * FROM files ORDER BY id DESC LIMIT 5");
                                while ($result = $query->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><img src="<?= $result['icon_path']; ?>" alt="file-type" /></td>
                                <td><?= $result['name']; ?></td>
                                <td>
                                    <p><?= $result['description']; ?></p>
                                    <p style="margin-top: 5px;">Качено от: <?= $result['uploader']; ?>&nbsp;&nbsp;&nbsp;Дата: <?= $result['date']; ?></p>
                                </td>
                                <td>
                                    <a href="#"><img src="img/download.png" alt="download" /></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div id="news">
                        <h2 id="title">Последни публикации</h2>
                        <?php
                            $query = $db->getConnectionData()->query("SELECT * FROM news ORDER BY id DESC LIMIT 5");
                            while ($data = $query->fetch_assoc()) {
                        ?>
                            <div id="news-section">
                                <h2><?= $data['topic']; ?></h2>
                                <h5>Публикувано от <?= $data['by']; ?>&nbsp;&nbsp;&nbsp;Дата <?= $data['date']; ?></h5>
                                <p>
                                    <?= $data['text']; ?>
                                </p>
                            </div>
                            <hr id="separator" />
                        <?php } ?>
                    </div>
                    <div id="users">
                        <h2 id="title">Регистрирани потребители</h2>
                        <?php
                            $query = $db->getConnectionData()->query("SELECT * FROM users ORDER BY id DESC LIMIT 20");
                            while ($data = $query->fetch_assoc()) {
                        ?>
                        <div id="user-container">
                            <p>
                                <img src="<?= $data['avatar_source']; ?>" alt="user-avatar" /> - <?= $data['first_name']; ?> <?= $data['last_name']; ?>
                            </p>
                        </div>
                        <?php } ?>
                    </div>
                    <div id="about">
                        <h2 id="title">Кои сме ние и с какво се занимаваме?</h2>
                        <h4>Публикувано от Разработчиците</h4>
                        <p>Ние сме ученици от 12 клас на ПМГ "Академик Иван Ценов" гр. Враца занимаващи се с програмиране, тъй като сме с такъв профил. Системата е създадена с цел, потребители лесно да споделят файлове помежду си, когато имат нужда от по-висока защита. Тази система не е предназначена само за училища, може да се използва в други институции, тъй като предлага гъвкавостта и защитата на съвременна система за споделяне на файлове.</p>
                    </div>
                    <div id="profile-dialog" title="Потребителски профил">
                        <?php
                            if ($db->getCurrentUserInfo('role') == 'admin') {
                                ?>
                                    <form method="post" action="">
                                        <fieldset id="new-post-fieldset">
                                            <legend>Нова публикация</legend>
                                            <label>Тема</label>
                                            <input id="topic" type="text" name="topic" />
                                            <br />
                                            <label>Текст</label>
                                            <textarea name="text"></textarea>
                                            <input type="submit" name="post" value="Запази" />
                                        </fieldset>
                                    </form>
                                <?php
                            }
                            
                            if (isset($_POST['post'])) {
                                $topic = $_POST['topic'];
                                $text = $_POST['text'];
                                $date = date("Y-m-d");
                                $query = $db->getConnectionData()->prepare("INSERT INTO `news`(`id`, `by`, `topic`, `text`, `date`) VALUES (NULL, ?, ?, ?, ?)");
                                $query->bind_param("ssss", $_SESSION['user'], $topic, $text, $date);
                                $query->execute();
                            }
                        ?>
                        <h3>Качени от мен файлове</h3>
                        <table id="user-uploaded-files">
                            <tr>
                                <th>#</th>
                                <th>Тип</th>
                                <th>Име</th>
                                <th>Описание</th>
                                <th>Качено</th>
                            </tr>
                            <?php
                                $query = $db->getConnectionData()->query("SELECT * FROM files WHERE uploader = '" . $_SESSION['user'] . "' ORDER BY date DESC");
                                $num = $query->num_rows;
                                if ($num == 0) {
                                    echo "Все още не сте качили никакви файлове!";
                                } else {
                                    while ($data = $query->fetch_assoc()) {
                                    ?>
                                        <tr>
                                            <td><?= $data['id']; ?></td>
                                            <td><img src="<?= $data['icon_path']; ?>" alt="icon-path" /></td>
                                            <td><?= $data['name']; ?>.<?= $data['type']; ?></td>
                                            <td><?= $data['description']; ?></td>
                                            <td><?= $data['date']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                            ?>
                        </table>
                        
                        <h3>Лични съобщения</h3>
                        <table id="pm-table">
                            <tr>
                                <th>От</th>
                                <th>Тема</th>
                                <th>Съдържание</th>
                                <th>Дата</th>
                                <th>Прочетено</th>
                            </tr>
                            <?php
                                $query = $db->getConnectionData()->query("SELECT * FROM messages WHERE reciever = '" . $_SESSION['user'] . "' ORDER BY date DESC");
                                $num = $query->num_rows;
                                if ($num == 0) {
                                    echo "Все още нямате лични съобщения!";
                                } else {
                                    while ($data = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $data['sender']; ?></td>
                                    <td><?= $data['topic']; ?></td>
                                    <td><?= $data['text']; ?></td>
                                    <td><?= $data['date']; ?></td>
                                    <td><?= $data['viewed']; ?></td>
                                </tr>
                            <?php   }
                                }
                            ?>
                        </table>
                    </div>
                    <div id="upload-file-dialog" title="Качване на файл">
                        <fieldset id="upload-fieldset">
                            <legend>Моля попълнете всички полета</legend>
                            <form method="post" enctype="multipart/form-data">
                                <div>Описание на файла</div>
                                <textarea name="description"></textarea>
                                <div>Път до файла</div>
                                <input type="file" name="upload_file" />
                                <input type="submit" name="upload" value="Качи" />
                            </form>
                        </fieldset>
                    </div>
                    <div id="settings-dialog" title="Настройки">
                        <fieldset>
                            <legend>Редакция на лични данни</legend>
                            <form method="post" action="">
                                <label>Парола:</label>
                                <input type="password" name="new_password" autocomplete="off" />
                                <label>Парола отново:</label>
                                <input type="password" name="new_password_repeat" autocomplete="off" />
                                <br />
                                <label>Email:</label>
                                <input id="email-input" type="email" name="new_email" autocomplete="off" />
                                <input type="submit" name="change" value="Запамети" />
                            </form>
                        </fieldset>
                    </div>
                </div>
                <div class="left">
                    <h2>Панел</h2>
                    <ul>
                        <li><img src="<?php echo $db->getCurrentUserInfo("avatar_source"); ?>" alt="avatar" /></li>
                        <li><a id="profile-dialog-button" href="#">Профил</a></li> 
                        <li><a id="upload-file-button" href="#">Качи файл</a></li> 
                        <li><a id="settings-dialog-button" href="#">Настройки</a></li> 
                        <li><a href="logout.php">Изход</a></li>
                    </ul>
                    <hr />
                    <h2>Лични съобщения</h2>
                    <ul>
                        <?php
                            $query = $db->getConnectionData()->query("SELECT * FROM messages WHERE reciever = '" . $_SESSION['user'] . "' LIMIT 3");
                            $num = $query->num_rows;
                            if ($num == 0) {
                                echo "Нямате лични съобщения!";
                            } else {
                                while ($result = $query->fetch_assoc()) {
                        ?>
                                <li>
                                    <?= $result['topic']; ?>
                                </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div style="clear: both;"></div>
            </div>
<?php require('incl/footer.php'); ?>