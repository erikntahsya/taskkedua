@extends('index')

@section('container')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<div class="container-fluid px-4">
    @if(auth()->user()->role === 'Admin')
        <div class="row">
            <!-- Total User Card -->
            <div class="row">
                <!-- Total Users -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm" style="background-color: #1f2b40; color: white;">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="fa fa-users fs-3 text-primary"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total User</span>
                            <h3 class="card-title mb-2">{{ $totalUsers }}</h3>
                        </div>
                    </div>
                </div>
            
                <!-- Total Admins -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card h-100 shadow-sm" style="background-color: #1f2b40; color: white;">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <i class="fa fa-user-shield fs-3 text-success"></i>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Total Admins</span>
                            <h3 class="card-title mb-2">{{ $totalAdmins }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-person-circle me-3" style="font-size: 2rem;"></i>
            <div>
                <h5 class="mb-0">Selamat datang, {{ auth()->user()->username }}!</h5>
                <p class="mb-0" style="font-size: 0.9rem;">Kami senang Anda kembali. Semoga hari Anda menyenankan!</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

@include('sweetalert::alert')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Data ini akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + userId).submit();
            }
        })
    }
</script>

@if($errors->any())
    <script>
        Swal.fire({
            title: 'Error!',
            text: '{{ $errors->first() }}',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            background: "linear-gradient(135deg, #2C2C2C, #1A1A1A)", // Gradasi gelap modern
            color: "#fff", // Warna teks putih biar lebih elegan
            iconColor: "#00E676", // Warna hijau neon untuk ikon
            confirmButtonColor: "#00E676", // Tombol hijau neon yang futuristik
            confirmButtonText: "OK",
            showClass: {
                popup: "animate__animated animate__fadeInDown", // Animasi masuk
            },
            hideClass: {
                popup: "animate__animated animate__fadeOutUp", // Animasi keluar
            }
        });
    </script>
@endif


@endsection
