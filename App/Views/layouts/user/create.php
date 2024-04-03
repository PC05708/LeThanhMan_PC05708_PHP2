<form action="" class="col-6 m-auto mt-5" enctype="multipart/form-data" method="post">
    <h2>Thêm người dùng</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Tên người dùng: </label>
        <input type="text" name="name" value="<?= $data['content']['name'] ?? "" ?>" class="form-control" id="name" placeholder="Tên Người Dùng">
        <span class="text-danger"><?= $data['err']['name'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email: </label>
        <input type="email" name="email" value="<?= $data['content']['email'] ?? "" ?>" class="form-control" id="email" placeholder="email@gmail.com">
        <span class="text-danger"><?= $data['err']['email'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Mật khẩu: </label>
        <input type="password" name="pass" value="<?= $data['content']['pass'] ?? "" ?>" class="form-control" id="pass" placeholder="mật khẩu">
        <span class="text-danger"><?= $data['err']['pass'] ?? "" ?></span>
    </div>
    <div class="mb-3">
        <label for="pass-confirm" class="form-label">Xác nhận mật khẩu: </label>
        <input type="password" value="<?= $data['content']['pasConfirm'] ?? "" ?>" name="pass-confirm" class="form-control" id="pass-confirm" placeholder="xác nhận mật khẩu">
        <span class="text-danger"><?= $data['err']['passConfirm'] ?? "" ?></span>
    </div>
    <button name="add" class="btn btn-primary">Thêm người dùng</button>
</form>