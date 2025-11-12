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
    <form action="" id="edit_sched">
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <div class="form-group">
            <label for="assembly_hall_id" class="control-label">Coordinador(a)</label>
            <select name="assembly_hall_id" id="assembly_hall_id" class="custom-select select2" required>
                <option value=""></option>
                <?php 
                $hall_qry = $conn->query("SELECT * FROM `assembly_hall` where status =1  order by `room_name` asc");
                while($row = $hall_qry->fetch_assoc()):
                ?>
                    <option value="<?php echo $row['id'] ?>" <?php echo isset($assembly_hall_id) && $assembly_hall_id == $row['id'] ? "selected" : "" ?>><?php echo $row['room_name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="reserved_by" class="control-label">Docente:</label>
            <select name="reserved_by" id="" class="custom-select select2" >
                <option value="<?php echo ($reserved_by) ?>"><?php echo ($reserved_by) ?></option>
                    <?php 
                    $hall_qry = $conn->query("SELECT * FROM `docentes_all` order by `nombre`,'apellidos' asc");
                    while($row = $hall_qry->fetch_assoc()):
                    ?>
                        <option value="<?php echo $row['nombre'],"&nbsp;", $row['apellidos'] ?>" <?php echo isset($reserved_by) && $reserved_by == $row['nombre'] ? "selected" : "" ?>><?php echo $row['nombre'],"&nbsp;", $row['apellidos'] ?></option>
                        <?php endwhile; ?>
                    </select>

        <div class="form-group">
            <label for="especialidad" class="control-label">Especialidad:</label>
            <select name="especialidad" id="" class="form-control form no-resize">
               <option value="<?php echo ($especialidad) ?>"><?php echo ($especialidad) ?></option>
                    <?php 
                    $hall_qry = $conn->query("SELECT * FROM `especialidad_all` order by `especialidad` asc");
                    while($row = $hall_qry->fetch_assoc()):
                    ?>
                        <option value="<?php echo $row['especialidad'] ?>" <?php echo isset($reserved_by) && $reserved_by == $row['especialidad'] ? "selected" : "" ?>><?php echo $row['especialidad'] ?></option>
                        <?php endwhile; ?>
            </select>

        <div class="form-group">
            <label for="ciclo" class="control-label">Ciclo:</label>
            <select name="ciclo" id="" class="form-control form no-resize">
                <option value="<?php echo ($ciclo) ?>"><?php echo ($ciclo) ?></option>
                <option value="Ciclo I" <?php echo isset($ciclo) && $ciclo == 1 ? "selected" : "" ?>>Ciclo I</option>
                <option value="Ciclo II" <?php echo isset($ciclo) && $ciclo == 2 ? "selected" : "" ?>>Ciclo II</option>
                <option value="Ciclo III" <?php echo isset($ciclo) && $ciclo == 3 ? "selected" : "" ?>>Ciclo III</option>
            </select>
            
        </div>
        <div class="form-group">
            <label for="datetime_start" class="control-label">Fecha Inicio:</label>
            <input type="datetime-local" class="form-control" name="datetime_start" value="<?php echo isset($datetime_start) ? date("Y-m-d\TH:i",strtotime($datetime_start)) : "" ?>" id="datetime_start">
        </div>
        <div class="form-group">
            <label for="datetime_end" class="control-label">Fecha Fin:</label>
            <input type="datetime-local" class="form-control" name="datetime_end" value="<?php echo isset($datetime_end) ? date("Y-m-d\TH:i",strtotime($datetime_end)) : "" ?>" id="datetime_end">
        </div>
        <div class="form-group">
            <label for="aula" class="control-label">Aula:</label>
            <select name="aula" id="" class="form-control form no-resize">
                <option value="<?php echo ($aula) ?>"><?php echo ($aula) ?></option>
                <option value="Aula 804" <?php echo isset($aula) && $aula == 1 ? "selected" : "" ?>>Aula 804</option>
                <option value="Aula 801" <?php echo isset($aula) && $aula == 2 ? "selected" : "" ?>>Aula 801</option>
                <option value="Aula 702" <?php echo isset($aula) && $aula == 3 ? "selected" : "" ?>>Aula 702</option>
                <option value="Aula 404" <?php echo isset($aula) && $aula == 4 ? "selected" : "" ?>>Aula 404</option>
                <option value="Aula 403 " <?php echo isset($aula) && $aula == 5 ? "selected" : "" ?>>Aula 403</option>
            </select>
            
        </div>
        <div class="form-group">
            <label for="taller" class="control-label">Taller:</label>
            <input type="text" class="form-control" name="taller" id="taller" value="<?php echo isset($taller) ? $taller : "" ?>">
        </div>
        <div class="form-group">
            <label for="participantes" class="control-label">N° Alumnos:</label>
            <input type="text" class="form-control" name="participantes" id="participantes" value="<?php echo isset($participantes) ? $participantes : "" ?>">
        </div>
        <div class="form-group">
            <label for="schedule_remarks" class="control-label">Insumos:</label>
            <textarea onkeydown="pulsar(event)" maxlength="500" rows="3" class="form-control" name="schedule_remarks" id="schedule_remarks"><?php echo isset($schedule_remarks) ? $schedule_remarks : "" ?></textarea>
        </div>
        <div class="form-group">
            <label for="schedule_remarks" class="control-label form ">Almuerzo/Pasaje:</label>
            <input type="number" class="form-control" name="presupuesto" id="presupuesto" value="<?php echo isset($presupuesto) ? $presupuesto : "" ?>">

        </div>
        <div class="form-group">
            <label for="ciclo" class="control-label">TI Soporte:</label>
            <select name="soporte" id="" class="form-control form no-resize">
                <option value="<?php echo ($soporte) ?>"><?php echo ($soporte) ?></option>
                <option value="Ing Maicol Ayala Poma P/A S/54.00" <?php echo isset($soporte) && $soporte == 1 ? "selected" : "" ?>>Ing. Willy Medina Bacalla P/A S/54.00</option>
                <option value="Ing Willy Medina Bacalla P/A S/54.00" <?php echo isset($soporte) && $soporte == 2 ? "selected" : "" ?>>Ing. Abdiel Mamani Simeon P/A S/54.00</option>
            </select>
            
        </div>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-flat btn-primary mr-2" form="edit_sched">Update</button>
    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Close</button>
</div>
<script>
    $(function(){
        $('#edit_sched').submit(function(e){
			e.preventDefault()
			start_loader()
			$('#edit_sched .err-msg').remove()
			$.ajax({
				url:_base_url_+'classes/Master.php?f=save_schedule',
				method:"POST",
				data: $(this).serialize(),
				dataType:"json",
				error:err=>{
					console.log(err)
					end_loader()
					alert_toast("An error occured","error");
				},
				success:function(resp){
					if(resp.status == 'success'){
						location.reload()
					}else if(resp.status == 'failed' && !!resp.err_msg){
						var el = $('<div class="err-msg alert alert-danger mb-1">')
							el.text(resp.err_msg)
						$('#edit_sched').prepend(el)
							el.show('slow')
					}else{
						console.log(resp)
						alert_toast("An error occured","error");
					}
					end_loader();
				}
			})
		})
        $('#uni_modal').on('hidden.bs.modal',function(){
            if($(this).find('form#edit_sched').length > 0)
            uni_modal("Reserva de Laboratorio","schedules/view_details.php?id=<?php echo $_GET['id'] ?>")
        })
    })
</script>
