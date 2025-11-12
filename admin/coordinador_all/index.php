<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Lista de Coordinadores</h3>
		<div class="card-tools">
			<a href="?page=coordinador_all/manage_coordinador" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Crear Nueva</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="2%">
					<col width="3%">
					<col width="9%">
					<col width="9%">
					<col width="5%">
					<col width="5%">
					<col width="4%">
				</colgroup>
				<thead>
					<tr>
						<th>N°</th>
						<th>DNI/PASAPORTE</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Telefono</th>
						<th>Grado</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `coordinador_all` order by `dni` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['dni'] ?></td>
							<td><?php echo $row['nombre'] ?></td>
							<td><?php echo $row['apellidos'] ?></td>
							<td><?php echo $row['telefono'] ?></td>
							<td><?php echo $row['grado'] ?></td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Acción
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=coordinador_all/manage_coordinador&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar</a>
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
			_conf("¿Estás segur@ de eliminar coordinador?","delete_coordinador_all",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_insumo_all($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_coordinador_all",
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