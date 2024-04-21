<form action="" class="col-6 m-auto mt-5" enctype="multipart/form-data" method="post">
    <h2>Thêm Danh mục</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Tên danh mục: </label>
        <input type="text" name="name" value="<?= $_POST['name'] ?? "" ?>" class="form-control" id="name" placeholder="tên danh mục">
        <span class="text-danger"><?= $data['err']['name'] ?? "" ?></span>
    </div>
    <button name="add" class="btn btn-primary">Thêm danh mục</button>
</form>