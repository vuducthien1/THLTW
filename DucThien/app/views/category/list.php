<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h1 class="text-center mb-4" style="font-weight: 700; color: #3498db;">
        <?php
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user') {
                echo "Sản phẩm đang được bán";
            } else {
                echo "Danh sách danh mục";
            }
        ?>
    </h1>

    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
    <div class="text-center mb-3">
        <a href="/DucThien/Category/add" class="btn btn-primary btn-rounded px-4 py-2">
            <i class="fas fa-plus mr-2"></i> Thêm category
        </a>
    </div>
    <?php endif; ?>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-bordered table-striped mb-0" style="border-radius: 0.5rem; overflow: hidden;">
            <thead class="thead-dark" style="background-color: #2980b9;">
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <th class="text-center">Hành động</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat): ?>
                <tr style="transition: background-color 0.2s;">
                    <td><?= $cat->id ?></td>
                    <td><?= htmlspecialchars($cat->name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($cat->description, ENT_QUOTES, 'UTF-8') ?></td>
                    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                    <td class="text-center">
                        <a href="/DucThien/Category/edit/<?= $cat->id ?>" class="btn btn-sm btn-warning rounded-pill mr-2" title="Sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/DucThien/Category/delete/<?= $cat->id ?>" class="btn btn-sm btn-danger rounded-pill" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa?')">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    /* Nút bo tròn */
    .btn-rounded {
        border-radius: 50px;
        font-weight: 600;
        font-size: 1rem;
        transition: background-color 0.3s, box-shadow 0.3s;
    }
    .btn-rounded:hover {
        box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
    }

    /* Highlight hover dòng bảng */
    tbody tr:hover {
        background-color: #eaf4fc;
    }

    /* Bảng bo góc */
    table {
        border-collapse: separate !important;
        border-spacing: 0;
    }
    thead tr th:first-child {
        border-top-left-radius: 0.5rem !important;
    }
    thead tr th:last-child {
        border-top-right-radius: 0.5rem !important;
    }
    tbody tr:last-child td:first-child {
        border-bottom-left-radius: 0.5rem !important;
    }
    tbody tr:last-child td:last-child {
        border-bottom-right-radius: 0.5rem !important;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>
