<form action="" class="col-6 m-auto mt-5" enctype="multipart/form-data" method="post">
    <h2>Cập Nhật Danh mục</h2>
    <span class="text-danger"><?= $data['err']['404'] ?? "" ?></span>
    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục: </label>
        <input type="text" name="name" value="<?= $data['update']['name'] ?? "" ?>" class="form-control" id="name" placeholder="tên danh mục">
        <span class="text-danger"><?= $data['err']['name'] ?? "" ?></span>
    </div>
    <?php if (isset($data['err']['404'])) : ?>
        <a href="?url=CategoryController/index" class="btn btn-primary">Quay về danh sách danh mục</a>
    <?php else : ?>
        <button name="update" class="btn btn-primary">Cập Nhật danh mục</button>
    <?php endif; ?>
</form>