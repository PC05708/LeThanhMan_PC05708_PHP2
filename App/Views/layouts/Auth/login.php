<div class="container-fluid row d-flex justify-content-center mt-5">
    <form method="post" action="" enctype="multipart/form-data" class="col-6">
        <h2>Đăng nhập</h2>
        <span class="text-danger"><?= $data['err'] ?? "" ?></span>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email đăng nhập: </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mật Khẩu: </label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 text-center">
            <a href="?url=AuthController/forgetPass" class="">Quên Mật khẩu?</a> /
            <a href="?url=AuthController/register" class="">Đăng Ký</a>
        </div>
        <button type="submit" name="login" class="btn btn-primary form-control">Đăng Nhập</button>
    </form>
</div>