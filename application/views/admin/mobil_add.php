<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Rental Car Details</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/mobil_add_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="merk" placeholder="Mercedes-Benz C-Class"></div>
                <?php echo form_error('merk'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Penyewa</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="plat" placeholder="6699"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ID Mobil</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="warna" placeholder="Black"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="tahun" placeholder="2015" min="2000" max="<?php echo date('Y'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="tahun" placeholder="2015" min="2000" max="<?php echo date('Y'); ?>">
                </div>
            </div>
            <div class="form-group">
            <input type="file" class="form-control-file" id="baretUpload" name="baret_Sebelum">
            <label for="baretUpload">Upload Baret</label>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Car Status</label>
                <div class="col-sm-10">
                <select class="form-control" name="status">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
                </div>
                <?php echo form_error('status'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>