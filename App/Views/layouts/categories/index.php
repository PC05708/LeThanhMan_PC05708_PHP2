<div class="list-category mt-5 container">
    <div class="head-table d-flex justify-content-evenly">
        <h2 class="text-center">Danh sách danh mục sản phẩm</h2>
        <div>
            <a href="?url=CategoryController/create" class="btn btn-primary"> Thêm danh mục </a>
        </div>
    </div>
    <div class="row">
        <div class="col-6 m-auto">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên danh mục</th>
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
    </div>
    <div class="d-flex justify-content-center">
        <nav aria-label="Page navigation  example ">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>