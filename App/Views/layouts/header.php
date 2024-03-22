<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .container-content {
            min-height: 65vh;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">Quản Lý Kho Hàng</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-light" aria-current="page" href="#">Xem tồn kho</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản Lý
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?url=ProductController/index">Quản Lý sản phẩm</a></li>
                                <li><a class="dropdown-item" href="?url=CategoryController/index">Quản lý danh mục</a></li>
                                <li>
                                    <hr>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="?url=UserController/index">Quản lý người dùng</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Từ khóa cần tìm" aria-label="Search">
                        <button class="btn btn-warning" type="submit">Search</button>
                    </form>
                    <div class="tai-khoan navbar-nav mx-5">
                        <div class="nav-item dropdown btn btn-warning p-0">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài khoản
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Thông tin</a></li>
                                <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                                <li>
                                    <a class="dropdown-item" href="#">Đăng Xuất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-content">