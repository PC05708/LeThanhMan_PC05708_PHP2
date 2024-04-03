<div class="container m-auto">
    <div class="row">
        <aside class="col-3">
            <form action="" method="get" enctype="multipart/form-data">
                <div class="position-relative search">
                    <input type="text" placeholder="Tên sản phẩm cần tìm">
                    <button class="btn btn-warning position-absolute"><i class="ri-search-line"></i></button>
                </div>
            </form>
            <div class="accordion mb-3" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Sắp xếp theo giá
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            <ul class="m-0 p-0 list-unstyled">
                                <li class="p-2 border-bottom"><a class="nav-link" href="">Tăng dần</a></li>
                                <li class="p-2 "><a class="nav-link" href="">Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion mb-3" id="accordionDate">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Sắp xếp theo Ngày
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionDate">
                        <div class="accordion-body p-0">
                            <ul class="m-0 p-0 list-unstyled">
                                <li class="p-2 border-bottom"><a class="nav-link" href="">Tăng dần</a></li>
                                <li class="p-2 "><a class="nav-link" href="">Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion" id="accordionQuality">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
                            Sắp xếp theo số lượng
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionDate">
                        <div class="accordion-body p-0">
                            <ul class="m-0 p-0 list-unstyled">
                                <li class="p-2 border-bottom"><a class="nav-link" href="">Tăng dần</a></li>
                                <li class="p-2 "><a class="nav-link" href="">Giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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