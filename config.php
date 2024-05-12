<?php

class Query
{
    private $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "AdminPanel";
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection error: " . $this->conn->connect_error);
        }
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    // validate(): here converts @#$%^ characters to html
    function validate($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $value = mysqli_real_escape_string($this->conn, $value);
        return $value;
    }

    // executeQuery(): to execute the query
    public function executeQuery($sql)
    {
        $result = $this->conn->query($sql);
        if ($result === false) {
            die("Error: " . $this->conn->error);
        }
        return $result;
    }

    // select(): To add information to the database.
    public function select($table, $columns = "*", $condition = "")
    {
        $sql = "SELECT $columns FROM $table $condition";
        return $this->executeQuery($sql)->fetch_all(MYSQLI_ASSOC);
    }

    // insert(): To add information to the database.
    public function insert($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $sql = "INSERT INTO $table ($keys) VALUES ($values)";
        return $this->executeQuery($sql);
    }

    // update(): To update data in the database.
    public function update($table, $data, $condition = "")
    {
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "$key = '$value', ";
        }
        $set = rtrim($set, ', ');
        $sql = "UPDATE $table SET $set $condition";
        return $this->executeQuery($sql);
    }

    // delete(): To delete information.
    public function delete($table, $condition = "")
    {
        $sql = "DELETE FROM $table $condition";
        return $this->executeQuery($sql);
    }

    // hashPassword(): Password hashing
    function hashPassword($password)
    {
        $key = "AccountPassword";
        return hash_hmac('sha256', $password, $key);
    }

    // authenticate(): To verify the user's login information.
    public function authenticate($username, $password, $table)
    {
        $username = $this->validate($username);
        $condition = "WHERE username = '" . $username . "' AND password = '" . $this->hashPassword($password) . "'";
        return $this->select($table, "*", $condition);
    }

    // registerUser(): To register a new user.
    public function registerUser($name, $email, $username, $password, $role)
    {
        $name = $this->validate($name);
        $email = $this->validate($email);
        $username = $this->validate($username);

        $password_hash = $this->hashPassword($password);

        $data = array(
            'name' => $name,
            'email' => $email,
            'username' => $username,
            'password' => $password_hash,
            'role' => $role
        );

        $user_id = $this->insert('users', $data);

        if ($user_id) {
            return $user_id;
        }
        return false;
    }

    // checkAuthentication(): Checking roles and directing them
    function checkAuthentication()
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            if ($_SESSION['role'] === 'admin') {
                header("Location: /admin/");
                exit;
            } elseif ($_SESSION['role'] === 'user') {
                header("Location: /");
                exit;
            }
        } else {
            header("Location: /login/");
            exit;
        }
    }

    // checkAdminRole(): For Admin access only
    function checkAdminRole()
    {
        if ($_SESSION['role'] !== 'admin') {
            $this->checkAuthentication();
            exit;
        }
    }

    // checkUserRole(): For user access only
    function checkUserRole()
    {
        if ($_SESSION['role'] !== 'user') {
            $this->checkAuthentication();
            exit;
        }
    }

    // delete messege
    public function deleteMessage($message_id)
    {
        $message_id = $this->validate($message_id);
        $condition = "WHERE id = $message_id";
        return $this->delete('messages', $condition);
    }

    // get all message
    public function getAllMessages()
    {
        return $this->select('messages', '*', "ORDER BY created_at DESC");
    }

    // Send message
    public function sendMessage($sender_name, $username, $message_text)
    {
        $sender_name = $this->validate($sender_name);
        $username = $this->validate($username);
        $message_text = $this->validate($message_text);

        $data = array(
            'sender_name' => $sender_name,
            'username' => $username,
            'message_text' => $message_text
        );

        return $this->insert('messages', $data);
    }
}


$query = new Query;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['message_text'])) {
    $sender_name = 'Admin';
    $username = $_POST['username'];
    $message_text = $_POST['message_text'];
    $query->sendMessage($sender_name, $username, $message_text);
    header("Location: messages.php");
    exit;
}
?>