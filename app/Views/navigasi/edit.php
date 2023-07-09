<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/navigasi/update/<?= $navigasi['id_navigasi']; ?>" id="form">

    <div class="col-md-4">
        <label for="menu" class="form-label">Menu <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('menu') ? 'is-invalid' : ''; ?>" id="menu" name="menu" required value="<?= $navigasi['menu']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('menu'); ?>
        </div>
    </div>

    <div class="col-md-4">
        <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('url') ? 'is-invalid' : ''; ?>" id="url" name="url" required value="<?= $navigasi['url']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('url'); ?>
        </div>
    </div>

    <div class="col-md-4">
        <label for="icon" class="form-label">Icon </label> </label> <a href="https://boxicons.com/" target="_blank" class="ms-5 badge text-bg-success py-2">Cari Icon</a>
        <input type="text" class="form-control <?= validation_show_error('icon') ? 'is-invalid' : ''; ?>" id="icon" name="icon" value="<?= $navigasi['icon']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('icon'); ?>
        </div>
    </div>

    <div class="col-md-4">
        <label for="dropdown" class="form-label">Dropdown <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('dropdown') ? 'is-invalid' : ''; ?>" id="dropdown" name="dropdown" required>
            <option value="0" <?= $navigasi['dropdown'] == 0 ? 'selected' : ''; ?>>NO</option>
            <?php foreach ($menu as $row) : ?>
                <option value="<?= $row['id_navigasi']; ?>" <?= $navigasi['dropdown'] == $row['id_navigasi'] ? 'selected' : ''; ?>><?= $row['menu']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('dropdown'); ?>
        </div>
    </div>

    <div class="col-md-4">
        <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
        <input type="number" class="form-control <?= validation_show_error('urutan') ? 'is-invalid' : ''; ?>" id="urutan" name="urutan" required value="<?= $navigasi['urutan']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('urutan'); ?>
        </div>
    </div>

    <div class="col-md-4">
        <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('aktif') ? 'is-invalid' : ''; ?>" id="aktif" name="aktif" required>
            <option value="1" <?= $navigasi['aktif'] == 1 ? 'selected' : ''; ?>>Yes</option>
            <option value="0" <?= $navigasi['aktif'] == 0 ? 'selected' : ''; ?>>NO</option>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('aktif'); ?>
        </div>
    </div>

    <div class="text-end">
        <a href="/navigasi" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>
