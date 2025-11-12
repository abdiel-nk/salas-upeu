<?php
error_reporting(0);
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `maniquie_all` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Actualizar ": "Registrar Nuevo " ?> Maniquie</h3>
	</div>
	<div class="card-body">
		<form action="" id="assembly-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="codigo" class="control-label">Codigo</label>
                <input name="codigo" id="" class="form-control form no-resize" value="<?php echo isset($codigo) ? $codigo : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="maniquie" class="control-label">Maniquie</label>
                <input name="maniquie" id="" class="form-control form no-resize" value="<?php echo isset($maniquie) ? $maniquie : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="fcompra" class="control-label">Fecha de Compra</label>
                <input name="fcompra" type="date" id="" class="form-control form no-resize" value="<?php echo isset($fcompra) ? $fcompra : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="tmantenimiento" class="control-label">Tipo Mantenimiento</label>
                <select name="tmantenimiento" id="" class="form-control form no-resize">
                	<option value="<?php echo ($tmantenimiento) ?>"><?php echo ($tmantenimiento) ?></option>
					<option value="Ultimo" <?php echo isset($tmantenimiento) && $tmantenimiento == 1 ? "selected" : "" ?>>Ultimo</option>
					<option value="Preventivo" <?php echo isset($tmantenimiento) && $tmantenimiento == 2 ? "selected" : "" ?>>Preventivo</option>
					<option value="Proximo" <?php echo isset($tmantenimiento) && $tmantenimiento == 3 ? "selected" : "" ?>>Proximo</option>
					
				</select>
			</div>
			<div class="form-group">
				<label for="fmantenimiento" class="control-label">Fecha de Mantenimiento</label>
                <input name="fmantenimiento" type="date" id="" class="form-control form no-resize" value="<?php echo isset($fmantenimiento) ? $fmantenimiento : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="condicion" class="control-label">Condición</label>
                <input name="condicion" id="" class="form-control form no-resize" value="<?php echo isset($condicion) ? $condicion : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="observacion" class="control-label">Observación</label>
                <input name="observacion" id="" class="form-control form no-resize" value="<?php echo isset($observacion) ? $observacion : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="estado" class="control-label">Estado</label>
                <select name="estado" id="" class="form-control form no-resize">
                	<option value="<?php echo ($estado) ?>"><?php echo ($estado) ?></option>
					<option value="Nuevo" <?php echo isset($estado) && $estado == 1 ? "selected" : "" ?>>Nuevo</option>
					<option value="Usado" <?php echo isset($estado) && $estado == 2 ? "selected" : "" ?>>Usado</option>
					<option value="Reparado" <?php echo isset($estado) && $estado == 3 ? "selected" : "" ?>>Reparado</option>
					
				</select>
			</div>
            <div class="form-group">
				<label for="cantidad" class="control-label">cantidad</label>
                <input name="cantidad" id="" class="form-control form no-resize" value="<?php echo isset($cantidad) ? $cantidad : ''; ?>" />
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
				url:_base_url_+"classes/Master.php?f=save_maniquie",
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
						location.href = "./?page=maniquie_all";
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