<?php if (!empty($data)) : ?>
    <div class="text-center mt-5">
        <h4 class="text-danger">Không thể xóa danh mục <?= $data['name'] ?? "" ?></h4>
        <a href="?url=CategoryController/index" class="btn btn-warning">Quay về danh sách danh mục</a>
    </div>
<?php else : ?>
    <?php header("Location: ?url=CategoryController/index"); ?>
<?php endif; ?>