<?php
    class Core {
        
        private $_connStatus = false;
        private $_connData;
        private $_error;
        
        public function __construct() {
            $conn = new MySQLi('localhost', 'root', '', 'shss');
            if ($conn->connect_errno) {
                throw new Exception($conn->connect_errno, 1);
            } else {
                $this->_connStatus = true;
                $this->_connData = $conn;
                mysqli_query($this->_connData, "SET NAMES UTF8");
            }
        }
        
        public function getConnectionStatus() {
            return $this->_connStatus;
        }
        
        public function getConnectionData() {
            return $this->_connData;
        }

        public function getErrorMessage() {
            return $this->_error;
        }

        public function registerUser($dataArray) {
            
        }

        public function logIn($dataArray) {
            if ($dataArray['username'] == NULL || $dataArray['password'] == NULL || $dataArray['secret_key'] == NULL) {
                $this->_error = "Всички полета трябва задължително да са попълнени!";
            }

            if (isset($this->_error)) {
                echo $this->getErrorMessage();
            } else {
                $query = $this->_connData->prepare("SELECT * FROM users WHERE username = ? AND password = ? AND secret_key = ?");
                $query->bind_param(
                    "sss",
                    $dataArray['username'],
                    $dataArray['password'],
                    $dataArray['secret_key']
                );
                $query->execute();
                $query->store_result();

                $num = $query->num_rows();
                if ($num != 0) {
                    $_SESSION['user'] = $username;
                    header("Location: main.php");
                } else {
                    echo "Грешно потребителско име, парола или секретен ключ!";
                }
            }
        }
        
        public function getCurrentUserInfo($field) {
            if (!isset($_SESSION['user'])) {
                return false;
            } else {
                $query = $this->_connData->query("SELECT * FROM users WHERE username = '" . $_SESSION['user'] . "'");
                $result = $query->fetch_assoc();
                return $result[$field];
            }
        }
        
        public function getUserInfo($username, $field) {
            $query = $this->_connData->query("SELECT * FROM users WHERE username = '" . $username . "'");
            if ($query == false) {
                return false;
            } else {
                $result = $query->fetch_assoc();
                return $result[$field];
            }
        }
        
        public function redirectIfSetSession() {
            if (isset($_SESSION['user'])) {
                header("Location: main.php");
            }
        }

        public function redirectIfNotSetSession() {
            if (!isset($_SESSION['user'])) {
                header("Location: index.php");
            }
        }
    }