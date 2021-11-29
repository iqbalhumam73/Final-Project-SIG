<!DOCTYPE html>
<html lang="en">
<title>My Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: "Lato", sans-serif
    }

    .mySlides {
        display: none
    }
</style>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
            <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <a href="/" class="w3-bar-item w3-button w3-padding-large">Welcome Message</a>
            <a href="/profil" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Profil Diri</a>
            <a href="/mahasiswa" class="w3-bar-item w3-button w3-padding-large w3-hide-small">Data Mahasiswa</a>
            <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
        </div>
    </div>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <ul>
                    <br><br><br>
                    <h2>Tambah Mahasiswa</h2>
                    <form action="/mahasiswaController/Simpan" method="post">
                        <?= csrf_field(); ?>
                        <div class="mb-3">
                            <label for="mhs_nama" class="form-label">Nama Lengkap</label>
                            <input type="name" class="form-control <?= ($validation->hasError('mhs_nama')) ? 'is-invalid' : ''; ?>" id="mhs_nama" name="mhs_nama" autofocus value="<?= old('mhs_nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('mhs_nama'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mhs_urutan" class="form-label">Urutan</label>
                            <input type="number" class="form-control <?= ($validation->hasError('mhs_urutan')) ? 'is-invalid' : ''; ?>" id="mhs_urutan" name="mhs_urutan" value="<?= old('mhs_urutan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('mhs_urutan'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mhs_asalsekolah" class="form-label">Asal Sekolah</label>
                            <input type="name" class="form-control <?= ($validation->hasError('mhs_asalsekolah')) ? 'is-invalid' : ''; ?>" id="mhs_asalsekolah" name="mhs_asalsekolah" value="<?= old('mhs_asalsekolah'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('mhs_asalsekolah'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="mhs_alamat" class="form-label">Alamat</label>
                            <input type="name" class="form-control <?= ($validation->hasError('mhs_alamat')) ? 'is-invalid' : ''; ?>" id="mhs_alamat" name="mhs_alamat" value="<?= old('mhs_alamat'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('mhs_alamat'); ?>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Data yang dimasukkan sudah benar</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </ul>
            </div>
        </div>
    </div>
</body>