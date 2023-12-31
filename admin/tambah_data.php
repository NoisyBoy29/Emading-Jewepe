<!-- Header -->
<?php
include('template/header.php');
?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="index.php"> Manajemen / </a></span> Tambah Artikel</h4>

    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Tambah Artikel Baru</h4>
                </div>
                <div class="card-body">
                    <form action="action_process.php?action=add" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-9">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Artikel*</label>
                                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan judul artikel" required />
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Isi Artikel*</label>
                                    <textarea class="form-control summernote" name="isi" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="uploadSampul" class="form-label">Gambar Sampul*</label>
                                    <input type="file" name="sampul" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Gambar Sampul" required />
                                    <small class="text-danger">Max Ukuran 5Mb, Format : PNG,JPG,JPEG</small>
                                </div>

                            </div>
                            <div class="col lg-3">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Kategori Artikel*</label>
                                    <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Hiburan, Sains, Teknologi" required />
                                </div>

                                <div class="col-md mb-3">
                                    <small class="form-label d-block">Status Artikel*</small>
                                    <div class="form-check mt-3">
                                        <input name="status_artikel" class="form-check-input" type="radio" value="publish" id="defaultRadio1" checked required>
                                        <label class="form-check-label" for="defaultRadio1"> Publish </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="status_artikel" class="form-check-input" type="radio" value="draft" id="defaultRadio2">
                                        <label class="form-check-label" for="defaultRadio2"> Draft </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3 float-end">
                            <a href="index.php" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->

<!-- Footer -->
<?php
include('template/footer.php');
?>