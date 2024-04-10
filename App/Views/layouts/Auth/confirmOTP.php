<div class="container-fluid row d-flex justify-content-center mt-5">
    <form method="post" action="" enctype="multipart/form-data" class="col-6">
        <h2 class="text-center">Cập nhật mật khẩu</h2>
        <span class="text-danger"><?= $data['err'] ?? "" ?></span>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mã OTP: </label>
            <input type="text" name="OTP" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mật khẩu mới: </label>
            <input type="pass" name="pass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" name="sendOTP" class="btn btn-warning form-control">Gửi mã OTP</button>
        <div class="text-danger mb-2"><span id="time"><?= $data['time'] ?? '' ?></span></div>
        <button type="submit" name="confirmOTP" class="btn btn-primary form-control mt-3">Thay đổi mật khẩu</button>
    </form>
</div>