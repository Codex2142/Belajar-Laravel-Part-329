
// JavaScript untuk memeriksa kesamaan password
document.getElementById('registrationForm').addEventListener('input', function(e) {
    // Mengambil nilai dari password dan confirm password
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const submitBtn = document.getElementById('submitBtn');
    const passwordError = document.getElementById('passwordError');
    const passwordMismatchAlert = document.getElementById('passwordMismatchAlert');

    // Memeriksa apakah password dan confirm password cocok
    if (password !== confirmPassword) {
        passwordError.style.display = 'block'; // Menampilkan pesan error
        passwordMismatchAlert.style.display = 'block'; // Menampilkan alert
        submitBtn.disabled = true; // Menonaktifkan tombol submit
    } else {
        passwordError.style.display = 'none'; // Menyembunyikan pesan error
        passwordMismatchAlert.style.display = 'none'; // Menyembunyikan alert
        submitBtn.disabled = false; // Mengaktifkan tombol submit
    }
});
