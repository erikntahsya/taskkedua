@extends('index')

@section('container')

<style>
    .table-responsive {
        overflow: hidden;
    }

    #manage-table tbody {
        display: block;
        max-height: 400px;
        overflow-y: auto;
    }

    #manage-table thead, #manage-table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 12px 15px;
    }

    .table th {
        background-color: #343a40;
        color: #f8f9fa;
        text-align: center;
    }

    .table tbody tr {
        transition: background-color 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #495057;
    }
    .pagination {
        display: flex;
        justify-content: center;
        padding: 15px 0;
        font-size: 16px;
        margin: 0;
        list-style: none;
    }

    
    .pagination a {
        margin: 0 5px;
        text-decoration: none;
        padding: 8px 14px;
        background-color: #007bff;
        color: white;
        border-radius: 8px;
        font-size: 14px;
        min-width: 40px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Tombol aktif */
    .pagination .active {
        background-color: #0056b3;
    }

    /* Menonaktifkan tombol ketika tidak ada halaman sebelumnya/berikutnya */
    .pagination .disabled {
         background-color: #6c757d;
        cursor: not-allowed;
    }
    .search-bar {
        margin-bottom: 20px;
    }

    .search-bar input {
        width: 100%;
        padding: 12px 18px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
        background-color: #2c3e50;
        color: #fff;
    }

    /* Modal */
    .modal-content {
        background-color: #2c3e50;
        color: white;
    }

    .modal-header {
        background-color: #34495e;
    }

    .modal-footer {
        background-color: #34495e;
    }

    .modal-title {
        font-weight: bold;
        font-size: 18px;
    }

    .btn-outline-success {
        border-radius: 50px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }
</style>
<!-- Search Bar -->
<div class="search-bar">
    <form id="search-form" action="{{ route('users.kelola') }}" method="GET">
        @csrf
        <input type="text" id="search-input" name="search" placeholder="Search by name, email, phone, etc...">
    </form>
</div>


<!-- Button to Open Modal Create -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Create New User
</button>
<!-- Table -->
<div class="table-responsive text-nowrap">
    <table class="table table-hover table-striped align-middle mb-0" id="manage-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Address</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="text-center">
                    <td class="fw-bold">{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->no_hp }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->jurusan }}</td>
                    <td>
                        {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                    </td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            @if($user->role !== 'Admin')
                                <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                    <i class="bx bx-edit-alt"></i>
                                </button>

                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
                <!-- Modal Create User -->
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Create New User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="createUserForm">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="username" name="username" >
                                            <small class="text-danger" id="usernameError"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" >
                                            <small class="text-danger" id="emailError"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="no_hp" class="form-label">No HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" >
                                            <small class="text-danger" id="no_hpError"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" >
                                            <small class="text-danger" id="addressError"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="jurusan" class="form-label">Jurusan</label>
                                            <select class="form-select" id="jurusan" name="jurusan" >
                                                <option value="RPL">RPL</option>
                                                <option value="Otomotif">Otomotif</option>
                                                <option value="DPIB">DPIB</option>
                                                <option value="DKV">DKV</option>
                                            </select>
                                            <small class="text-danger" id="jurusanError"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" id="role" name="role" >
                                                <option value="Admin">Admin</option>
                                                <option value="User">User</option>
                                            </select>
                                            <small class="text-danger" id="roleError"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password" name="password">
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <small class="text-danger" id="passwordError"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password_confirmation')">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                            <small class="text-danger" id="passwordConfirmationError"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit User -->
                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Edit User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="editForm{{ $user->id }}" action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username{{ $user->id }}" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="username{{ $user->id }}" name="username" value="{{ old('username', $user->username) }}">
                                            <small class="text-danger" id="usernameError{{ $user->id }}"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email{{ $user->id }}" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email{{ $user->id }}" name="email" value="{{ old('email', $user->email) }}">
                                            <small class="text-danger" id="emailError{{ $user->id }}"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                    <label for="no_hp{{ $user->id }}" class="form-label">No HP</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="no_hp{{ $user->id }}" 
                                        name="no_hp" 
                                        value="{{ old('no_hp', $user->no_hp) }}" 
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    <small class="text-danger" id="no_hpError{{ $user->id }}"></small>
                                </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="address{{ $user->id }}" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address{{ $user->id }}" name="address" value="{{ old('address', $user->address) }}">
                                            <small class="text-danger" id="addressError{{ $user->id }}"></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="jurusan{{ $user->id }}" class="form-label">Jurusan</label>
                                            <select class="form-select" id="jurusan{{ $user->id }}" name="jurusan">
                                                <option value="RPL" {{ old('jurusan', $user->jurusan) == 'RPL' ? 'selected' : '' }}>RPL</option>
                                                <option value="Otomotif" {{ old('jurusan', $user->jurusan) == 'Otomotif' ? 'selected' : '' }}>Otomotif</option>
                                                <option value="DPIB" {{ old('jurusan', $user->jurusan) == 'DPIB' ? 'selected' : '' }}>DPIB</option>
                                                <option value="DKV" {{ old('jurusan', $user->jurusan) == 'DKV' ? 'selected' : '' }}>DKV</option>
                                            </select>
                                            <small class="text-danger" id="jurusanError{{ $user->id }}"></small>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status{{ $user->id }}" class="form-label">Status</label>
                                            <select class="form-select" id="status{{ $user->id }}" name="status">
                                                <option value="Active" {{ old('status', $user->status == 1 ? 'Active' : 'Inactive') == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ old('status', $user->status == 0 ? 'Inactive' : 'Active') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            <small class="text-danger" id="statusError{{ $user->id }}"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="saveChanges{{ $user->id }}">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            @endforeach
            @if($users->isEmpty())
                <tr>
                    <td colspan="7" class="text-center py-5">
                        <i class="bx bx-info-circle fs-2 text-muted"></i>
                        <p class="text-muted mb-0">No user data available</p>
                    </td>
                </tr>
            @endif
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#editForm{{ $user->id }}').on('submit', function (e) {
            e.preventDefault();

            let formData = $(this).serialize();
            let formAction = $(this).attr('action');

            // Clear previous errors
            $('small.text-danger').text('');

            $.ajax({
                url: formAction,
                method: 'POST',
                data: formData,
                success: function (response) {
                    alert('User updated successfully!');
                    location.reload(); // Reload page to reflect changes
                },
                error: function (xhr) {
                    if (xhr.status === 422) {
                        // Tampilkan pesan error dari server
                        let errors = xhr.responseJSON.errors;
                        for (let key in errors) {
                            $(`#${key}Error{{ $user->id }}`).text(errors[key][0]);
                        }
                    } else {
                        alert('Something went wrong. Please try again.');
                    }
                },
            });
        });
    });
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
});

