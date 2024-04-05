<div class="list-product mt-5 container">
    <div class="head-table d-flex justify-content-between">
        <h2 class="text-center">Danh sách sản phẩm</h2>
        <div>
            <a href="?url=ProductController/create" class="btn btn-primary"> Thêm sản phẩm </a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Loại</th>
                <th scope="col">Giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $product) : ?>
                <tr class="align-items-center">
                    <th scope="row"><?= $i++ ??  "" ?></th>
                    <td><?= $product['name'] ?? "" ?></td>
                    <td>
                        <figure>
                            <img width="35px" src="<?= $ROOT_URL ?? "" ?>/public/uploads/img/iphone-15-pro-max_3.webp" alt="">
                        </figure>
                    </td>
                    <td><?= $product['category_name'] ?? "" ?></td>
                    <td><?= number_format($product['price'], 0)  ?? "" ?> VNĐ</td>
                    <td>
                        <a href="?url=ProductController/update&id=<?= $product['id'] ?? "" ?>" class="btn btn-primary"> Sửa </a>
                        <a href="?url=ProductController/delete&id=<?= $product['id'] ?? "" ?>" class="btn btn-danger"> Xóa </a>
                        <a href="?url=ProductController/detail&id=<?= $product['id'] ?? "" ?>" class="btn btn-info"> Chi tiết </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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