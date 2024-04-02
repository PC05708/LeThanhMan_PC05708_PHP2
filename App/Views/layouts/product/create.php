<form action="" class="col-6 m-auto mt-5" enctype="multipart/form-data" method="post">
    <h2>Thêm sản phẩm</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Tên sản phẩm: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Tên sản phẩm">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Giá: </label>
        <input type="text" name="price" class="form-control" id="price" placeholder="giá sản phẩm">
    </div>
    <div class="mb-3">
        <label for="date_create" class="form-label">Ngày nhập hàng: </label>
        <input type="date" name="date_create" class="form-control" id="date_create" placeholder="ngày nhập hàng">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Số lượng hàng: </label>
        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="số lượng hàng">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Danh mục sản phẩm: </label>
        <select class="form-select" aria-label="Default select example">
            <option selected>Danh mục sản phẩm</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Ảnh sản phẩm: </label>
        <input type="file" name="img" class="form-control" id="img" placeholder="Ảnh sản phẩm">
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Mô tả sản phẩm: </label>
        <textarea name="desc" id="note" cols="30" rows="10"></textarea>
    </div>
    <button name="add" class="btn btn-primary">Thêm người dùng</button>
</form>