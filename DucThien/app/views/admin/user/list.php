<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }

        .container {
            margin-top: 30px;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #2c3e50;
        }

        .table thead th {
            background-color: #3498db;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }

        .btn-add, .btn-home {
            margin-bottom: 15px;
        }

        .avatar-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .btn-action {
            margin: 0 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-users"></i> Danh sách người dùng</h2>
        <a href="/DucThien/Product/index" class="btn btn-secondary btn-home">
            <i class="fas fa-home"></i> Trở về trang chủ
        </a>
        <a href="/DucThien/AdminUser/create" class="btn btn-success btn-add">
            <i class="fas fa-user-plus"></i> Thêm người dùng mới
        </a>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Điện thoại</th>
                    <th>Quyền</th>
                    <th>Ảnh đại diện</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td>
                        <span class="badge badge-<?php echo ($user['role'] === 'admin') ? 'danger' : 'secondary'; ?>">
                            <?php echo htmlspecialchars($user['role']); ?>
                        </span>
                    </td>
                    <td>
                        <?php
                        $avatarPath = $user['avatar'] ?? '';
                        $avatarFile = $_SERVER['DOCUMENT_ROOT'] . '/DucThien/' . $avatarPath;
                        if (!empty($avatarPath) && file_exists($avatarFile)) {
                            $avatarUrl = '/DucThien/' . $avatarPath;
                        } else {
                            $avatarUrl = '/DucThien/images/no-image.png';
                        }
                        ?>
                        <img src="<?php echo htmlspecialchars($avatarUrl); ?>" alt="Avatar" class="avatar-img">
                    </td>
                    <td>
                        <a href="/DucThien/AdminUser/edit/<?php echo $user['id']; ?>" class="btn btn-primary btn-sm btn-action">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <?php if ($user['role'] !== 'admin'): ?>
                        <a href="/DucThien/AdminUser/delete/<?php echo $user['id']; ?>" class="btn btn-danger btn-sm btn-action" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- FontAwesome & Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
