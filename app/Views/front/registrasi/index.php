<?= $this->extend('front/template/index'); ?>

<?= $this->section('content'); ?>
<section id="services" class="services section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><?= $title; ?></h2>
        </div>

        <div class="card p-3 shadow">


            <form class="row g-3" method="post" action="/registrasi-mahasiswa-baru/create" id="form" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required>
                    <div class="invalid-feedback">
                        <?= validation_show_error('nama'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="telpon" class="form-label">Telpon <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= validation_show_error('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" required>
                    <div class="invalid-feedback">
                        <?= validation_show_error('telpon'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control <?= validation_show_error('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required>
                    <div class="invalid-feedback">
                        <?= validation_show_error('username'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">* (Min 8 Karakter)</span></label>
                    <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" required minlength="8">
                    <div class="invalid-feedback">
                        <?= validation_show_error('password'); ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="passwordkonfirmasi" class="form-label">Konfirmasi Password <span class="text-danger">* (Min 8 Karakter)</span></label>
                    <input type="password" class="form-control <?= validation_show_error('passwordkonfirmasi') ? 'is-invalid' : ''; ?>" id="passwordkonfirmasi" name="passwordkonfirmasi" required minlength="8" data-parsley-equalto="#password">
                    <div class="invalid-feedback">
                        <?= validation_show_error('passwordkonfirmasi'); ?>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>

            </form>

        </div>

    </div>
</section>
<?= $this->endSection(); ?>