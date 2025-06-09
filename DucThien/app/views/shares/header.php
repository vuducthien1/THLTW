<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Quản lý sản phẩm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
            min-height: 100vh;
            transition: background 0.5s ease;
        }

        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #2b2b2b, #4a4a4a);
            }

            .navbar {
                background-color: rgba(40, 40, 40, 0.9) !important;
            }

            .navbar-brand, .nav-link, .user-dropdown {
                color: #fff !important;
            }

            .card, .ad-text {
                background: #333;
                color: #fff;
                border: 1px solid #444;
            }

            .search-input {
                background: #444;
                color: #fff;
                border-color: #555;
            }

            .search-input::placeholder {
                color: #aaa;
            }
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: #2c3e50 !important;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #3498db !important;
        }

        .btn-nav-group .btn {
            margin-right: 0.5rem;
            border-radius: 50px;
            font-weight: 500;
            padding: 0.6rem 1.8rem;
            transition: all 0.3s ease;
            color: #34495e;
            background-color: transparent;
            border: 2px solid transparent;
        }

        .btn-nav-group .btn:hover {
            color: #3498db;
            background-color: rgba(52, 152, 219, 0.1);
            border-color: #3498db;
            transform: translateY(-2px);
        }

        .btn-nav-group .btn.active {
            color: #fff;
            background-color: #3498db;
            border-color: #2980b9;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }

        .btn-custom {
            background: linear-gradient(135deg, #3498db, #2980b9);
            color: white;
            border-radius: 50px;
            padding: 0.6rem 1.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: linear-gradient(135deg, #2980b9, #1e6b8b);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid #3498db;
        }

        .user-dropdown {
            background-color: transparent !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 8px 12px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .user-dropdown:hover {
            background-color: rgba(52, 152, 219, 0.1) !important;
            color: #3498db !important;
            text-decoration: none;
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            min-width: 240px;
        }

        .dropdown-item:hover {
            background-color: #f0f4f8;
            color: #3498db;
        }

        /* Search Bar */
        .search-bar {
            width: 300px;
            margin-right: 1.5rem;
        }

        .search-input {
            border-radius: 25px;
            padding-left: 40px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: 1px solid #ddd;
        }

        .search-input:focus {
            border-color: #3498db;
            box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
        }

        .search-button {
            border-radius: 25px;
            background: #3498db;
            color: white;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background: #2980b9;
        }

        .search-clear {
            color: #e74c3c;
            font-size: 1.3rem;
            margin-left: 8px;
            text-decoration: none;
        }

        .search-clear:hover {
            color: #c0392b;
        }

        .input-group-prepend i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        /* Text-based Advertisements */
        .ad-text {
            background: #fff;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 0.95rem;
            font-weight: 500;
            color: #2c3e50;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .ad-text:hover {
            transform: translateY(-5px);
        }

        .ad-text a {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
        }

        .ad-text a:hover {
            color: #2980b9;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .search-bar {
                width: 100%;
                margin-bottom: 1rem;
            }

            .ad-text {
                font-size: 0.9rem;
                padding: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="/DucThien/Product/">
                <i class="fas fa-box-open mr-2"></i>SHOP SELL
            </a>
            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user'): ?>
            <form class="form-inline d-none d-lg-flex" action="/DucThien/Product/search" method="GET">
                <div class="input-group search-bar">
                    <div class="input-group-prepend">
                        <i class="fas fa-search"></i>
                    </div>
                    <input class="form-control search-input" type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..."
                           value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
                    <?php if (!empty($_GET['keyword'])): ?>
                    <div class="input-group-append">
                        <a href="/DucThien/Product/" class="btn btn-outline-danger search-clear" title="Xóa tìm kiếm">×</a>
                    </div>
                    <?php endif; ?>
                    <div class="input-group-append">
                        <button class="btn btn-primary search-button" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="btn-nav-group navbar-nav mr-auto">
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a href="/DucThien/Product/" class="btn active" id="btn-list">
                            <i class="fas fa-list-ul mr-1"></i> Danh sách sản phẩm
                        </a>
                        <a href="/DucThien/Product/add" class="btn" id="btn-add">
                            <i class="fas fa-plus-circle mr-1"></i> Thêm sản phẩm
                        </a>
                        <a href="/DucThien/Category/list" class="btn" id="btn-category">
                            <i class="fas fa-tags mr-1"></i> Danh mục
                        </a>
                    <?php endif; ?>
                </div>
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link cart-icon" href="/DucThien/Product/Cart">
                            <i class="fas fa-shopping-cart fa-lg"></i>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <?php
                        $avatarPath = $_SESSION['user']['avatar'] ?? '';
                        $avatarFile = $_SERVER['DOCUMENT_ROOT'] . '/DucThien/' . $avatarPath;
                        if (!empty($avatarPath) && file_exists($avatarFile)) {
                            $avatarUrl = '/DucThien/' . $avatarPath;
                        } else {
                            $avatarUrl = '/DucThien/images/no-image.jpg';
                        }
                        ?>
                        <li class="nav-item dropdown ml-2">
                            <a 
                                href="#" 
                                class="dropdown-toggle d-flex align-items-center user-dropdown" 
                                id="userDropdown" 
                                role="button" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false">
                                <img 
                                    src="<?php echo htmlspecialchars($avatarUrl); ?>" 
                                    alt="Avatar" 
                                    class="avatar">
                                <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow border-0" aria-labelledby="userDropdown">
                                <div class="dropdown-item-text font-weight-bold text-dark text-truncate">
                                    <?php echo htmlspecialchars($_SESSION['user']['fullname'] ?? ''); ?>
                                </div>
                                <div class="dropdown-item-text text-muted small mb-2">
                                    <?php echo htmlspecialchars($_SESSION['user']['email'] ?? ''); ?>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/DucThien/User/EditProfile">
                                    <i class="fas fa-user-cog mr-2"></i> Chỉnh sửa hồ sơ
                                </a>
                                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                                    <a class="dropdown-item" href="/DucThien/AdminUser/list">
                                        <i class="fas fa-users-cog mr-2"></i> Quản lý người dùng
                                    </a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="/DucThien/User/logout">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ml-2">
                            <a href="/DucThien/User/Login" class="btn btn-custom">
                                <i class="fas fa-sign-in-alt mr-1"></i> Đăng nhập
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Text-based Advertisement (Top) -->
        <div class="ad-text">
            <p>🔥 Ưu đãi đặc biệt: <a href="#">Giảm 20% cho đơn hàng đầu tiên!</a> Nhanh tay mua sắm ngay hôm nay!</p>
        </div>

        <!-- Main Content -->
        <div class="card p-4">
            <h2>Nội dung chính</h2>
            <p>Đây là nơi hiển thị danh sách sản phẩm hoặc nội dung quản lý chính.</p>
        </div>

        <!-- Text-based Advertisement (Bottom) -->
        <div class="ad-text mt-4">
            <p>✨ Khám phá bộ sưu tập mới nhất: <a href="#">Sản phẩm hot trend 2025!</a> Đừng bỏ lỡ!</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
            document.querySelectorAll('.btn-nav-group .btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    document.querySelectorAll('.btn-nav-group .btn').forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            const url = window.location.pathname.toLowerCase();
            $('.btn-nav-group .btn').forEach(btn => {
                const href = btn.getAttribute('href').toLowerCase();
                if (url.startsWith(href)) {
                    document.querySelectorAll('.btn-nav-group .btn').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>