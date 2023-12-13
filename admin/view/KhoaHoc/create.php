<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm khóa học</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="?action=store&controller=khoahoc" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>Tên Khóa Học</label>
                            <input type="text" name="tenKhoaHoc" class="form-control" placeholder="Nhập tên khóa học">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mô Tả</label>
                            <input type="text" name="moTa" class="form-control" placeholder="Nhập mô tả">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Thời Gian</label>
                        <input type="text" name="thoiGian" class="form-control" placeholder="Nhập thời gian">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Ảnh</label>
                        <input type="file" name="anh" class="form-control" placeholder="anh">
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