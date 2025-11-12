<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Reporte de Evidencias</h3>
		<div class="card-tools">
			<a href="?page=incidencias_all/manage_incidencias" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Crear Nueva</a>
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
					<col width="4%">
					<col width="15%">
					<col width="10%">
					<col width="8%">
				<thead>
					<tr>
						<th>N°</th>
						<th>Fecha Taller</th>
						<th>Coordinador(a)</th>
						<th>Docente</th>
						<th>Especialidad</th>
						<th>Evidencia</th>
						<th>Estado Taller</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `incidentes_all` order by `laboratorio` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['fechain'] ?></td>
							<td><?php echo $row['laboratorio'] ?></td>
							<td><?php echo $row['docente'] ?></td>
							<td><?php echo $row['producto'] ?></td>
							<td><?php echo $row['observacion'] ?></td>
							<td class="text-center">
								<?php 
								switch($row['estado']):
									case '1':
										echo '<span class="badge badge-success">Realizado</span>';
									break;
									case '0':
										echo '<span class="badge badge-danger">No realizado</span>';
									break;
									case '2':
										echo '<span class="badge badge-yellow">Programado</span>';
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
				                    <a class="dropdown-item" href="?page=incidencias_all/manage_incidencias&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar</a>
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
			_conf("¿Estás segur@ de eliminar este Incidente?","delete_incidencias_all",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_incidencias_all($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_incidencias_all",
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