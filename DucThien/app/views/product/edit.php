<?php include 'app/views/shares/header.php'; ?>

<style>
    /* CSS cho nút trong danh sách sản phẩm (Sửa, Xóa, Thêm vào giỏ hàng) */
    .card-footer .btn-group {
        display: flex;
        gap: 8px; /* Khoảng cách giữa các nút */
    }

    .card-footer .btn {
        padding: 10px 16px !important;
        font-size: 1rem !important;
        border-radius: 12px !important;
        flex: 1; /* Nút cùng chiều rộng */
        text-align: center;
    }

    .edit-product-container {
        max-width: 900px;
        margin: 40px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: 500;
    }

    .product-image-preview {
        max-width: 150px;
        border-radius: 10px;
        margin-top: 10px;
    }

    /* Nút bo tròn 4 góc, full width */
    .btn-primary, .btn-secondary {
        border-radius: 12px;
    }
</style>

<div class="edit-product-container">
    <h1 class="text-center mb-4">Sửa sản phẩm</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/DucThien/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" 
                        value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="price" class="form-label">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" 
                        value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="category_id" class="form-label">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"
                                <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Hình ảnh:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <input type="hidden" name="existing_image" value="<?php echo $product->image; ?>">
                    <?php if ($product->image): ?>
                        <img src="/<?php echo $product->image; ?>" alt="Product Image" class="product-image-preview">
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">Lưu thay đổi</button>
    </form>

    <a href="/DucThien/Product" class="btn btn-secondary w-100 mt-3">Quay lại danh sách sản phẩm</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>
