<div class="list-category mt-5 container">
    <div class="head-table d-flex justify-content-between">
        <h2 class="text-center">Danh sách danh mục sản phẩm</h2>
        <div>
            <a href="?url=CategoryController/create" class="btn btn-primary"> Thêm danh mục </a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $category) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?? "" ?></th>
                    <td><?= $category['name'] ?? "" ?></td>
                    <td>
                        <a href="?url=CategoryController/update&id=<?= $category['id'] ?? "" ?>" class="btn btn-primary"> Sửa </a>
                        <a href="?url=CategoryController/delete&id=<?= $category['id'] ?? "" ?>" class="btn btn-danger"> Xóa </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>