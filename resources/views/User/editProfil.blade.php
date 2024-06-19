<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="pagetitle">
            <h1>Profil Anda</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Profil Anda</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-12 mb-0">
                    <div class="card large-card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Akun</h5>
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <p class="fw-bold">Nama</p>
                                <p id="nameField">Admin 1</p>
                                <input type="text" id="nameInput" class="form-control mx-3 d-none"
                                    style="width: 80%;" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <p class="fw-bold">Email</p>
                                <p id="emailField">admin1@gmail.com</p>
                                <input type="email" id="emailInput" class="form-control mx-3 d-none"
                                    style="width: 80%;" />
                            </div>
                            <div class="d-flex justify-content-between align-items-center my-2">
                                <p class="fw-bold">Password</p>
                                <p id="passwordField">*</p>
                                <input type="password" id="passwordInput" class="form-control mx-3 d-none"
                                    placeholder="New password" style="width: 80%;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="editButton" class="btn btn-outline-secondary">Ubah Profil</button>
            <button id="saveButton" class="btn btn-primary ms-2 d-none">Simpan</button>
            <button id="cancelButton" class="btn btn-danger ms-2 d-none">Batal Edit</button>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="validationModal" tabindex="-1" aria-labelledby="validationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="validationModalLabel">Validasi Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="passwordInputModal" class="form-label">Masukkan Password Sebelum Mengedit
                            Akun</label>
                        <div class="input-group">
                            <input type="password" id="passwordInputModal" class="form-control" placeholder="Password">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i
                                    class="bi bi-eye"></i></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="confirmButton">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const cancelButton = document.getElementById('cancelButton');
        const nameField = document.getElementById('nameField');
        const emailField = document.getElementById('emailField');
        const passwordField = document.getElementById('passwordField');
        const nameInput = document.getElementById('nameInput');
        const emailInput = document.getElementById('emailInput');
        const passwordInput = document.getElementById('passwordInput');
        const validationModal = new bootstrap.Modal(document.getElementById('validationModal'), {
            backdrop: 'static',
            keyboard: false
        });
        const passwordInputModal = document.getElementById('passwordInputModal');
        const togglePassword = document.getElementById('togglePassword');
        const confirmButton = document.getElementById('confirmButton');
        let isAdmin = false;

        editButton.addEventListener('click', () => {
            validationModal.show();
        });

        confirmButton.addEventListener('click', () => {
            if (passwordInputModal.value === 'admin12345') {
                isAdmin = true;
                validationModal.hide();
                nameField.classList.add('d-none');
                emailField.classList.add('d-none');
                passwordField.classList.add('d-none');
                nameInput.classList.remove('d-none');
                emailInput.classList.remove('d-none');
                passwordInput.classList.remove('d-none');
                saveButton.classList.remove('d-none');
                cancelButton.classList.remove('d-none');
                editButton.classList.add('d-none');
                nameInput.value = nameField.textContent;
                emailInput.value = emailField.textContent;
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Incorrect password.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
            passwordInputModal.value = '';
        });

        togglePassword.addEventListener('click', () => {
            if (passwordInputModal.type === 'password') {
                passwordInputModal.type = 'text';
                togglePassword.innerHTML = '<i class="bi bi-eye-slash"></i>';
            } else {
                passwordInputModal.type = 'password';
                togglePassword.innerHTML = '<i class="bi bi-eye"></i>';
            }
        });

        saveButton.addEventListener('click', () => {
            Swal.fire({
                title: 'Success!',
                text: 'Your profile has been updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            });
            isAdmin = false;
            nameField.textContent = nameInput.value;
            emailField.textContent = emailInput.value;
            nameField.classList.remove('d-none');
            emailField.classList.remove('d-none');
            passwordField.classList.remove('d-none');
            nameInput.classList.add('d-none');
            emailInput.classList.add('d-none');
            passwordInput.classList.add('d-none');
            saveButton.classList.add('d-none');
            cancelButton.classList.add('d-none');
            editButton.classList.remove('d-none');
        });

        cancelButton.addEventListener('click', () => {
            isAdmin = false;
            nameField.classList.remove('d-none');
            emailField.classList.remove('d-none');
            passwordField.classList.remove('d-none');
            nameInput.classList.add('d-none');
            emailInput.classList.add('d-none');
            passwordInput.classList.add('d-none');
            saveButton.classList.add('d-none');
            cancelButton.classList.add('d-none');
            editButton.classList.remove('d-none');
        });
    </script>
</body>

</html>
