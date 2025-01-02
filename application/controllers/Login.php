<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!empty($this->session->userdata('user_login'))) {
			if ($this->uri->segment(2) != 'logout') {
				$this->session->set_flashdata('error', 'Anda sudah login');

				redirect('dashboard', 'resfresh');
			}
		}
	}

	public function index()
	{
		$data = [
			'title' => 'Halaman Login'
		];

		$this->load->view('login', $data);
	}

	public function proses()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username tidak boleh kosong !',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'required' => 'Password harap di isi !',
			'min_length' => 'Password kurang dari 3'
		]);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());

			redirect('login', 'refresh');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$url = "http://localhost/nongtons/api/user/login";

			$data = [
				'api_key'  => 'nongtons-12345678',
				'username' => $username,
				'password' => $password
			];

			$username_api = 'admin';
			$password_api = '12345678';

			// Inisialisasi cURL
			$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, true);          // Menggunakan metode POST
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Kirim data
			curl_setopt($ch, CURLOPT_USERPWD, "$username_api:$password_api"); // Basic Auth

			$headers = [
				'Content-Type: application/x-www-form-urlencoded', // Format data
			];

			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			// Eksekusi permintaan cURL
			$response = curl_exec($ch);

			if (curl_errno($ch)) {
				$this->session->set_flashdata('error', curl_error($ch));

				redirect('login', 'refresh');
			}

			curl_close($ch);

			$response = json_decode($response);

			if ($response->status == true && $response->message == 'Login berhasil') {
				$login = [
					'is_logged_in' => true,
					'data'         => $response->data,
				];

				if ($login) {
					$this->session->set_userdata('user_login', $login);
				}

				$this->session->set_flashdata('success', $response->message);

				redirect('dashboard', 'refresh');
			} else {
				$this->session->set_flashdata('error', $response->message);

				redirect('login', 'refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
}

/* End of file Login.php */
