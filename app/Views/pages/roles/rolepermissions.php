<?= $this->extend("layouts/app"); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Role Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('roles') ?>">Roles</a></li>
                        <li class="breadcrumb-item active">Role Permissions</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm" style="border-top: 3px solid #ddd;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title"><i class="fas fa-user-shield"></i> Permissions for Role: <?= esc($role['role_name']) ?></h3>
                            <button class="btn btn-info btn-md ml-auto" data-toggle="modal" data-target="#addPermissionModal" data-toggle="tooltip" title="Add Permission">
                                <i class="fas fa-plus-circle"></i> Add Permission
                            </button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover" id="permissionsTable">
                                <thead>
                                    <tr>
                                        <th>Permission Name</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal for Adding Permission -->
<div class="modal fade" id="addPermissionModal" tabindex="-1" role="dialog" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPermissionModalLabel">Add Permission to Role: <?= esc($role['role_name']) ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPermissionForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="permission_id">Select Permission</label>
                        <select class="form-control" id="permission_id" name="permission_id">
                            <?php foreach ($permissions as $permission): ?>
                                <option value="<?= $permission['id'] ?>"><?= esc($permission['permission_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Permission</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
<script>
$(function () {
    // Enable tooltips for buttons and elements
    $('[data-toggle="tooltip"]').tooltip();

    // Initialize the DataTable for role's permissions
    $('#permissionsTable').DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
        ordering: false,
        pageLength: 10,
        ajax: {
            url: '<?= base_url('roles/getRolePermissions/'.$role['id']) ?>',  // URL for fetching permissions of a role
            type: 'GET',
            dataSrc: 'data'  // Expect the data to be inside the 'data' key in the JSON response
        },
        columns: [
            { data: 'permission_name' },
            { data: 'description' },
            { data: 'actions', orderable: false, searchable: false }
        ],
        columnDefs: [
            { targets: [2], className: 'text-center' }  // Center the Actions column (index 2)
        ],
        buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
    }).buttons().container().appendTo('#permissionsTable_wrapper .col-md-6:eq(0)');

    // Handle form submission to add permission to the role
    $('#addPermissionForm').on('submit', function (e) {
        e.preventDefault();

        var roleId = '<?= $role['id'] ?>';  // Role ID is available in your JS context
        var permissionId = $('#permission_id').val();

        $.ajax({
            url: '<?= base_url('roles/savePermission') ?>',  // URL for saving the permission
            type: 'POST',
            data: {
                permission_id: permissionId,
                role_id: roleId
            },
            success: function(response) {
                if (response.success) {
                    alert('Permission added successfully');
                    $('#permissionsTable').DataTable().ajax.reload();  // Reload the DataTable
                    $('#addPermissionModal').modal('hide');  // Close the modal
                } else {
                    alert('Error adding permission');
                }
            },
            error: function() {
                alert('Error processing request');
            }
        });
    });

    // Handle remove permission
    $(document).on('click', '.delete-permission-btn', function () {
        var permissionId = $(this).data('id');
        var roleId = '<?= $role['id'] ?>';  // Assuming role ID is available in your JS context
        
        if (confirm('Are you sure you want to remove this permission?')) {
            $.ajax({
                url: '<?= base_url('roles/removePermission') ?>',  // URL for removing permission
                type: 'POST',
                data: {
                    permission_id: permissionId,
                    role_id: roleId
                },
                success: function(response) {
                    if (response.success) {
                        alert('Permission removed successfully');
                        $('#permissionsTable').DataTable().ajax.reload();  // Reload the DataTable
                    } else {
                        alert('Error removing permission');
                    }
                },
                error: function() {
                    alert('Error processing request');
                }
            });
        }
    });
});
</script>
<?= $this->endSection(); ?>
