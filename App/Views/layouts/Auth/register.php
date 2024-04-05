<div class="container-fluid row d-flex justify-content-center mt-5">
    <form class="col-6">
        <h2>Đăng Ký</h2>
        <div class="mb-3">
            <label for="username" class="form-label">Tên đăng nhập: </label>
            <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="email1" class="form-label">Email đăng nhập: </label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật Khẩu: </label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="confirm-password" class="form-label">Xác nhận mật Khẩu: </label>
            <input type="password" class="form-control" id="confirm-password">
        </div>
        <div class="mb-3">
            <a href="?url=AuthController/login" class="">Đăng Nhập</a>
        </div>
        <button type="submit" class="btn btn-primary form-control">Đăng Ký</button>
    </form>
</div>