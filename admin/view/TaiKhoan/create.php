<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=store&controller=taikhoan" method="POST">
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="text" name="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email']; unset($_SESSION['email']);?>" class="form-control" placeholder="Nhập email">
                        <span style="color: red;"><?php if(isset($_SESSION['error_email'])) echo $_SESSION['error_email']; unset($_SESSION['error_email']); ?></span>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Mật Khẩu</label>
                        <input type="text" name="matKhau" value="<?php if(isset($_SESSION['matKhau'])) echo $_SESSION['matKhau']; unset($_SESSION['matKhau']);?>" class="form-control" placeholder="Nhập mật khẩu">
                        <span style="color: red;"><?php if(isset($_SESSION['error_mk'])) echo $_SESSION['error_mk']; unset($_SESSION['error_mk']); ?></span>
                    </div>  
                    <div class="form-group">
                        <label> Level</label>
                        <div class="form-check">
                            <input class="form-check-input" <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 1) echo "checked"; unset($_SESSION['level']);?> type="radio" name="level" id="male" value="1">
                            <label class="form-check-label" for="male">
                                Học Viên
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" <?php if(isset($_SESSION['level']) && $_SESSION['level'] == 2) echo "checked"; unset($_SESSION['level']);?> type="radio" name="level" id="female" value="2">
                            <label class="form-check-label" for="female">
                                Giảng Viên
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>