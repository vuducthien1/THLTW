<?php include 'app/views/shares/header.php'; ?>

<style>
    .custom-card {
        border-radius: 20px !important; /* Bo tròn góc lớn */
    }
    .custom-btn {
        border-radius: 50px !important; /* Nút bo tròn đầy đủ */
        padding: 0.75rem 2.5rem;
    }
</style>

<div class="container my-5">
    <div class="card shadow-sm p-4 text-center custom-card">
        <h1 class="text-success mb-4">🎉 Đặt hàng thành công!</h1>
        <p class="lead">Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được xử lý thành công và sẽ được giao trong thời gian sớm nhất.</p>
        <a href="/DucThien/Product" class="btn btn-primary btn-lg mt-4 custom-btn">Tiếp tục mua sắm</a>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
