<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa hồ sơ cá nhân</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 30px;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa hồ sơ cá nhân</h2>
        <form action="/DucThien/User/HandleEditProfile" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Username (Không chỉnh sửa)</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['username']); ?>" readonly>
            </div>
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="fullname" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['fullname']); ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>" required>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($_SESSION['user']['phone']); ?>">
            </div>
            <div class="form-group">
                <label>Ảnh đại diện hiện tại</label><br>
                <?php
                $avatarPath = $_SESSION['user']['avatar'] ?? '';
                $avatarFile = $_SERVER['DOCUMENT_ROOT'] . '/DucThien/' . $avatarPath;
                if (!empty($avatarPath) && file_exists($avatarFile)) {
                    $avatarUrl = '/DucThien/' . $avatarPath;
                } else {
                    $avatarUrl = '/DucThien/images/no-image.png';
                }
                ?>
                <img src="<?php echo htmlspecialchars($avatarUrl); ?>" width="80" class="mb-2">
                <input type="hidden" name="current_avatar" value="<?php echo htmlspecialchars($_SESSION['user']['avatar']); ?>">
            </div>
            <div class="form-group">
                <label>Thay đổi ảnh đại diện</label>
                <input type="file" name="avatar" class="form-control-file">
            </div>
            <!-- Giữ nguyên role bằng hidden -->
            <input type="hidden" name="role" value="<?php echo htmlspecialchars($_SESSION['user']['role']); ?>">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="/DucThien/Product/index" class="btn btn-secondary">Trở về trang chủ</a>
        </form>
    </div>
</body>
</html>
