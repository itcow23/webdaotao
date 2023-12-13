<div class="modal fade" id="maLop<?php echo $each->get_maLop() ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa thông tin bài học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=update&controller=lop" method="POST">
                <input type="text" hidden name="maLop" value="<?php echo $each->get_maLop() ?>">
                    <div class="row">
                    <div class="form-group col-md-12">
                        <label>Tên lớp học</label>
                        <input type="text" name="tenLop" class="form-control" value="<?php echo $each->get_tenLop() ?>">
                    </div>
                        <div class="form-group col-md-12">
                            <label>Tên Khóa Học</label>
                            <select class="custom-select mb-3" name="maKhoaHoc">
                                <?php foreach($khoahocs as $khoahoc): ?>                           
                                    <option value="<?php echo $khoahoc->get_maKhoaHoc() ?>"
                                        <?php if($each->get_maKhoaHoc()===$khoahoc->get_maKhoaHoc()) echo "selected"?>
                                    >
                                        <?php echo $khoahoc->get_tenKhoaHoc() ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Giảng Viên</label>
                            <select class="custom-select mb-3" name="maTK">
                                <?php foreach($gvs as $gv): ?>                           
                                    <option value="<?php echo $gv->get_maTK() ?>"
                                        <?php if($each->get_maTK()===$gv->get_maTK()) echo "selected"?>
                                    >
                                        <?php echo $gv->get_hoTen() ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
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