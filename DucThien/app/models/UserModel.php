<?php
require_once 'app/config/database.php';

class UserModel
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    // Lấy thông tin user theo username
    public function getUserByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers()
{
    $stmt = $this->conn->prepare("SELECT * FROM account");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function deleteUser($id)
{
    $stmt = $this->conn->prepare("DELETE FROM account WHERE id = ?");
    $stmt->execute([$id]);
}


    // Lấy thông tin user theo ID
    public function getUserById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm user mới
    public function addUser($username, $fullname, $password, $email, $phone, $avatar, $role)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO account (username, fullname, password, email, phone, avatar, role)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$username, $fullname, $password, $email, $phone, $avatar, $role]);
    }

    // Cập nhật user
    public function updateUser($id, $fullname, $email, $phone, $avatar, $role)
    {
        $stmt = $this->conn->prepare("
            UPDATE account
            SET fullname = ?, email = ?, phone = ?, avatar = ?, role = ?
            WHERE id = ?
        ");
        return $stmt->execute([$fullname, $email, $phone, $avatar, $role, $id]);
    }
}
?>
