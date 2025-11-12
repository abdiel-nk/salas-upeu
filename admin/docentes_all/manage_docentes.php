<?php
error_reporting(0);
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `docentes_all` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Actualizar ": "Registrar Nuevo " ?> Docente</h3>
	</div>
	<div class="card-body">
		<form action="" id="assembly-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="dni" class="control-label">DNI / PASPORT</label>
                <input name="dni" id="" class="form-control form no-resize" value="<?php echo isset($dni) ? $dni : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="nombre" class="control-label">Nombre</label>
                <input name="nombre" id="" class="form-control form no-resize" value="<?php echo isset($nombre) ? $nombre : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="apellidos" class="control-label">Apellidos</label>
                <input name="apellidos"  id="" class="form-control form no-resize" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="correo" class="control-label">Correo</label>
                <input name="correo" type="email" id="" class="form-control form no-resize" value="<?php echo isset($correo) ? $correo : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="telefono" class="control-label">Telefono</label>
                <input name="telefono" type="telefono" id="" class="form-control form no-resize" value="<?php echo isset($telefono) ? $telefono : ''; ?>" />
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="assembly-form">Guardar</button>
		<a class="btn btn-flat btn-default" href="?page=docentes_all">Cancelar</a>
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
				url:_base_url_+"classes/Master.php?f=save_docentes",
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
						location.href = "./?page=docentes_all";
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