<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->load->database();
		if (!empty($this->input->get("search")) && $this->input->get("search") != '') {
			$this->db->like('nrp', $this->input->get("search"));
			$this->db->or_like('nama', $this->input->get("search"));
		}
		$query = $this->db->get("users");
		$data['data'] = $query->result();
		$data['total'] = $this->db->count_all("users");
		echo json_encode($data);
	}


	/**
	 * Store Data from this method.
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->load->database();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
		if ($this->form_validation->run()) {
			$insert = $this->input->post();
			$this->db->insert('users', $insert);
			$id = $this->db->insert_id();
			$q = $this->db->get_where('users', array('id' => $id));
			echo json_encode(array(
				'status' => true,
				'data' => $q->row()
			));
		} else {
			$array = array(
				'status'   => false,
				'message' => 'Data tidak valid',
				'errors' => array(
					'nrp_error' => form_error('nrp'),
					'nama_error' => form_error('nama'),
					'jenis_kelamin_error' => form_error('jenis_kelamin'),
				),
			);
			echo json_encode($array);
		}
	}


	/**
	 * Edit Data from this method.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$this->load->database();
		$q = $this->db->get_where('users', array('id' => $id));
		echo json_encode($q->row());
	}


	/**
	 * Update Data from this method.
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$this->load->database();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
		if ($this->form_validation->run()) {
			$insert = $this->input->post();
			$this->db->where('id', $id);
			$this->db->update('users', $insert);
			$q = $this->db->get_where('users', array('id' => $id));
			echo json_encode(array(
				'status' => true,
				'data' => $q->row()
			));
		} else {
			$array = array(
				'status'   => false,
				'message' => 'Data tidak valid',
				'errors' => array(
					'nrp_error' => form_error('nrp'),
					'nama_error' => form_error('nama'),
					'jenis_kelamin_error' => form_error('jenis_kelamin'),
				),
			);
			echo json_encode($array);
		}
	}


	/**
	 * Delete Data from this method.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('users');
		echo json_encode(['success' => true]);
	}
}
