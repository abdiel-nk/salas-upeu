<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Lista de Salas</h3>
		<div class="card-tools">
			<a href="?page=assembly_hall/manage_assembly" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Crear Nueva</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="2%">
					<col width="15%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="4%">
					<col width="5%">
					<col width="10%">
					<col width="5%">
					<col width="3%">
					<col width="3%">
				</colgroup>
				<thead>
					<tr>
						<th>N°</th>
						<th>Fecha</th>
						<th>Hora Ini</th>
						<th>Hora Fin</th>
						<th>Tiempo</th>
						<th>Taller</th>
						<th>Unidad</th>
						<th>Escuela</th>
						<th>Docente</th>
						<th>Participantes</th>
						<th>Estado</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `assembly_hall` order by `room_name` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['fecha'] ?></td>
							<td><?php echo $row['hinicio'] ?></td>
							<td><?php echo $row['hfinal'] ?></td>
							<td><?php echo $row['tiempo'] ?></td>
							<td><?php echo $row['taller'] ?></td>
							<td><?php echo $row['room_name'] ?></td>
							<td><?php echo $row['escuela'] ?></td>
							<td><?php echo $row['location'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td class="text-center">
								<?php 
								switch($row['status']):
									case '1':
										echo '<span class="badge badge-success">Libre</span>';
									break;
									case '0':
										echo '<span class="badge badge-danger">Ocupado</span>';
									break;
									case '2':
										echo '<span class="badge badge-yellow">Reservado</span>';
									break;
								endswitch;
								?>
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Acción
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=assembly_hall/manage_assembly&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Asignar Sala</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item" href="?page=incidencias_all/manage_incidencias&id=<?php echo $row['id'] ?>"><span class="fa fa-exclamation-triangle text-primary"></span> Insidencia</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Eliminar</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("¿Estás segur@ de eliminar esta Sala?","delete_assembly_hall",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_assembly_hall($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_assembly_hall",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("Ocurrió un error.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("Ocurrió un error.",'error');
					end_loader();
				}
			}
		})
	}
</script>