<div class="list-user mt-5 container">
    <div class="head-table d-flex justify-content-between">
        <h2 class="text-center">Danh sách Người dùng</h2>
        <div>
            <a href="?url=UserController/create" class="btn btn-primary"> Thêm người dùng </a>
        </div>
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $user) : ?>
                <tr>
                    <th scope="row"><?= $i++ ?? "" ?></th>
                    <td><?= $user['name'] ?? "" ?></td>
                    <td><?= $user['email'] ?? "" ?></td>
                    <td>
                        <a href="?url=UserController/update&id=<?= $user['id'] ?? "" ?>" class="btn btn-primary"> Sửa </a>
                        <a href="?url=UserController/delete&id=<?= $user['id'] ?? "" ?>" class="btn btn-danger"> Xóa </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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