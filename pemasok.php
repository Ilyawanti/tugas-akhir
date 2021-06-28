<?php

class pemasok extends controller 
{

	public function index()
	{
		$hasil_select ['pemasok'] = $this->use_model("m_pemasok")->ambil_semua_pemasok();

		//untuk mengecek apakah sudah terisi data :
		//cetak_var ($hasil_select);
		//die;

		$this->show_view("f_pemasok/v_pemasok_daftar", $hasil_select);
	}


	public function proses_hapus()
	{
		$this->use_model("m_pemasok")->hapus_data($_POST['nmr_id']);
		$this->index();
	}

	public function hapus($nmr_id = '')
	{
		$hasil_select ['pemasok'] = $this->use_model("m_pemasok")->ambil_satu_pemasok($nmr_id);

		$this->show_view("f_pemasok/v_pemasok_hapus", $hasil_select);
	}

	public function edit($nmr_id)	
	{
		$hasil_select ['pemasok'] = $this->use_model("m_pemasok")->ambil_satu_pemasok($nmr_id);

		$this->show_view("f_pemasok/v_pemasok_edit", $hasil_select);
	}

	public function proses_update()
	{
		$this->use_model("m_pemasok")->update_data($_POST);
		$this->index();
	}

	public function tambah()
	{
		$data_utk_view['pemasok'] = [
			'kode' => '',
			'nama' => '',
			
		];
		$data_utk_view['pemasok'] = $this->use_model('m_pemasok')->ambil_semua_pemasok();

		$this->show_view('f_pemasok/v_pemasok_tambah', $data_utk_view);

	}

	public function proses_tambah()
	{
		$this->use_model("m_pemasok")->tambah_data($_POST);
		$this->index();
	}

	

}
?>
