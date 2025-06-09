<?php include 'app/views/shares/header.php'; ?>

<style>
    .checkout-container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="checkout-container">
    <h1 class="text-center mb-4">Thanh toán</h1>

    <form method="POST" action="/DucThien/Product/processCheckout">
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="/DucThien/Product/cart" class="btn btn-secondary">Quay lại giỏ hàng</a>
            <button type="submit" class="btn btn-primary">Thanh toán</button>
        </div>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
