<?php
require_once('../../config.php');

if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT s.*,a.room_name FROM `schedule_list` s inner join assembly_hall a on a.id = s.assembly_hall_id where s.id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
    }
}
?>
<style>
#uni_modal .modal-content>.modal-footer{
    display:none;
}
#uni_modal .modal-body{
    padding:0 !important;
}
</style>
<div class="container-fluid p-2">
    <p><b>Coordinador(a):</b> <?php echo $room_name ?></p>
    <p><b>Docente:</b> <?php echo ucwords($reserved_by) ?></p>
    <p><b>Especialidad:</b> <?php echo ucwords($especialidad) ?></p>
    <p><b>Ciclo:</b> <?php echo ucwords($ciclo) ?></p>
    <p><b>Fecha/Hora Inicio:</b> <?php echo date("M d, Y h:i A",strtotime($datetime_start)) ?></p>
    <p><b>Fecha/Hora Fin:</b> <?php echo date("M d, Y h:i A",strtotime($datetime_end)) ?></p>
    <p><b>Aula:</b> <?php echo ucwords($aula) ?></p>
    <p><b>Taller:</b> <?php echo ucwords($taller) ?></p>
    <p><b>N° Alumnos:</b> <?php echo ucwords($participantes) ?></p>
    <p><b>Insumos:</b><br> <span><?php echo $schedule_remarks ?></span></p>
    <p><b>Almuerzo/Pasaje:</b><br> <span><?php echo $presupuesto ?></span></p>
    <p><b>TI Soporte:</b><br> <span><?php echo $soporte ?></span></p>

</div>
<div class="modal-footer">
    <button type="button" id="update" class="btn btn-primary btn-flat" data-id="<?php echo $_GET['id'] ?>">Editar</button>
    <button type="button" id="delete" class="btn btn-danger btn-flat" data-id="<?php echo $_GET['id'] ?>">Eliminar</button>
    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cerrar</button>
</div>
<script>
    $(function(){
        $('#update').click(function(){
            uni_modal("Editar Reserva","schedules/edit_schedule.php?id=<?php echo $_GET['id'] ?>")
        })
        $('#delete').click(function(){
			_conf("¿Estás segura de eliminar este taller de forma permanente?","delete_sched",[$(this).attr('data-id')])
		})
    })
    function delete_sched($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_sched",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
</script>
