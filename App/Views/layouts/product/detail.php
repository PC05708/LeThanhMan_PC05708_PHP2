<div class="container mt-5">
    <div class="row container-content">
        <div class="img col-4">
            <figure>
                <img src="<?= $ROOT_URL ?? "" ?><?= $data['img'] ?? "" ?>" width="350px" alt="">
            </figure>
        </div>
        <div class="info col-8">
            <div class="d-flex align-items-center">
                <h2><?= $data['name'] ?? "" ?></h2>
                <b class="mx-5 text-danger">Giá: <?= number_format($data['price'], 0)  ?? "" ?> VNĐ | Số lượng: <?= $data['quantity'] ?? "" ?></b>
            </div>
            <p class="mt-2 text-justify"><?= $data['desc'] ?? "" ?></p>
            <p class="mt-2"><b>Danh mục sản phẩm:</b> <?= $data['category_name'] ?? "" ?></p>
            <p class="mt-2"><b>Ngày nhập hàng:</b> <?= $data['date_create'] ?? "" ?></p>
            <a href="?url=ProductController/update&id=<?= $data['id'] ?? "" ?>" class="btn btn-warning mt-5">Sửa thông tin sản phẩm</a>
        </div>
    </div>
</div>