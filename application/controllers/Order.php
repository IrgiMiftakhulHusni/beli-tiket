<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_login'))) {
			$this->session->set_flashdata('error', 'Anda belum login');

			redirect('login', 'resfresh');
		}
	}

	public function index()
	{
		$url = "http://localhost/nongtons/api/order";

		$username_api = 'admin';
		$password_api = '12345678';

		$query_data = [
			'api_key' => 'nongtons-12345678',
            'idUser' => $this->session->userdata('user_login')['data']->id
		];

		$url_with_query = $url . '?' . http_build_query($query_data);

		$ch = curl_init($url_with_query);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_USERPWD, "$username_api:$password_api");

		$headers = [
			'Accept: application/json',
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			$this->session->set_flashdata('error', curl_error($ch));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		curl_close($ch);

		$response = json_decode($response);

		$data = [
			'title' => 'Order Film',
			'page'  => 'order',
			'order' => $response->data
		];

		$this->load->view('index', $data);


	}

    public function delete($id)
	{

		$url = "http://localhost/nongtons/api/order";

		$data = [
			'api_key'  	=> 'nongtons-12345678',
			'id'		=> $id
		];

		// Basic Auth
		$username_api = 'admin';
		$password_api = '12345678';

		// Inisialisasi cURL
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');          // Menggunakan metode POST
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


			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}


		curl_close($ch);

		$response = json_decode($response);

		if ($response->status == 'true') {
			$this->session->set_flashdata('success', $response->message);

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else {
			$this->session->set_flashdata('error', $response->message);

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	public function update()
	{
		$id       = $this->input->post('id');
		$jumlah   = $this->input->post('jumlah');
		$no_kursi = $this->input->post('no_kursi');

		$url = "http://localhost/nongtons/api/order";

		$data = [
			'api_key'  => 'nongtons-12345678',
			'id'       => $id,
			'jumlah'   => $jumlah,
			'no_kursi' => $no_kursi
		];

		$username_api = 'admin';
		$password_api = '12345678';

		// Inisialisasi cURL
		$ch = curl_init($url);

		// Atur opsi cURL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_USERPWD, "$username_api:$password_api");

		$headers = [
			'Content-Type: application/x-www-form-urlencoded',
		];
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			$this->session->set_flashdata('error', curl_error($ch));

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}

		curl_close($ch);

		$response = json_decode($response);

		if ($response->status == 'true') {
			$this->session->set_flashdata('success', $response->message);

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		} else {
			$this->session->set_flashdata('error', $response->message);

			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}
}

/* End of file Order.php */
