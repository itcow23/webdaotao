<?php
    require 'model/TaiKhoan.php';
    $taikhoans = (new TaiKhoan())->all();
?>
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm khách hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=store&controller=khachhang" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Họ Tên</label>
                            <input type="text" name="hoTen" class="form-control" placeholder="Nhập tên khách hàng">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ngày Sinh</label>
                            <input type="date" name="ngaySinh" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Giới Tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="male" value="1">
                            <label class="form-check-label" for="male">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="female" value="2">
                            <label class="form-check-label" for="female">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Số Điện Thoại</label>
                        <input type="text" name="soDienThoai" class="form-control" placeholder="Nhập số điện thoại">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Địa Chỉ</label>
                        <input type="text" name="diaChi" class="form-control" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <select class="custom-select mb-3" name="maTK">
                            <?php foreach ($taikhoans as $taikhoan): ?>
                                <option value="<?php echo $taikhoan->get_id(); ?>">
                                    <?php echo $taikhoan->get_email();?>
                                </option> 
                            <?php endforeach; ?>
                        </select>
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