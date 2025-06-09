<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Thông tin sản phẩm</h2> <!-- Tiêu đề ở giữa -->

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg p-4" style="border-radius: 30px;">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center justify-content-center">
                        <?php if (!empty($product->image)): ?>
                            <img src="/DucThien/<?php echo $product->image; ?>" 
                                 class="img-fluid shadow-sm" 
                                 alt="Product Image"
                                 style="border-radius: 30px; max-height: 400px; object-fit: contain;">
                        <?php else: ?>
                            <p>Không có hình ảnh</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <h2 class="mb-3"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <p><strong>Giá:</strong> <?php echo number_format($product->price, 0); ?> VNĐ</p>
                        <p><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        <p><strong>Mô tả:</strong><br><?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>

                        <div class="mt-4">
                            <a href="/DucThien/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary rounded-pill me-2 px-4">Thêm vào giỏ hàng</a>
                            <a href="/DucThien/Product" class="btn btn-secondary rounded-pill px-4">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