</script>
</tbody>
</table>
</div>

<script>
    document.getElementById('search-input').addEventListener('keyup', function() {
        document.getElementById('search-form').submit();
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function togglePasswordVisibility(fieldId) {
    const passwordField = document.getElementById(fieldId);
    const eyeIcon = passwordField.nextElementSibling.querySelector('i');

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    }
}
</script>
<!-- Pagination Section -->
<div class="pagination">
    @if ($users->currentPage() > 1)
        <a href="{{ $users->previousPageUrl() }}" class="prev">Prev</a>
    @endif

    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="page-number {{ $page == $users->currentPage() ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($users->hasMorePages())
        <a href="{{ $users->nextPageUrl() }}" class="next">Next</a>
    @endif
</div>
<script>
    $('#createUserForm').submit(function(e) {
        e.preventDefault();

        let formData = {
            _token: $('input[name=_token]').val(),
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
            role: $('#role').val(),
            jurusan: $('#jurusan').val(),
            no_hp: $('#no_hp').val(),
            address: $('#address').val(),
            status: 0 // Default status ke 0
        };

        console.log("Form Data Sent:", formData); // Debugging

        $.ajax({
            url: "/users",
            type: "POST",
            data: formData,
            success: function(response) {
                console.log("Server Response:", response); // Debugging
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
                $('#createModal').modal('hide');
                location.reload();
            },
            error: function(xhr) {
                console.log("Error Response:", xhr.responseJSON); // Debugging
                let errors = xhr.responseJSON.errors;
                $('.text-danger').text('');
                $.each(errors, function(key, value) {
                    $('#' + key + 'Error').text(value[0]);
                });
            }
        });
    });
</script>
 @endsection
