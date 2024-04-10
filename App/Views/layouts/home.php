<div class="container m-auto">
    <div class="row">
        <aside class="col-3">
            <form action="" method="get" enctype="multipart/form-data">
                <div class="position-relative search">
                    <input type="text" name="search" placeholder="Tên sản phẩm cần tìm">
                    <button type="submit" class="btn btn-warning position-absolute"><i class="ri-search-line"></i></button>
                </div>
            </form>
            <ul class="list-unstyled mt-3">
                <h6 class="border-bottom">Sắp xếp theo giá</h6>
                <!-- Sắp xếp theo giá -->
                <form action="" method="post" enctype="multipart/form-data">
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="price_asc" class="btn btn-link nav-link">Tăng dần</button>
                    </li>
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="price_desc" class="btn btn-link nav-link">Giảm dần</button>
                    </li>
                </form>
                <h6 class="border-bottom">Sắp xếp theo ngày</h6>
                <!-- Sắp xếp theo Ngày -->
                <form action="" method="post" enctype="multipart/form-data">
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="date_asc" class="btn btn-link nav-link">Tăng dần</button>
                    </li>
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="date_desc" class="btn btn-link nav-link">Giảm dần</button>
                    </li>
                </form>
                <h6 class="border-bottom">Sắp xếp theo số lượng</h6>
                <!-- Sắp xếp theo số lượng -->
                <form action="" method="post" enctype="multipart/form-data">
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="quantity_asc" class="btn btn-link nav-link">Tăng dần</button>
                    </li>
                    <li class="p-2">
                        <button type="submit" name="orderBy" value="quantity_desc" class="btn btn-link nav-link">Giảm dần</button>
                    </li>
                </form>
            </ul>
        </aside>
        <div class="col-9">
            <div class="list-product p-3 mx-5 container">
                <div class="head-table d-flex justify-content-between">
                    <h2 class="text-center">Danh sách sản phẩm</h2>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Loại</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Số lượng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data as $product) : ?>
                            <tr>
                                <th scope="row"><?= $i++ ??  "" ?></th>
                                <td><?= $product['name'] ?? "" ?></td>
                                <td><?= $product['category_name'] ?? "" ?></td>
                                <td><?= number_format($product['price'], 0)  ?? "" ?> VNĐ</td>
                                <td><?= $product['quantity'] ?? "" ?></td>
                                <td>
                                    <a href="?url=ProductController/update&id=<?= $product['id'] ?? "" ?>" class="btn btn-primary"> Sửa </a>
                                    <a href="?url=ProductController/delete&id=<?= $product['id'] ?? "" ?>" class="btn btn-danger"> Xóa </a>
                                    <a href="?url=ProductController/detail&id=<?= $product['id'] ?? "" ?>" class="btn btn-info"> Chi tiết </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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
    </div>
</div>