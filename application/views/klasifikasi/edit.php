<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Surat Masuk</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Surat masuk
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Dari :</label>
                                        <input class="form-control">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>No Urut:</label>
                                        <input class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Surat:</label>
                                        <input class="form-control" type="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal:</label>
                                        <input class="form-control" placeholder="Enter text">
                                    </div>
                                      <div class="form-group">
                                        <label>Sifat Surat :</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Static Control</label>
                                        <p class="form-control-static">email@example.com</p>
                                    </div> -->
                                    <div class="form-group">
                                        <label>Isi Ringkas :</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Catatan :</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input type="file">
                                    </div>
                                  
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>No Surat Masuk :</label>
                                        <input class="form-control">
                                        <p class="help-block">Example block-level help text here.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Index :</label>
                                        <input class="form-control" placeholder="Enter text">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Diteruskan :</label>
                                        <input class="form-control" type="date">
                                    </div>
                                   
                                      <div class="form-group">
                                        <label>Klasifikasi Surat :</label>
                                        <select class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                             
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('surat_masuk') ?>" class="btn btn-danger ">Batal</a>
                                    <button type="reset" class="btn btn-default">Reset </button>
                            </div>
                                </form>

                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->