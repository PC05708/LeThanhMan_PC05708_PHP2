<div class="container-fluid row d-flex justify-content-center mt-5">
    <form method="post" action="" enctype="multipart/form-data" class="col-6">
        <h2>Quên mật khẩu</h2>
        <span class="text-danger"><?= $data['err'] ?? "" ?></span>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email tài khoản: </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3 text-center">
            <a href="?url=AuthController/login" class="">Đăng nhập</a> /
            <a href="?url=AuthController/register" class="">Đăng Ký</a>
        </div>
        <button type="submit" name="register" class="btn btn-primary form-control">Nhận mã đổi mật khẩu</button>
    </form>
</div>