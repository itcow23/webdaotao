<?php
    require 'model/KhoaHoc.php';
    $khoahocs = (new KhoaHoc())->all();
    require 'model/NoiDungKhoaHoc.php';
    $noidungs = (new NoiDungKhoaHoc())->all();
?>
<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm bài học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=store&controller=baihoc" method="POST">
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
                        <label>Nội Dung</label>
                        <select class="custom-select mb-3" name="maNoiDung">
                            <?php foreach($noidungs as $noidung): ?>                           
                                <option value="<?php echo $noidung->get_maNoiDung() ?>">
                                    <?php echo $noidung->get_noiDungKhoaHoc() ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Tên Bài Học</label>
                            <input type="text" name="tenBaiHoc" class="form-control" placeholder="Nhập tên bài học">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tiêu Đề</label>
                            <input type="text" name="tieuDe" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Mô Tả</label>
                        <input type="text" name="moTa" class="form-control" placeholder="Nhập mô tả">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Video</label>
                        <input type="text" name="video" class="form-control" placeholder="Video">
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