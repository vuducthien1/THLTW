<?php include 'app/views/shares/header.php'; ?>

<style>
    .cart-container {
        max-width: 900px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .cart-item {
        border-bottom: 1px solid #e0e0e0;
        padding: 20px 0;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .product-image {
        max-width: 100px;
        border-radius: 10px;
    }

    .total-box {
        background-color: #f8f9fa;
        padding: 15px 20px;
        border-radius: 12px;
        margin-top: 20px;
        font-weight: 500;
    }

    .btn-outline-secondary {
        width: 30px;
        text-align: center;
        padding: 0;
    }
</style>

<div class="cart-container">
    <h1 class="text-center mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?>
        <?php 
        $total = 0;
        foreach ($cart as $id => $item): 
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
        ?>
            <div class="cart-item row align-items-center">
                <div class="col-md-3 text-center">
                    <?php if ($item['image']): ?>
                        <img src="/DucThien/<?php echo $item['image']; ?>" alt="Product Image" class="product-image">
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <h5><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="mb-1">Giá: <?php echo number_format($item['price'], 0, ',', '.'); ?> VND</p>
                    <p class="mb-1">
                        Số lượng: 
                        <a href="/DucThien/Product/decrease/<?php echo $id; ?>" class="btn btn-sm btn-outline-secondary">-</a>
                        <span class="mx-2"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                        <a href="/DucThien/Product/increase/<?php echo $id; ?>" class="btn btn-sm btn-outline-secondary">+</a>
                    </p>
                    <p>Thành tiền: <?php echo number_format($subtotal, 0, ',', '.'); ?> VND</p>
                </div>
                <div class="col-md-3 text-right">
                    <a href="/DucThien/Product/remove/<?php echo $id; ?>" class="btn btn-sm btn-danger">Xóa</a>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="total-box">
            <h4 class="mb-0">Tổng cộng: <?php echo number_format($total, 0, ',', '.'); ?> VND</h4>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="/DucThien/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
            <a href="/DucThien/Product/checkout" class="btn btn-primary">Thanh Toán</a>
        </div>

    <?php else: ?>
        <p class="text-center">Giỏ hàng của bạn đang trống.</p>
        <div class="text-center mt-3">
            <a href="/DucThien/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
