<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/user/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Profil</th>
                <th scope="col">Username</th>
                <th scope="col">Tama</th>
                <th scope="col">Telpon</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($user as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['profil']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['telpon']; ?></td>
                    <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td class="text-nowrap">

                        <button type="button" class="btn btn-info me-1 btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="<?= $row['id_user']; ?>">
                            <i class='bx bxs-show'></i>
                        </button>

                        <button type="button" class="btn btn-success me-1 btn-password" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $row['id_user']; ?>" data-username="<?= $row['username']; ?>">
                            <i class='bx bxs-key'></i>
                        </button>

                        <a href="/user/edit/<?= $row['id_user']; ?>" class="btn btn-warning me-1">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <a href="/user/delete/<?= $row['id_user']; ?>" class="btn btn-danger btn-delete">
                            <i class='bx bx-trash'></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- modal form password -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" method="post" action="" id="form">

                    <h5>Username : <span class="username"></span></h5>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password <span class="text-danger">* (Min 8 Karakter)</span></label>
                        <input type="password" class="form-control" id="password" name="password" required minlength="8">
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="mb-3">
                        <label for="passwordkonfirmasi" class="form-label">Konfirmasi Password <span class="text-danger">* (Min 8 Karakter)</span></label>
                        <input type="password" class="form-control" id="passwordkonfirmasi" name="passwordkonfirmasi" required minlength="8" data-parsley-equalto="#password">
                        <div class="invalid-feedback"></div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- end modal form password -->

<!-- modal detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


                <div class="row g-3">

                    <div class="col-md-3">
                        <img src="" alt="" class="detail-foto rounded w-100">
                    </div>

                    <div class="col-md-9">
                        <table class="table">
                            <tr>
                                <td width="100px">Username</td>
                                <td width="10px">:</td>
                                <td class="detail-username"></td>
                            </tr>
                            <tr>
                                <td>Profil</td>
                                <td>:</td>
                                <td class="detail-profil"></td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="detail-nama"></td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td>:</td>
                                <td class="detail-telpon"></td>
                            </tr>
                            <tr>
                                <td>Aktif</td>
                                <td>:</td>
                                <td class="detail-aktif"></td>
                            </tr>
                            <tr>
                                <td>Dibuat</td>
                                <td>:</td>
                                <td class="detail-dibuat"></td>
                            </tr>
                            <tr>
                                <td>Diupdate</td>
                                <td>:</td>
                                <td class="detail-diupdate"></td>
                            </tr>
                        </table>
                    </div>

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- end modal detail -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '.btn-password', function() {
        $('.username').html($(this).data('username'))
        $('#form').attr('action', '/user/password/' + $(this).data('id'))
    })

    $('#data-table').on('click', '.btn-detail', function() {
        let id = $(this).data('id')

        $.ajax({
            url: '/user/detail',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                let foto = data.foto ? data.foto : 'noprofil.png';
                $('.detail-foto').attr('src', '/assets/img/' + foto)
                $('.detail-username').html(data.username)
                $('.detail-profil').html(data.profil)
                $('.detail-nama').html(data.nama)
                $('.detail-telpon').html(data.telpon)
                $('.detail-dibuat').html(data.user_created_at)
                $('.detail-diupdate').html(data.user_updated_at)
                $('.detail-aktif').html(data.aktif == 1 ? 'Yes' : 'No')
            }
        })
    })
</script>
<?= $this->endSection(); ?>