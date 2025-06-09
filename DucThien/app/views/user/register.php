<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký Tài Khoản</title>
    <style>
        body {
            background: #f0f2f5;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .register-container h1 {
            margin-bottom: 20px;
            color: #333;
        }

        .register-container label {
            display: block;
            text-align: left;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .register-container input[type="text"],
        .register-container input[type="password"],
        .register-container input[type="email"],
        .register-container input[type="file"],
        .register-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .register-container button {
            background: #007BFF;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background 0.3s ease;
            margin-top: 15px;
        }

        .register-container button:hover {
            background: #0056b3;
        }

        .register-container p {
            margin-top: 15px;
        }

        .register-container a {
            text-decoration: none;
            color: #007BFF;
        }

        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Đăng Ký Tài Khoản</h1>
        <form action="/DucThien/User/HandleRegister" method="POST" enctype="multipart/form-data">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>

            <label for="fullname">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>

            <label for="avatar">Ảnh đại diện:</label>
            <input type="file" id="avatar" name="avatar">

            <button type="submit">Đăng Ký</button>
        </form>
        <p><a href="/DucThien/User/Login">Quay lại đăng nhập</a></p>
    </div>
</body>
</html>
