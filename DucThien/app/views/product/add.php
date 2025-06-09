<?php include 'app/views/shares/header.php'; ?>

<style>
    .add-product-container {
        max-width: 600px;
        margin: 30px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .add-product-container h1 {
        text-align: center;
        margin-bottom: 25px;
    }

    .form-group label {
        font-weight: 500;
    }

    .btn-primary {
        width: 100%;
    }

    .btn-secondary {
        width: 100%;
    }

    .error-message {
        color: red;
        font-size: 0.9rem;
        margin-top: 5px;
    }
</style>

<div class="add-product-container">
    <h1>Thêm sản phẩm mới</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="/DucThien/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group mt-3">
            <label for="category_id">Danh mục:</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="image">Hình ảnh:</label>
            <input type="file" id="image" name="image" class="form-control">
            <div id="image-error" class="error-message"></div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Thêm sản phẩm</button>
    </form>

    <a href="/DucThien/Product" class="btn btn-secondary mt-3">Quay lại danh sách sản phẩm</a>
</div>

<script>
    // Hàm kiểm tra file hình ảnh trước khi submit
    function validateForm() {
        const imageInput = document.getElementById('image');
        const errorDiv = document.getElementById('image-error');
        errorDiv.textContent = ''; // Xóa thông báo cũ nếu có

        if (imageInput.files.length > 0) {
            const file = imageInput.files[0];
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            const fileName = file.name.toLowerCase();
            const fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);

            if (!allowedExtensions.includes(fileExtension)) {
                errorDiv.textContent = 'Chỉ chấp nhận các định dạng JPG, JPEG, PNG và GIF.';
                return false; // Ngăn không cho submit form
            }
        }

        return true;
    }

    // Lắng nghe sự kiện thay đổi file để hiện lỗi ngay lập tức
    document.getElementById('image').addEventListener('change', function() {
        const imageInput = document.getElementById('image');
        const errorDiv = document.getElementById('image-error');
        errorDiv.textContent = ''; // Xóa thông báo cũ

        if (imageInput.files.length > 0) {
            const file = imageInput.files[0];
            const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            const fileName = file.name.toLowerCase();
            const fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);

            if (!allowedExtensions.includes(fileExtension)) {
                errorDiv.textContent = 'Chỉ chấp nhận các định dạng JPG, JPEG, PNG và GIF.';
            }
        }
    });
</script>

<?php include 'app/views/shares/footer.php'; ?>
