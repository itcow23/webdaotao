<div class="modal fade" id="editmaKH<?php echo $each->get_maKH() ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông khách hàng</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=update&controller=khachhang" method="POST" enctype="multipart/form-data">
                <input type="text" name="maKH" hidden value="<?php echo $each->get_maKH() ?>">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Họ Tên</label>
                            <input type="text" name="hoTen" class="form-control" value="<?php echo $each->get_hoTen() ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ngày Sinh</label>
                            <input type="date" name="ngaySinh" class="form-control" value="<?php echo $each->get_ngaySinh() ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label> Giới Tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="male" value="1" <?php if($each->get_gioiTinh()=='1'){echo 'checked';}echo''?>>
                            <label class="form-check-label" for="male">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" id="female" value="2" <?php if($each->get_gioiTinh()=='2'){echo 'checked';}echo''?>>
                            <label class="form-check-label" for="female">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Số Điện Thoại</label>
                        <input type="text" name="soDienThoai" class="form-control" value="<?php echo $each->get_soDienThoai() ?>">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Địa Chỉ</label>
                        <input type="text" name="diaChi" class="form-control" value="<?php echo $each->get_diaChi() ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Đồi ảnh mới</label>
                        <input type="file" name="avatar_new" class="form-control">
                        <br>
                        <label>Hoặc để ảnh cũ</label>
                        <img src="public/photos/khachhang/<?php echo $each->get_avatar() ?>" height="100px">
                        <input type="hidden" name="avatar_old" class="form-control" value="<?php echo $each->get_avatar() ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <select class="custom-select mb-3" name="maTK">
                            <?php foreach ($taikhoans as $taikhoan): ?>
                                <option value="<?php echo $taikhoan->get_id(); ?>" <?php if($each->get_maTK()==$taikhoan->get_id() ) echo "selected";?>>
                                    <?php echo $taikhoan->get_email();?>
                                </option> 
                            <?php endforeach; ?>
                        </select>
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
