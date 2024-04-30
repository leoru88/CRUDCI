<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>micrud</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

	<div class="container">
		<div class="row text-center margin-top: 20px">
			<h4>Empleados</h4>
		</div>

		<div class="mb-5">

			<?php echo form_open('welcome/agregar', ['id' => 'form-persona']) ?>

			<div class="row">
				<div class="form-group col-sm-4">
					<label for="nombre">Nombre completo</label>
					<input type="text" name="nombre" class="form-control" required placeholder="Nombre completo" id="nombre">
				</div>
				<div class="form-group col-sm-4">
					<label for="nombre">Apellido paterno</label>
					<input type="text" name="ApellidoPaterno" class="form-control" required placeholder="Apellido paterno" id="ApellidoPaterno">
				</div>
				<div class="form-group col-sm-4">
					<label for="nombre">Apellido materno</label>
					<input type="text" name="ApellidoMaterno" class="form-control" required placeholder="Apellido materno" id="ApellidoMaterno">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-sm-4">
					<label for="nombre">Fecha de nacimiento</label>
					<input type="date" name="FechaNacimiento" class="form-control" required placeholder="Fecha de nacimiento" id="FechaNacimiento">
				</div>
				<div class="form-group col-sm-4">
					<label for="nombre">Género</label>
					<input type="text" name="genero" class="form-control" required placeholder="(M:Masculino, F:Femenino)" id="genero">
				</div>
			</div>
			
			<div style="margin-top: 20px; text-align: center;">
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="submit" class="btn btn-secondary" onclick="limpiarCampos()">Limpiar</button>
			</div>

			<?php echo form_close(); ?>

		</div>

		<div class="row">
			<div class="card col-12">
				<div class="card-header">
					<h4>Tabla de empleados</h4>
				</div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre</th>
								<th scope="col">Fecha de nacimiento</th>
								<th scope="col">Género</th>
								<th scope="col">Editar</th>
								<th scope="col">Eliminar</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$count = 0;
							foreach ($personas as $persona) {
								echo '
									<tr>
										<td>' . ++$count . '</td>
										<td>' . $persona->nombre . ' ' . $persona->ApellidoPaterno . ' ' . $persona->ApellidoMaterno . '</td>
										<td>' . $persona->FechaNacimiento . '</td>
										<td>' . $persona->genero . '</td>
										<td> <button type="button" class="btn btn-warning text-white" 
										onclick="llenar_datos(
											' . $persona->id . ',
											`' . $persona->nombre . '`,
											`' . $persona->ApellidoPaterno . '`,
											`' . $persona->ApellidoMaterno . '`,
											`' . $persona->FechaNacimiento . '`,
											`' . $persona->genero . '`,
											)">Editar</button> </td>
										<td> <a href="' . base_url('/welcome/eliminar/' . $persona->id) . '" type="button" class="btn btn-danger">Eliminar</td>
									</tr>
									';
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<script>

		let url = "<?php echo base_url('welcome/editar'); ?>" 

		const llenar_datos = (id, nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, genero) => {
			// console.log(id, nombre, ApellidoPaterno, ApellidoMaterno, FechaNacimiento, genero);
			
			let path = url+"/"+id;

			document.getElementById('form-persona').setAttribute('action', path);

			document.getElementById('nombre').value= nombre;
			document.getElementById('ApellidoPaterno').value= ApellidoPaterno;
			document.getElementById('ApellidoMaterno').value= ApellidoMaterno;
			document.getElementById('FechaNacimiento').value= FechaNacimiento;
			document.getElementById('genero').value= genero;

			const limpiarCampos = () => {
				document.getElementById('form-persona').reset();
			}

		}
	</script>

</body>

</html>