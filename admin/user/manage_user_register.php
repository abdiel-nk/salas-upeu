<?php
error_reporting(0);
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `users` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title"><?php echo isset($id) ? "Actualizar ": "Registrar Nuevo " ?> Insumo</h3>
	</div>
	<div class="card-body">
		<form action="" id="assembly-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="firstname" class="control-label">Nombres</label>
                <input name="firstname" id="" class="form-control form no-resize" value="<?php echo isset($firstname) ? $firstname : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="lastname" class="control-label">Apellidos</label>
                <input name="lastname" id="" class="form-control form no-resize" value="<?php echo isset($lastname) ? $lastname : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="username" class="control-label">Usuario</label>
                <input name="username"  id="" class="form-control form no-resize" value="<?php echo isset($username) ? $username : ''; ?>" />
			</div>
			<div class="form-group">
				<label for="password" class="control-label">Password</label>
                <input name="password" id="password" class="form-control form no-resize" value="<?php echo isset ($password) ? $password : ''; ?>" />
			</div>
			<div class="form-group">
					<label for="" class="control-label">Avatar</label>
					<div class="custom-file">
		              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
		              <label class="custom-file-label" for="customFile">Escoge Archivo</label>
		            </div>
				</div>
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="assembly-form">Guardar</button>
		<a class="btn btn-flat btn-default" href="?page=manage_user_register">Cancelar</a>
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
				url:_base_url_+"classes/Master.php?f=save_user",
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
						location.href = "./?page=user";
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