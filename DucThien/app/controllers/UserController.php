<?php
require_once 'app/models/UserModel.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Hiển thị trang đăng nhập
    public function Login()
    {
        include 'app/views/user/login.php';
    }

    // Xử lý đăng nhập
    public function HandleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /DucThien/');
                exit();
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                include 'app/views/user/login.php';
            }
        }
    }

    // Hiển thị trang đăng ký
    public function Register()
    {
        include 'app/views/user/register.php';
    }

    // Xử lý đăng ký
    public function HandleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'user';
            $avatar = '';

            // Xử lý upload avatar
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $uploadDir = 'uploads/';
                $avatar = $uploadDir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            }

            // Mã hóa mật khẩu
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Thêm user
            $this->userModel->addUser($username, $fullname, $hashedPassword, $email, $phone, $avatar, $role);

            header('Location: /DucThien/User/Login');
            exit();
        }
    }

    // Hiển thị trang chỉnh sửa hồ sơ
    public function EditProfile()
    {
        $user = $_SESSION['user'] ?? null;
        if (!$user) {
            header('Location: /DucThien/User/Login');
            exit();
        }

        include 'app/views/user/edit.php';
    }

    // Xử lý chỉnh sửa hồ sơ
    public function HandleEditProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $id = $_SESSION['user']['id'];
            $fullname = $_POST['fullname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? $_SESSION['user']['role'];
            $avatar = $_SESSION['user']['avatar'];

            // Xử lý upload avatar mới (nếu có)
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
                $uploadDir = 'uploads/';
                $avatar = $uploadDir . basename($_FILES['avatar']['name']);
                move_uploaded_file($_FILES['avatar']['tmp_name'], $avatar);
            }

            $this->userModel->updateUser($id, $fullname, $email, $phone, $avatar, $role);

            // Refresh session
            $_SESSION['user'] = $this->userModel->getUserById($id);
            header('Location: /DucThien/');
            exit();
        }
    }

    // Xử lý đăng xuất và chuyển về trang chính
    public function Logout()
    {
        session_destroy();
        header('Location: /DucThien/'); // Chuyển về trang chính
        exit();
    }
}
?>
