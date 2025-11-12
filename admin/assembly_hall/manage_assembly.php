<?php
error_reporting(0);
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `assembly_hall` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Actualizar ": "Crear Nueva " ?> Sala</h3>
	</div>
	<div class="card-body">
		<form action="" id="assembly-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="fecha" class="control-label">Fecha</label>
                <input name="fecha" type="date" id="fecha" class="form-control form no-resize" value="<?php echo isset($fecha) ? $fecha : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="hinicio" class="control-label">Hora Inicio</label>
                <input name="hinicio" type="time" id="hinicio" class="form-control form no-resize" value="<?php echo isset($hinicio) ? $hinicio : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="hfinal" class="control-label">Hora Final</label>
                <input name="hfinal" type="time" id="hfinal" class="form-control form no-resize" value="<?php echo isset($hfinal) ? $hfinal : ''; ?>" />
			</div>
			<div class="form-group">

              
                <input name="tiempo" type="hidden" id="tiempo" class="form-control form no-resize" value="<?php
$hora1 = $hinicio;
$hora2 = $hfinal;
$datex7 = new DateTime($hora2);
$datex77 = new DateTime($hora1);
$horax7 = date_diff($datex7, $datex77);
echo $hx7x7 = $horax7->format('%H:%i:%S'); 

                 ?>"/>


			</div>
			<div class="form-group">
				<label for="taller" class="control-label">Taller</label>
                <input name="taller" id="" class="form-control form no-resize" value="<?php echo isset($taller) ? $taller : ''; ?>" />
			</div>
			<div class="form-group">
			<label for="room_name" class="control-label">Unidad</label>
			<select name="room_name" id="" class="custom-select select2" >
                		<option value="<?php echo ($room_name) ?>"><?php echo ($room_name) ?></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `coordinador_all` order by `nombre` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
									<option value="<?php echo $row['nombre'],"&nbsp;", $row['apellidos']?>"><?php echo $row['nombre'],"&nbsp;", $row['apellidos'] ?></option>
									<?php endwhile; ?> 
								</select>
			</div>
			<div class="form-group">
				<label for="escuela" class="control-label">Escuela</label>
                <input name="escuela" id="" class="form-control form no-resize" value="<?php echo isset($escuela) ? $escuela : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="location" class="control-label">Docente</label>
                <select name="location" id="" class="custom-select select2" >
                		<option value="<?php echo ($location) ?>"><?php echo ($location) ?></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `docentes_all` order by `nombre` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
									<option value="<?php echo $row['nombre'],"&nbsp;", $row['apellidos']?>"><?php echo $row['nombre'] ?></option>
									<?php endwhile; ?> 
								</select>
			</div>
			<div class="form-group">
				<label for="description" class="control-label">Participantes</label>
                <input name="description" id="" class="form-control form no-resize" value="<?php echo isset($description) ? $description : ''; ?>" />
			</div>
            <div class="form-group">
				<label for="status" class="control-label">Estado</label>
               	<select name="status" id="status" class="custom-select">
               		<option value="<?php echo  ($status) ?>"><?php echo  ($status) ?></option>
					   <option value="1" <?php echo isset($status) && $status == 1 ? "selected" : "" ?>>Libre</option>
					   <option value="0" <?php echo isset($status) && $status == 0 ? "selected" : "" ?>>Ocupado</option>
					   <option value="2" <?php echo isset($status) && $status == 2 ? "selected" : "" ?>>Reservado</option>
				   </select>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="assembly-form">Guardar</button>
		<a class="btn btn-flat btn-default" href="?page=assembly_hall">Cancelar</a>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#assembly-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_assembly",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("Ocurrió un error",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=assembly_hall";
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                            end_loader()
                    }else{
						alert_toast("Ocurrió un error",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})

	})
</script>