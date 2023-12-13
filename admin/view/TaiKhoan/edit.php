<div class="modal fade" id="maTK<?php echo $each->get_id() ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin tài khoản</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=update&controller=taikhoan" method="POST">
                    <input type="hidden" name="id" value="<?php echo $each->get_id() ?>">
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="text" name="email" readonly value="<?php echo $each->get_email() ?>" class="form-control" placeholder="Nhập email">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Mật Khẩu</label>
                        <input type="text" name="matKhau" value="<?php echo $each->get_matKhau(); ?>" class="form-control" placeholder="Nhập mật khẩu">
                    </div>   
                    <div class="form-group">
                        <label> Level</label>
                        <div class="form-check">
                            <input class="form-check-input" <?php 
                            if($each->get_level()==1) echo "checked"; ?> type="radio" name="level" id="male" value="1">
                            <label class="form-check-label" for="male">
                                Học Viên
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" <?php
                               if($each->get_level()==2) echo "checked"; ?> type="radio" name="level" id="female" value="2">
                            <label class="form-check-label" for="female">
                                Giảng Viên
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-7">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>