{{-- Tahap 1 --}}
@extends('layouts.admin.page')

{{-- Tahap untuk judul  --}}
@section('title', 'Dashboard')

{{-- tahap section jangan lupa di tutup --}}
@section('content')

<section class="section dashboard">
    <div class="row">
        <div class="col-12 mb-0">
            <div class="card large-card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Akun</h5>
                    <div class="d-flex justify-content-between align-items-center my-2">
                        <p class="fw-bold">Nama</p>
                        <p>Jhon Doe 1</p> <!-- Adjusted for non-admin view -->
                    </div>
                    <div class="d-flex justify-content-between align-items-center my-2">
                        <p class="fw-bold">Email</p>
                        <p>JhonDoe1@gmail.com</p> <!-- Adjusted for non-admin view -->
                    </div>
                    <div class="d-flex justify-content-between align-items-center my-2">
                        <p class="fw-bold">Password</p>
                        <p>********</p> <!-- Display asterisks instead of password -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-outline-secondary" onclick="handleShowModal()">Ubah Profil</button> <!-- Adjusted button for non-admin view -->
    <button class="btn btn-primary ms-2" onclick="handleSave()">Simpan</button> <!-- Adjusted buttons for admin view -->
    <button class="btn btn-danger ms-2" onclick="handleCancelEdit()">Batal Edit</button> <!-- Adjusted buttons for admin view -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="password">Masukkan Password Sebelum Mengedit Akun</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="button-addon2" onchange="handlePasswordChange(event)">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="toggleShowPassword()"><i class="bi bi-eye"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="handleCloseModal()">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="handleSubmit()">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@push('js')
  
<script>
    const handleShowModal = () => {
        $('#myModal').modal('show');
    };

    const handleCloseModal = () => {
        setPasswordInput("");
        $('#myModal').modal('hide');
    };

    const handlePasswordChange = (e) => {
        setPasswordInput(e.target.value);
    };

    const handleSubmit = () => {
        if (passwordInput === "admin12345") {
            setIsAdmin(true);
            $('#myModal').modal('hide');
            setOriginalFields({ ...editableFields });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Incorrect password.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
        setPasswordInput("");
    };

    const handleSave = () => {
        Swal.fire({
            title: 'Success!',
            text: 'Your profile has been updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        setIsAdmin(false);
        setOriginalFields({ ...editableFields });
    };

    const handleCancelEdit = () => {
        setIsAdmin(false);
        setEditableFields({ ...originalFields });
    };

    const toggleShowPassword = () => {
        setShowPassword(!showPassword);
    };

    // Initial states
    const [showModal, setShowModal] = useState(false);
    const [passwordInput, setPasswordInput] = useState("");
    const [isAdmin, setIsAdmin] = useState(false);
    const [editableFields, setEditableFields] = useState({
        name: "Admin 1",
        email: "admin1@gmail.com",
        password: "*************"
    });
    const [originalFields, setOriginalFields] = useState({ ...editableFields });
    const [showPassword, setShowPassword] = useState(false);
</script>


@endpush


