<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			if(isset($sql))
			$resp['sql'] = $sql;
			return json_encode($resp);
			exit;
		}
	}
	function save_assembly(){
		extract($_POST);
		$data = "";
		$_POST['description'] = addslashes(htmlentities($_POST['description']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `assembly_hall` where `room_name` = '{$room_name}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Assembly Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `assembly_hall` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `assembly_hall` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_assembly_hall(){
		$sql = "DELETE FROM `assembly_hall` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}

	function save_schedule(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		if(strtotime($datetime_end) < strtotime($datetime_start)){
			$resp['status'] = 'failed';
			$resp['err_msg'] = "Date and Time Schedule is Invalid.";
		}else{
			$d_start = strtotime($datetime_start);
			$d_end = strtotime($datetime_end);
			$chk = $this->conn->query("SELECT * FROM `schedule_list` where (('{$d_start}' Between unix_timestamp(datetime_start) and unix_timestamp(datetime_end)) or ('{$d_end}' Between unix_timestamp(datetime_start) and unix_timestamp(datetime_end))) ".(($id > 1) ? " and id !='{$id}' " : ""))->num_rows;
			if($chk > 1){
				$resp['status'] = 'failed';
				$resp['err_msg'] = "The schedule is conflict with other schedules.";
			}else{
				if(empty($id)){
					$sql = "INSERT INTO `schedule_list` set {$data}";
				}else{
					$sql = "UPDATE `schedule_list` set {$data} where id = '{$id}'";
				}
				$save = $this->conn->query($sql);
				if($save){
					$resp['status'] = 'success';
					$this->settings->set_flashdata('success', " Schedule successfully saved.");
				}else{
					$resp['status'] = 'failed';
					$resp['sql'] = $sql;
					$resp['qry_error'] = $this->conn->error;
					$resp['err_msg'] = "There's an error while submitting the data.";
				}
			}
		}
		return json_encode($resp);
	}
	function delete_sched(){
		extract($_POST);
		$delete = $this->conn->query("DELETE FROM `schedule_list` where id = '{$id}'");
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Schedule successfully deleted.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

function save_maniquie(){
		extract($_POST);
		$data = "";
		$_POST['codigo'] = addslashes(htmlentities($_POST['codigo']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `maniquie_all` where `codigo` = '{$codigo}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Assembly Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `maniquie_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `maniquie_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_maniquie_all(){
		$sql = "DELETE FROM `maniquie_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}

	function save_insumo(){
		extract($_POST);
		$data = "";
		$_POST['serie'] = addslashes(htmlentities($_POST['serie']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `insumo_all` where `serie` = '{$serie}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Insumo Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `insumo_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `insumo_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_insumo_all(){
		$sql = "DELETE FROM `insumo_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Insumo Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}

	function save_especialidad(){
		extract($_POST);
		$data = "";
		$_POST['especialidad'] = addslashes(htmlentities($_POST['especialidad']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `especialidad_all` where `especialidad` = '{$especialidad}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Insumo Hall/Esa especialidad Existe.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `especialidad_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `especialidad_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_especialidad_all(){
		$sql = "DELETE FROM `especialidad_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Insumo Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}


	function save_docentes(){
		extract($_POST);
		$data = "";
		$_POST['dni'] = addslashes(htmlentities($_POST['dni']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `docentes_all` where `dni` = '{$dni}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Docentes Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `docentes_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `docentes_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_docentes_all(){
		$sql = "DELETE FROM `docentes_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Insumo Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}


	function save_coordinador(){
		extract($_POST);
		$data = "";
		$_POST['dni'] = addslashes(htmlentities($_POST['dni']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `coordinador_all` where `dni` = '{$dni}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Coordinador Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `coordinador_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `coordinador_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_coordinador_all(){
		$sql = "DELETE FROM `coordinador_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Coordinador Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}

	function save_incidencias(){
		extract($_POST);
		$data = "";
		$_POST['id'] = addslashes(htmlentities($_POST['id']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}
		$check = $this->conn->query("SELECT * FROM `incidentes_all` where `id` = '{$id}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Incidencia Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `incidentes_all` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `incidentes_all` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_incidencias_all(){
		$sql = "DELETE FROM `incidentes_all` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Insumo Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}


	function save_user(){
		extract($_POST);
		$data = "";
		$_POST['id'] = addslashes(htmlentities($_POST['id']));
		foreach($_POST as $k=> $v){
			if($k != 'id'){
				if(!empty($data)) $data.=", ";
				$data.=" {$k} = '{$v}'";
			}
		}

		$check = $this->conn->query("SELECT * FROM `users` where `id` = '{$id}' ".(!empty($id) ? "and id != {$id}" : ''))->num_rows;
		$this->capture_err();
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Incidencia Hall/Room Already Exists.";
		}else{
			if(empty($id)){
				$sql = "INSERT INTO `users` set $data";
				$save = $this->conn->query($sql);
			}else{
				$sql = "UPDATE `users` set $data where id = {$id}";
				$save = $this->conn->query($sql);
			}
			$this->capture_err();

			if($save){
				$resp['status'] = "success";
				$this->settings->set_flashdata('success'," Assembly Hall/Room Successfully Saved");
			}else{
				$resp['status'] = "failed";
				$resp['sql'] = $sql;
			}
		}
		return json_encode($resp);
	}

	function delete_user(){
		$sql = "DELETE FROM `users` where id = '{$_POST['id']}' ";
		$delete = $this->conn->query($sql);
		$this->capture_err();
		if($delete){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success'," Insumo Hall/Room Successfully Deleted");
		}else{
			$resp['status'] = "failed";
			$resp['sql'] = $sql;
		}
		return json_encode($resp);
	}





	
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_assembly':
		echo $Master->save_assembly();
	break;
	case 'delete_assembly_hall':
		echo $Master->delete_assembly_hall();
	break;
	case 'save_schedule':
		echo $Master->save_schedule();
	break;
	case 'delete_sched':
		echo $Master->delete_sched();
	break;
	case 'save_maniquie':
		echo $Master->save_maniquie();
	break;
	case 'delete_maniquie_all':
		echo $Master->delete_maniquie_all();
	break;
	case 'save_insumo':
		echo $Master->save_insumo();
	break;
	case 'delete_insumo_all':
		echo $Master->delete_insumo_all();
	break;
	case 'save_especialidad':
		echo $Master->save_especialidad();
	break;
	case 'delete_especialidad_all':
		echo $Master->delete_especialidad_all();
	break;
	case 'save_docentes':
		echo $Master->save_docentes();
	break;
	case 'delete_docentes_all':
		echo $Master->delete_docentes_all();
	break;
	case 'save_coordinador':
		echo $Master->save_coordinador();
	break;
	case 'delete_coordinador_all':
		echo $Master->delete_coordinador_all();
	break;
	case 'save_incidencias':
		echo $Master->save_incidencias();
	break;
	case 'delete_incidencias_all':
		echo $Master->delete_incidencias_all();
	break;
	case 'save_user':
		echo $Master->save_user();
	break;
	case 'delete_user':
		echo $Master->delete_user();
	break;
	default:
		// echo $sysset->index();
		break;
}