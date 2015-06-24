<h1 class="page-header">Mendaftar</h1>
<form action="<?php echo base_url();?>home/register" class="form-horizontal" method="POST">
    <div class="form-group">
        <div class="col-sm-4">
            <input type="text" name="nama_depan" class="form-control" id="inputEmail3" placeholder="Nama Depan">
        </div>
        <div class="col-sm-4">
            <input type="text" name="nama_belakang" class="form-control" id="inputEmail3" placeholder="Nama Belakang">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-8">
            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <label for="tanggal_lahir">Tanggal Lahir</label>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4">
            <input type="date" name="tgl_lahir" class="form-control" id="inputPassword3" placeholder="Password">
        </div>
        <div class="col-sm-4">
            <label><a href="#myModal" data-toggle="modal">Mengapa harus memberikan tanggal lahir saya?</a></label>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <div class="radio">
                <label class="col-md-4">
                    <input type="radio" name="gender" id="optionsRadios1" value="Perempuan">
                    Perempuan
                </label>
                <label class="col-md-6">
                    <input type="radio" name="gender" id="optionsRadios2" value="Laki-Laki">
                    Laki-Laki
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">
            <button type="submit" class="btn btn-success btn-lg">Mendaftar</button>
        </div>
    </div>
</form>