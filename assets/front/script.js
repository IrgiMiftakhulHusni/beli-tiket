function handleLogin() {
	event.preventDefault(); // Mencegah pengiriman form (untuk tujuan demonstrasi)

	// Mendapatkan nilai input username dan password
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	if (username.length >= 5) {
		if (password.length >= 8) {
			// alert("Username : " + username + "\nPassword : " + password);

			var loginForm = document.getElementById("loginForm");

			loginForm.submit();
		} else {
			alert("Maaf, password minimal harus 8 karakter.");
		}
	} else {
		alert("Maaf, username minimal harus 5 karakter.");
	}
}

// Menambahkan event listener ke tombol login
document.getElementById("loginButton").addEventListener("click", handleLogin);