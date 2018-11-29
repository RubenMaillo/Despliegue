<div class="migasPan"><h3><a href="../../../index.php/CEjercicio20">Home</a> >> <a href="../../../index.php/CEjercicio20/Socios">Socios</a> >> Datos del socio</h3></div>

<div id="nSocio">

	<?php 

		echo form_open('CEjercicio20/datosSocio');

		$id=array(
			'name' => 'id',
			'readonly' => 'true');

		$nombre=array(
			'name' => 'nombre',
			'readonly' => 'true');

		$dni=array(
			'name' => 'dni',
			'readonly' => 'true');

		$domicilio=array(
			'name' => 'dni',
			'readonly' => 'true');

		$telefono=array(
			'name' => 'dni',
			'readonly' => 'true');

		$fechaAlta=array(
			'name' => 'dni',
			'readonly' => 'true');

		$fechaBaja=array(
			'name' => 'dni',
			'readonly' => 'true');

	?>

	<div class="ns"><h2>DATOS DEL SOCIO</h2></div>

	<div id="nuevoS">
		
		<?php 

			$socios=simplexml_load_file("xml/listaSocios.xml");

			foreach($socios as $socio){

				if($socio->dni==$resDni){

					echo form_label('ID: ', 'id'); 
					echo form_input($id, $socio->id_socio);
					echo "<br><br>";
					echo form_label('DNI: ', 'dni'); 
					echo form_input($dni, $socio->dni);
					echo "<br><br>";
					echo form_label('Nombre: ', 'nombre'); 
					echo form_input($nombre, $socio->nombre_apellidos);
					echo "<br><br>";
					echo form_label('Domicilio: ', 'domicilio'); 
					echo form_input($domicilio, $socio->domicilio);
					echo "<br><br>";
					echo form_label('Teléfono: ', 'telefono'); 
					echo form_input($telefono, $socio->telefono);
					echo "<br><br>";
					echo form_label('Fecha de alta: ', 'fechaAlta'); 
					echo form_input($fechaAlta, $socio->fecha_alta);
					echo "<br><br>";
					echo form_label('Fecha de alta: ', 'fechaBaja'); 
					echo form_input($fechaBaja, $socio->fecha_baja);
					echo "<br><br>";
				}
			}
		?>

	
	</div>
	
</div>