<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>

<?php endif;?>
<?php
	
	include("maniquie_all/agregar_stock.php");
	include("maniquie_all/eliminar_stock.php");
	
	?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Lista de Maniquies</h3>
		<div class="card-tools">
			<a href="?page=maniquie_all/manage_maniquie" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Crear Nueva</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped">
				<colgroup>
					<col width="2%">
					<col width="8%">
					<col width="10%">
					<col width="10%">
					<col width="4%">
					<col width="10%">
					<col width="7%">
					<col width="10%">
					<col width="10%">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>N°</th>
						<th>Codigo</th>
						<th>Maniquie</th>
						<th>Fecha de Compra</th>
						<th>Tipo Mantenimiento</th>
						<th>Fecha Mantenimiento</th>
						<th>Condición</th>
						<th>Observación</th>
						<th>Estado de Equipo</th>
						<th>Cantidad</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT * from `maniquie_all` order by `maniquie` asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['codigo'] ?></td>
							<td><?php echo $row['maniquie'] ?></td>
							<td><?php echo $row['fcompra'] ?></td>
							<td><?php echo $row['tmantenimiento'] ?></td>
							<td><?php echo $row['fmantenimiento'] ?></td>
							<td><?php echo $row['condicion'] ?></td>
							<td><?php echo $row['observacion'] ?></td>
							<td><?php echo $row['estado'] ?></td>
							<td><?php echo $row['cantidad'] ?></td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Acción
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item" href="?page=maniquie_all/manage_maniquie&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#add-stock"><span class="fa fa-edit text-primary"></span> Cargar</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#remove-stock"><span class="fa fa-edit text-primary"></span> Descargar</a>
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
			_conf("¿Estás segur@ de eliminar este Producto?","delete_maniquie_all",[$(this).attr('data-id')])
		})
		$('.table').dataTable();
	})
	function delete_maniquie_all($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_maniquie_all",
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