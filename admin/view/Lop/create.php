<?php
    require 'model/KhoaHoc.php';
    $khoahocs = (new KhoaHoc())->all();

    require 'model/KhachHang.php';
    $gvs = (new KhachHang())->GV();
?>
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm lớp học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=store&controller=lop" method="POST">
                <div class="form-group col-md-12">
                        <label>Tên Lớp Học</label>
                        <input type="text" name="tenLop" class="form-control" placeholder="Nhập tên lớp">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Tên Khóa Học</label>
                        <select class="custom-select mb-3" name="maKhoaHoc">
                            <?php foreach($khoahocs as $khoahoc): ?>                           
                                <option value="<?php echo $khoahoc->get_maKhoaHoc() ?>">
                                    <?php echo $khoahoc->get_tenKhoaHoc() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Tên giảng viên</label>
                        <select class="custom-select mb-3" name="maTK">
                            <?php foreach($gvs as $gv): ?>                           
                                <option value="<?php echo $gv->get_maTK() ?>">
                                    <?php echo $gv->get_hoTen() ?>
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