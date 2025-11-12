<?php
error_reporting(0);
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `incidentes_all` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Actualizar ": "Registrar Nuevo " ?> Incidente</h3>
	</div>
	<div class="card-body">
		<form action="" id="assembly-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="fechain" class="control-label">Fecha Incidente</label>
                <input name="fechain" type="datetime-local" id="" class="form-control form no-resize" value="<?php echo isset($fechain) ? $fechain : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="laboratorio" class="control-label">Coordinador(a)</label>
				<select name="laboratorio" id="" class="custom-select select2" >
                					<option value="<?php echo ($num_rows) ?>"><?php echo ($num_rows) ?></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `coordinador_all` order by `nombre` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
									<option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
									<?php endwhile; ?> 
								</select>
			</div>
			<div class="form-group">
				<label for="docente" class="control-label">Docente</label>
                <select name="docente" id="" class="custom-select select2" >
                					<option value="<?php echo ($docente) ?>"><?php echo ($docente) ?></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `docentes_all` order by `nombre` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
									<option value="<?php echo $row['nombre'],"&nbsp;", $row['apellidos']?>"><?php echo $row['nombre'],"&nbsp;", $row['apellidos']?></option>
									<?php endwhile; ?> 
								</select>
			</div>
			<div class="form-group">
				<label for="producto" class="control-label">Producto</label>
                <select name="producto" id="" class="custom-select select2" >
                				<option value="<?php echo ($producto) ?>"><?php echo ($producto) ?>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `maniquie_all` order by `maniquie` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
									<option value="<?php echo $row['maniquie'] ?>"><?php echo $row['maniquie'] ?></option>
									<?php endwhile; ?> 
								</select>
			</div>
			 <div class="form-group">
				<label for="status" class="control-label">Estado</label>
               	<select name="estado" id="estado" class="custom-select">
               		<option value="<?php echo  ($estado) ?>"><?php echo  ($estado) ?></option>
					   <option value="1" <?php echo isset($estado) && $estado == 1 ? "selected" : "" ?>>Resuelto</option>
					   <option value="0" <?php echo isset($estado) && $estado == 0 ? "selected" : "" ?>>No resolver</option>
					   <option value="2" <?php echo isset($estado) && $estado == 2 ? "selected" : "" ?>>Por resolver</option>
				   </select>
			</div>
			<div class="form-group">
				<label for="observacion" class="control-label">Incidencia</label>
                <textarea rows="3" name="observacion" id="" class="form-control form no-resize" value="<?php echo  ($observacion) ?>"><?php echo  ($observacion) ?></textarea>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="assembly-form">Guardar</button>
		<a class="btn btn-flat btn-default" href="?page=incidencias_all">Cancelar</a>
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
				url:_base_url_+"classes/Master.php?f=save_incidencias",
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
						location.href = "./?page=incidencias_all";
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