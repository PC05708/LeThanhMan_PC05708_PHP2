<form action="" class="col-6 m-auto mt-5" enctype="multipart/form-data" method="post">
    <h2>Thêm sản phẩm</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản phẩm">
        <span class="text-danger"><?= $data['err']['name'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá: </label>
        <input type="text" name="price" class="form-control" id="price" placeholder="giá sản phẩm">
        <span class="text-danger"><?= $data['err']['price'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="date_create" class="form-label">Ngày nhập hàng: </label>
        <input type="date" name="date_create" class="form-control" id="date_create" placeholder="ngày nhập hàng">
        <span class="text-danger"><?= $data['err']['date_create'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng hàng: </label>
        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="số lượng hàng">
        <span class="text-danger"><?= $data['err']['quantity'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Danh mục sản phẩm: </label>
        <select class="form-select" name="category_id" aria-label="Default select example">
            <option selected>Danh mục sản phẩm</option>
            <?php if (isset($data['categories'])) : ?>
                <?php foreach ($data['categories'] as $value) : ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <span class="text-danger"><?= $data['err']['category_id'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Ảnh sản phẩm: </label>
        <input type="file" name="image" class="form-control" id="img" placeholder="Ảnh sản phẩm">
        <span class="text-danger"><?= $data['err']['image'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="note" class="form-label">Mô tả sản phẩm: </label>
        <textarea name="note" id="note" cols="30" rows="10"></textarea>
        <span class="text-danger"><?= $data['err']['note'] ?? "" ?></span>
    </div>
    <button name="add" class="btn btn-primary">Thêm Sản phẩm</button>
</form>