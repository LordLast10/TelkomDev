<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="card mx-auto" style="margin-top: 80px; width: 80%">
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search Data...">
                    </div>
                </div>
                <div class="col-md-0">
                    <button id="searchButton" class="btn btn-primary">Cari</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped mx-auto text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>USER NAME
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>UNIT</th>
                            <th>PASSWORD</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>

                            <tr>
                                <td><?php echo $user->Username ?></td>
                                <td><?php echo $user->Nama_Depan ?></td>
                                <td><?php echo $user->Nama_Belakang ?></td>
                                <td><?php echo $user->unit_name ?></td>
                                <td>**********</td>
                                <td><?php echo $user->activate ?></td>
                                <td>
                                    <a href="<?= base_url('admin/user/edit'); ?>/<?php echo $user->ID ?>" class=" btn btn-secondary btn-sm active" role="button" aria-pressed="true">Edit</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/user/delete'); ?>/<?php echo $user->ID ?>" class=" btn btn-danger btn-sm active" role="button" aria-pressed="true">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Event handler untuk tombol "Cari"
        $("#searchButton").on("click", function() {
            performSearch();
        });

        // Event handler untuk menangani tombol "Enter"
        $("#searchInput").on("keypress", function(e) {
            if (e.which === 13) { // 13 adalah kode tombol Enter
                performSearch();
            }
        });

        function performSearch() {
            var searchText = $("#searchInput").val().toLowerCase();

            $("table tbody tr").each(function() {
                var firstName = $(this).find("td:eq(0)").text().toLowerCase();
                var lastName = $(this).find("td:eq(1)").text().toLowerCase();
                var unit = $(this).find("td:eq(2)").text().toLowerCase();

                if (firstName.includes(searchText) || lastName.includes(searchText) || unit.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>