<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>

<body>
    <div class="container-fluid row d-flex justify-content-center mt-5">
        <form class="col-6">
            <h2>Đăng Ký</h2>
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên: </label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
            </div>
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
                <a href="" class="">Đăng Nhập</a>
            </div>
            <button type="submit" class="btn btn-primary form-control">Đăng Ký</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>