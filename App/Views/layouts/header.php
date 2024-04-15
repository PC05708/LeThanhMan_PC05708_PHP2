<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css" integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $ROOT_URL ?? "" ?>/public/assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <style>
        .container-content {
            min-height: 65vh;
        }

        label {
            font-weight: bold;
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
                    <?php if (isset($_SESSION['user'])) : ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="?url=HomeController/homePage">Xem tồn kho </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-light" href="?url=ProductController/index">Quản Lý sản phẩm</a>
                            </li>
                            <li>
                                <a class="nav-link active text-light" href="?url=CategoryController/index">Quản lý danh mục</a>
                            </li>
                            <li>
                                <a class="nav-link active text-light" href="?url=UserController/index">Quản lý người dùng</a>
                            </li>
                        </ul>
                        <div class="tai-khoan navbar-nav mx-5">
                            <div class="dropdown">
                                <a class="btn btn-warning" href="?url=AuthController/logout">Đăng Xuất</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <a style="margin-left: 89%;" href="?url=AuthController/login" class="btn btn-warning">Đăng Nhập</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-content">