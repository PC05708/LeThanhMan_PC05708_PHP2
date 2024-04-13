<?php if (!empty($data['err'])) : ?>
    <div class="text-center mt-5">
        <h4 class="text-danger"><?= $data['err'] ?? "" ?></h4>
        <a href="?url=CategoryController/index" class="btn btn-warning">Quay về danh sách danh mục</a>
    </div>
<?php else : ?>
    <?php header("Location: ?url=CategoryController/index"); ?>
<?php endif; ?>