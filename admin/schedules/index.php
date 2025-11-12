<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<style>
#selectAll{
	top:0
}
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
/* style for modal*/

:root{
    --clr-black: #242424;
    --clr-white: #f3f3f3;
    --clr-red: #a83434;
}
body{
	/* height: 100vh;
	width: 100%; */
}

main{
    min-width: 40vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    background-color: var(--clr-white);
}
.titulo{
    font-size:3rem;
}
.botones{
    display: flex;
    gap: 1rem;
}

.boton{
    border: 0;
    background-color: var(--clr-black);
    padding: .75em 1em;
    border-radius: 500vmax;
    cursor:pointer;
    text-transform: uppercase;
    font-weight: 800;;
    font-size: .75rem;
}
.boton.cerrar{
	background-color: var(--clr-red);
	color:white;
	
}
h2{
	text-align: center;

}
.modal-centro{
	position:absolute;
	width: 500px;
	height: 500px;
	top:5%;
	background-color: var(--clr-white);
	color: var(--clr-black);
	padding: 2rem;
	border-radius:1rem;
	display:flex;
	flex-direction:column;
	gap: 1rem;
    right: 100%;
	visibility: hidden;
	opacity: 0;
	transition: .3s;
	z-index:1000;
}
.modal-centro.active{
	opacity: 1;
	visibility: visible;
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
								<main>
									<!--Creando el modal de los materiales --> 
									<div class="botones">
										<button type="button" class="boton" id="boton-modal-centro">+</button>
										
									</div>
									<!-- DIV 1 -->
									<div class="modal-centro" id="modal-centro">
										<div class="div-section">
											<h4>1. Ingresar Item</h4>
											<label for="inputValue">Elemento:</label>
											<input type="text" id="inputValue">
											<label for="selectOption">Opción:</label>
											<select id="selectOption">
												<option value="opcion1">Opción 1</option>
												<option value="opcion2">Opción 2</option>
												<option value="opcion3">Opción 3</option>
											</select>
											<button type="button" id="addButton">Añadir a la Tabla</button>
										</div>

									
										<!-- DIV 2: Tabla de Acumulación -->
										<div class="div-section">
											<h3>2. Items Acumulados</h3>
											<table>
												<thead>
													<tr>
														<th>Elemento</th>
														<th>Opción Seleccionada</th>
													</tr>
												</thead>
												<tbody id="dataTableBody">
													<!-- Filas añadidas aquí -->
												</tbody>
											</table>
										</div>
										<button type="button" id="cerrar-modal-centro" class="boton cerrar">Cerrar</button>
										<button type="button" id="saveAndCloseBtn" class="btn btn-primary">Guardar Datos</button>

									</div>

								</main>


									<!--Fin del modal -->

							<!-- <button type="button" id="addmateriales" onkeydown="pulsar(event)">Añadir o mostrar Modal</button> -->
								

								<!-- <textarea onkeydown="pulsar(event)" maxlength="500" rows="5" class="form-control" name="schedule_remarks" id="schedule_remarks" readonly id="list-materiales"></textarea> -->
    							<textarea id="schedule_remarks" rows="10" cols="50" name="schedule_remarks" readonly placeholder="Los datos de la tabla aparecerán aquí al cerrar el modal..."></textarea>

								
							</div>


<script>

	const botonModalCentro= document.querySelector("#boton-modal-centro");
	const modalCentro= document.querySelector("#modal-centro");
	const modalCerrar= document.querySelector("#cerrar-modal-centro");


	botonModalCentro.addEventListener("click", ()=>{
		modalCentro.classList.add("active");
	})

	modalCerrar.addEventListener("click", ()=>{
		modalCentro.classList.remove("active");
	})


	const closeModalBtn = document.getElementsByClassName("close")[0]; // Solo necesitamos el primero
	const saveAndCloseBtn = document.getElementById("saveAndCloseBtn");
	const addButton = document.getElementById("addButton");
	const inputValue = document.getElementById("inputValue");
	const selectOption = document.getElementById("selectOption");
	const dataTableBody = document.getElementById("dataTableBody");
	const outputDataTextarea = document.getElementById("schedule_remarks");

// --- Lógica del Modal ---




window.onclick = function(event) {
    if (event.target == modal) {
        updateTextareaFromTable(); // Actualizar al hacer clic fuera
        modal.style.display = "none";
    }
}

saveAndCloseBtn.onclick = function() {
    updateTextareaFromTable();
    modal.style.display = "none";
}

// --- Lógica de Añadir a la Tabla ---
addButton.onclick = function() {
    const itemValue = inputValue.value.trim(); // Usar trim() para limpiar espacios
    const optionText = selectOption.options[selectOption.selectedIndex].text;
    const optionValue = selectOption.value; // Puedes guardar el valor o el texto

    if (itemValue === "") {
        alert("Por favor, introduce un valor para el elemento.");
        return;
    }

    // Crear una nueva fila y celdas
    const newRow = dataTableBody.insertRow();
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);

    cell1.textContent = itemValue;
    cell2.textContent = optionText;
    
    // Opcional: añadir un atributo de datos con el valor real del select
    newRow.setAttribute('data-option-value', optionValue);

    // Limpiar el formulario
    inputValue.value = "";
    selectOption.selectedIndex = 0; 
};

// --- Lógica de Transferencia a Textarea ---
function updateTextareaFromTable() {
    const rows = dataTableBody.querySelectorAll("tr");
    const dataArray = [];

    rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        if (cells.length === 2) {
            dataArray.push({
                elemento: cells[0].textContent,
                opcion: cells[1].textContent, // O row.getAttribute('data-option-value')
            });
        }
    });

    // Convertir el array de objetos a una cadena JSON formateada
    // JSON.stringify(dataArray, null, 2) hace que el JSON sea legible
    outputDataTextarea.value = JSON.stringify(dataArray, /[\n\s]/g ,null);
	outputDataTextarea.value;
	// let textoSinSaltosYEspacios = outputDataTextarea.value.replace(/[\n\s]/g, '');
	// textoSinSaltosYEspacios.value = outputDataTextarea;
}

	










	
	
	



	// const textarea = document.querySelector("textarea");
	// textarea.addEventListener("keyup", e =>{
	// 	textarea.style.height = "63px";
	// 	let scHeight = e.target.scrollHeight;
	// 	textarea.style.height = `${scHeight}px`;
	// });

	// function pulsar(e) {
	// if (e.which === 13 && !e.shiftKey) {
	// 	e.preventDefault();
	// 	console.log('prevented');
	// return false;
	// }

</script>

	<div class="form-group">
		<label for="taller" class="control-label">Almuerzo/Pasaje:</label>
		<input type="text" class="form-control" name="presupuesto" placeholder="S/0.00" id="presupuesto">
	</div>
	<div class="form-group">
		<label for="soporte" class="control-label">TI Soporte:</label>
		<select name="soporte" id="" class="form-control form no-resize">
			<option disabled selected>Selecciona una opción</option>
			<option value="Ing. Willy Medina Bacalla P/A: S/54.00" <?php echo isset($soporte) && $soporte == 1 ? "selected" : "" ?>>Ing. Willy Medina Bacalla P/A: S/54.00</option>
			<option value="Ing. Abdiel Mamani Simeon P/A: S/54.00" <?php echo isset($soporte) && $soporte == 2 ? "selected" : "" ?>>Ing. Abdiel Mamani Simeon P/A: S/54.00</option>
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
