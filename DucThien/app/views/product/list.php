<?php include 'app/views/shares/header.php'; ?>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
        transition: background 0.5s ease;
    }

    /* Dark mode */
    @media (prefers-color-scheme: dark) {
        body {
            background: linear-gradient(135deg, #2b2b2b, #4a4a4a);
        }

        .card {
            background: #333;
            color: #fff;
            border: 1px solid #444;
        }

        .card-footer {
            background: #333 !important;
        }

        .card-title a {
            color: #3498db;
        }

        .card-text {
            color: #ddd;
        }

        .header-row h1 {
            color: #fff;
        }
    }

    .container {
        padding: 2rem 1rem;
    }

    .header-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .header-row h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
    }

    .btn-add-product {
        background: linear-gradient(135deg, #28a745, #218838);
        color: white;
        border-radius: 25px;
        padding: 10px 25px;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 128, 0, 0.3);
        transition: all 0.3s ease;
    }

    .btn-add-product:hover {
        background: linear-gradient(135deg, #218838, #1c7430);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 128, 0, 0.4);
        color: white;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        background: #fff;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
    }

    .card-title a {
        color: #2c3e50;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .card-title a:hover {
        color: #3498db;
    }

    .card-text {
        font-size: 0.95rem;
        color: #7f8c8d;
        margin-bottom: 0.75rem;
    }

    .card-text.price {
        font-size: 1.1rem;
        font-weight: 600;
        color: #e74c3c;
        background: #ffecec;
        padding: 5px 10px;
        border-radius: 8px;
        display: inline-block;
    }

    .card-text.category {
        font-size: 0.9rem;
        color: #3498db;
        font-weight: 500;
    }

    .card-footer {
        background: #fff;
        border-top: none;
        padding: 1rem 1.5rem;
    }

    .card-footer .d-flex {
        gap: 10px;
        flex-wrap: wrap;
    }

    .card-footer .btn {
        border-radius: 12px;
        font-size: 0.9rem;
        padding: 8px 15px;
        transition: all 0.3s ease;
    }

    .card-footer .btn-warning {
        background: linear-gradient(135deg, #f1c40f, #e67e22);
        border: none;
        color: white;
    }

    .card-footer .btn-warning:hover {
        background: linear-gradient(135deg, #e67e22, #d35400);
        transform: translateY(-2px);
    }

    .card-footer .btn-danger {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        border: none;
        color: white;
    }

    .card-footer .btn-danger:hover {
        background: linear-gradient(135deg, #c0392b, #a93226);
        transform: translateY(-2px);
    }

    .card-footer .btn-primary {
        background: linear-gradient(135deg, #3498db, #2980b9);
        border: none;
        flex: 1;
    }

    .card-footer .btn-primary:hover {
        background: linear-gradient(135deg, #2980b9, #1e6b8b);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-img-top {
            height: 180px;
        }

        .card-title {
            font-size: 1.1rem;
        }

        .card-text {
            font-size: 0.9rem;
        }

        .card-footer .btn {
            font-size: 0.85rem;
            padding: 6px 12px;
        }

        .header-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-add-product {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 576px) {
        .card-footer .d-flex {
            flex-direction: column;
            gap: 8px;
        }

        .card-footer .btn {
            width: 100%;
        }
    }
</style>

<div class="container">
    <div class="header-row">
        <h1>Danh sách sản phẩm</h1>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="/DucThien/Product/add" class="btn btn-success btn-add-product">Thêm sản phẩm mới</a>
        <?php endif; ?>
    </div>
    
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <?php if ($product->image): ?>
                <img src="/DucThien/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" class="card-img-top" alt="Product Image">
                <?php else: ?>
                <img src="/DucThien/images/no-image.jpg" class="card-img-top" alt="No Image">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/DucThien/Product/show/<?php echo $product->id; ?>">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="card-text price"><?php echo number_format($product->price, 0); ?> VNĐ</p>
                    <p class="card-text category"><i class="fas fa-tags mr-1"></i><?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                            <a href="/DucThien/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="/DucThien/Product/delete/<?php echo $product->id; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                        <?php endif; ?>
                        <a href="/DucThien/Product/addToCart/<?php echo $product->id; ?>" 
                           class="btn btn-primary btn-sm">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>