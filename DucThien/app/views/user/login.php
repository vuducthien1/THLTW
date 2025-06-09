<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            font-family: 'Roboto', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            transition: background 0.5s ease;
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #2b2b2b, #4a4a4a);
            }

            .login-container {
                background: #333;
                color: #fff;
                box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
            }

            .login-container input {
                background: #444;
                border: 1px solid #555;
                color: #fff;
            }

            .login-container input::placeholder {
                color: #aaa;
            }

            .login-container h1 {
                color: #fff;
            }
        }

        .login-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        .login-container h1 {
            margin-bottom: 25px;
            color: #222;
            font-size: 24px;
            font-weight: 700;
        }

        .login-container label {
            display: block;
            text-align: left;
            margin: 15px 0 8px;
            font-weight: 500;
            color: #444;
        }

        .input-group {
            position: relative;
            margin-bottom: 15px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container input:focus {
            outline: none;
            border-color: #6e8efb;
            box-shadow: 0 0 8px rgba(110, 142, 251, 0.3);
        }

        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .login-container button {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
            padding: 14px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .login-container button:hover {
            background: linear-gradient(135deg, #5a75e3, #8e5cc7);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .login-container p {
            margin-top: 20px;
            font-size: 14px;
        }

        .login-container a {
            text-decoration: none;
            color: #6e8efb;
            font-weight: 500;
        }

        .login-container a:hover {
            color: #5a75e3;
            text-decoration: underline;
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 15px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 16px;
        }

        .back-home {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-home:hover {
            background: linear-gradient(135deg, #2980b9, #1e6b8b);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Responsive design */
        @media (max-width: 400px) {
            .login-container {
                padding: 20px;
                margin: 15px;
            }

            .login-container h1 {
                font-size: 20px;
            }

            .login-container button {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Đăng Nhập</h1>
        <?php if (!empty($error)) : ?>
            <p class="error-message"><i class="fas fa-exclamation-circle"></i><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="/DucThien/User/HandleLogin" method="POST">
            <div class="input-group">
                <label for="username">Tên đăng nhập:</label>
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="input-group">
                <label for="password">Mật khẩu:</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit">Đăng nhập</button>
        </form>
        <p><a href="/DucThien/User/Register">Đăng ký tài khoản mới</a></p>
        <a href="/DucThien/Product/" class="back-home">Quay lại trang chủ</a>
    </div>
    <!-- Font Awesome for icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>