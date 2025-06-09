<?php
require_once 'app/models/UserModel.php';

class AdminUserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Kiểm tra quyền Admin
    private function checkAdmin()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            header('Location: /DucThien/Product/index');
            exit();
        }
    }

    // 1. Hiển thị danh sách người dùng
    public function index()
    {
        $this->checkAdmin();

        $users = $this->userModel->getAllUsers();
        include 'app/views/admin/user/list.php';
    }

    // Alias cho action list để tránh lỗi Action not found
    public function list()
    {
        $this->index();
    }

    // 2. Hiển thị form thêm người dùng
    public function create()
    {
        $this->checkAdmin();

        include 'app/views/admin/user/add.php';
    }

    // 3. Xử lý thêm người dùng
    public function store()
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'] ?? 'user';
            $avatar = '';

            // Xử lý avatar upload
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
                $uploadDir = 'uploads/';
                $avatar = $uploadDir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            }

            $this->userModel->addUser($username, $fullname, $password, $email, $phone, $avatar, $role);
            header('Location: /DucThien/AdminUser/index');
            exit();
        }
    }

    // 4. Hiển thị form chỉnh sửa người dùng
    public function edit($id)
    {
        $this->checkAdmin();

        $user = $this->userModel->getUserById($id);
        if (!$user) {
            // Nếu không tìm thấy user thì có thể redirect hoặc show thông báo lỗi
            die("Người dùng không tồn tại!");
        }
        include 'app/views/admin/user/edit.php';
    }

    // 5. Xử lý cập nhật người dùng
    public function update($id)
    {
        $this->checkAdmin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? 'user';
            $avatar = $_POST['current_avatar'] ?? '';

            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
                $uploadDir = 'uploads/';
                $avatar = $uploadDir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            }

            $this->userModel->updateUser($id, $fullname, $email, $phone, $avatar, $role);
            header('Location: /DucThien/AdminUser/index');
            exit();
        }
    }

    // 6. Xử lý xóa người dùng
    public function delete($id)
    {
        $this->checkAdmin();

        $this->userModel->deleteUser($id);
        header('Location: /DucThien/AdminUser/index');
        exit();
    }
}
?>
