<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<style>
#selectAll{
	top:0
}
</style>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><strong>Reservar Sala</strong></h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<div class="row">
				<div class="col-md-8">
					<div id="calendar"></div>
				</div>
				<div class="col-md-4">
					<div class="callout border-0">
						<h5><b>Registrar Horario Taller</b></h5>
						<hr>
						<form action="" id="add_sched">
							<input type="hidden" name="id" value="">
							<div class="form-group">
								<label for="assembly_hall_id" class="control-label">Seleccionar Coordinador</label>
								<select name="assembly_hall_id" id="assembly_hall_id" class="custom-select select2" >
									<option value=""></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `assembly_hall` where status =1  order by `room_name` asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['room_name'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="reserved_by" class="control-label">Seleccionar Docente:</label>
								
								<select name="reserved_by" id="reserved_by_id" class="custom-select select2" >
									<option value=""></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `docentes_all` order by 'nombre','apellidos' asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
										<option value="<?php echo $row['nombre'],"&nbsp;", $row['apellidos']?>"><?php echo $row['nombre'],"&nbsp;", $row['apellidos'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="especialidad" class="control-label">Seleccionar Especialidad:</label>
								<select name="especialidad" id="especialidad" class="custom-select select2" >
									<option value=""></option>
									<?php 
									$hall_qry = $conn->query("SELECT * FROM `especialidad_all` order by 'especialidad' asc");
									while($row = $hall_qry->fetch_assoc()):
									?>
										<option value="<?php echo $row['especialidad']?>"><?php echo $row['especialidad'] ?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="ciclo" class="control-label">Ciclo:</label>
								<select name="ciclo" id="" class="form-control form no-resize">
										<option disabled selected>Selecciona una opción</option>
										<option value="Ciclo I" <?php echo isset($ciclo) && $ciclo == 1 ? "selected" : "" ?>>Ciclo I</option>
										<option value="Ciclo II" <?php echo isset($ciclo) && $ciclo == 2 ? "selected" : "" ?>>Ciclo II</option>
										<option value="Ciclo III" <?php echo isset($ciclo) && $ciclo == 3 ? "selected" : "" ?>>Ciclo III</option>
								</select>
							</div>
							<div class="form-group">
								<label for="datetime_start" class="control-label">Desde:</label>
								<input type="datetime-local" class="form-control" name="datetime_start" id="datetime_start">
							</div>
							<div class="form-group">
								<label for="datetime_end" class="control-label">Hasta:</label>
								<input type="datetime-local" class="form-control" name="datetime_end" id="datetime_end">
							</div>
							<div class="form-group">
								<label for="aula" class="control-label">Aula:</label>
								<select name="aula" id="" class="form-control form no-resize">
									<option disabled selected>Selecciona una opción</option>
									<option value="Aula 804" <?php echo isset($aula) && $aula == 1 ? "selected" : "" ?>>Aula 804</option>
									<option value="Aula 801" <?php echo isset($aula) && $aula == 2 ? "selected" : "" ?>>Aula 801</option>
									<option value="Aula 702" <?php echo isset($aula) && $aula == 3 ? "selected" : "" ?>>Aula 702</option>
									<option value="Aula 404" <?php echo isset($aula) && $aula == 4 ? "selected" : "" ?>>Aula 404</option>
									<option value="Aula 403 " <?php echo isset($aula) && $aula == 5 ? "selected" : "" ?>>Aula 403</option>
								</select>
							</div>
							<div class="form-group">
								<label for="taller" class="control-label">Nombre de taller:</label>
								<input type="text" class="form-control" name="taller" placeholder="Nombre de Taller" id="taller">
							</div>
							<div class="form-group">
								<label for="participantes" class="control-label">N° Alumnos:</label>
								<input type="number" class="form-control" name="participantes" placeholder="Ingrese N° participantes" id="taller">
							</div>
							<div class="form-group">
								<label for="schedule_remarks" class="control-label">Materiales:</label>

								<div>
									<label for="">N°</label>
									<input type="text" class="" id="n-materiales">
									<select name="" id="select-materiales" class="form-control">
										<option value="Maniquie"> Maniquies </option>
										<option value="Maniquie"> Guantes </option>
										<option value="Maniquie"> Tubos endotraqueales </option>
										<option value="Maniquie"> Jeringas </option>
										<option value="Maniquie"> Gorras descartables </option>

									</select>
								</div>
								<button id="addmateriales">+</button>
								

								<textarea onkeydown="pulsar(event)" maxlength="500" rows="5" placeholder="Ingrese materiales para taller."  class="form-control" name="schedule_remarks" id="schedule_remarks" readonly id="list-materiales"></textarea>

								
							</div>

<script>
	
	const selectElement = document.getElementById('select-materiales');
	const listaMateriales= document.getElementById('list-materiales');
	const buttonMateriales = document.getElementById('addmateriales');

	buttonMateriales.addEventListener('click',()=>{
		const selectedOptions = Array.from(selectEle).map(option => option.value);

		if(selectedOptions.length > 0){
			listaMateriales.value = selectedOptions.join(', ');
		}
		else{
			SelectElement.value = '';
		}
	})




	const textarea = document.querySelector("textarea");
	textarea.addEventListener("keyup", e =>{
		textarea.style.height = "63px";
		let scHeight = e.target.scrollHeight;
		textarea.style.height = `${scHeight}px`;
	});

	function pulsar(e) {
	if (e.which === 13 && !e.shiftKey) {
		e.preventDefault();
		console.log('prevented');
	return false;
	}
}
</script>

<style type="text/css">
.wrapper textarea{
	width: 100%;
	resize: none;
	height: 59px;
	outline: none;
	padding: 15px;
	font-size: 16px;
	margin-top: 20px;
	border-radius: 5px;
	max-height: 330px;
	caret-color: #4671EA;
	border: 1px solid #bfbfbf;
	}
	textarea::placeholder{
	color: #b3b3b3;
	}
	textarea:is(:focus, :valid){
	padding: 14px;
	border: 2px solid #4671EA;
	}
	textarea::-webkit-scrollbar{
	width: 0px;
}
    </style>


	<div class="form-group">
		<label for="taller" class="control-label">Almuerzo/Pasaje:</label>
		<input type="text" class="form-control" name="presupuesto" placeholder="S/0.00" id="presupuesto">
	</div>
	<div class="form-group">
		<label for="soporte" class="control-label">TI Soporte:</label>
		<select name="soporte" id="" class="form-control form no-resize">
			<option disabled selected>Selecciona una opción</option>
			<option value="Ing. Maicol Ayala Poma P/A: S/54.00" <?php echo isset($soporte) && $soporte == 1 ? "selected" : "" ?>>Ing. Willy Medina Bacalla P/A: S/54.00</option>
			<option value="Ing. Willy Medinia Bacalla P/A: S/54.00" <?php echo isset($soporte) && $soporte == 2 ? "selected" : "" ?>>Ing. Abdiel Mamani Simeon P/A: S/54.00</option>
		</select>
	</div>
		<div class="form-group">
			<label for="soporte" class="control-label">Auxiliar Limpieza:</label>
			<select name="soporte" id="" class="form-control form no-resize">
				<option disabled selected>Selecciona una opción</option>
				<option value="Hno. Carlos García Paitan P/A: S/54.00" <?php echo isset($soporte) && $soporte == 1 ? "selected" : "" ?>>Hno. Carlos García Paitan P/A: S/54.00</option>
			</select>
		</div>
			<div class="form-group d-flex w-100 justify-content-end">
				<button class="btn btn-flat btn-primary btn-sm mr-2">Guardar</button>
				<button class="btn btn-flat btn-light btn-sm" type="reset">Resetear</button>
			</div>
		</form>
		</div>
		</div>
	</div>
	</div>
	</div>
</div>

<?php
$sched_qry = $conn->query("SELECT s.*,a.room_name FROM `schedule_list` s inner join assembly_hall a on a.id = s.assembly_hall_id ");
$sched_data = array();
while($row=$sched_qry->fetch_assoc()):
	$sched_data[]=$row;
endwhile;
$sched = json_encode($sched_data);
?>
<script>
	var scheds = $.parseJSON('<?php echo $sched ?>');
	$(function(){
		$('#add_sched').submit(function(e){
			e.preventDefault()
			start_loader()
			$('#add_sched .err-msg').remove()

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
						$('#add_sched').prepend(el)
							el.show('slow')
					}else{
						console.log(resp)
						alert_toast("An error occured","error");
					}
					end_loader();
				}
			})
		})
		$('.select2').select2({placeholder:"Porfavor selecciona una sala"})
		var Calendar = FullCalendar.Calendar;
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()
		
		var calendarEl = document.getElementById('calendar');
		var calendar = new Calendar(calendarEl, {
                        headerToolbar: {
                            left  : 'prev,next today',
                            center: 'title',
                            right : 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        themeSystem: 'bootstrap',
                        //Random default events
                        events:function(event,successCallback){
                            var days = moment(event.end).diff(moment(event.start),'days')
                            var events = []
							Object.keys(scheds).map(k=>{
								events.push({
									title          : scheds[k].room_name,
									start          : moment(scheds[k].datetime_start).format("YYYY-MM-DD HH:mm"),
									end          : moment(scheds[k].datetime_end).format("YYYY-MM-DD HH:mm"),
									backgroundColor: 'var(--success)', 
									borderColor    : 'var(--primary)',
									'data-id'      : scheds[k].id
								})
							})
							console.log(events)
                            successCallback(events)
                        },
                        eventClick:function(info){
							sched_id = info.event.extendedProps['data-id']
							console.log(sched_id)
                            uni_modal("Taller Washintong - UPG Salud","schedules/view_details.php?id="+sched_id)
                        },
                        editable  : true,
                        selectable: true,
                        
				});

	calendar.render();
	})
</script>