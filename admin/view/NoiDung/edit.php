
<div class="modal fade" id="maNoiDung<?php echo $each->get_maNoiDung() ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa nội dung khoa học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=update&controller=noidung" method="POST">
                    <input type="hidden" name="maNoiDung" value="<?php echo $each->get_maNoiDung() ?>">
                    <div class="form-group col-md-12">
                        <label>Tên Khóa Học</label>
                        <select class="custom-select mb-3" name="maKhoaHoc">
                            <?php foreach($khoahocs as $khoahoc): ?>                           
                                <option value="<?php echo $khoahoc->get_maKhoaHoc() ?>"
                                    <?php if($each->get_maKhoaHoc() === $khoahoc->get_maKhoaHoc()) echo "selected" ?>
                                >
                                    <?php echo $khoahoc->get_tenKhoaHoc() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Nội Dung</label>
                        <input type="text" name="noiDungKhoaHoc" class="form-control" value="<?php echo $each->get_noiDungKhoaHoc() ?>">
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