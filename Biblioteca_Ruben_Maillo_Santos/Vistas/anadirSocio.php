<div class="migasPan"><h3><a href="../../../index.php/CEjercicio20">Home</a> >> <a href="../../../index.php/CEjercicio20/Socios">Socios</a> >> Añadir Socio</h3></div>

<div id="nSocio">

	<?php
			
		$socios=simplexml_load_file("xml/listaSocios.xml");

		foreach ($socios as $socio) {
			$idSocio=($socio->id_socio)+1;
		}

		$fechaBajaSocio="No";

	?>

	<?php 

		echo form_open('CEjercicio20/anadirSocio');

		$id=array(
			'name' => 'id',
			'readonly' => 'true');

		$nombre=array(
			'name' => 'nombre',
			'placeholder' => 'Escribe el nombre del socio');

		$dni=array(
			'name' => 'dni',
			'placeholder' => 'Escribe el DNI del socio');

		$domicilio=array(
			'name' => 'domicilio',
			'placeholder' => 'Escribe el domicilio del socio');

		$telefono=array(
			'name' => 'telefono',
			'placeholder' => 'Escribe el telefono del socio');

		$fechaAlta=array(
			'name' => 'fechaAlta',
			'readonly' => 'true');

		$fechaBaja=array(
			'name' => 'fechaBaja',
			'readonly' => 'true');

	?>

	<div class="ns"><h2>NUEVO SOCIO</h2></div>

	<div id="nuevoS">
		
		<?php 

			$fecha=date("j/m/Y");

			echo form_label('ID*: ', 'id'); 
			echo form_input($id, $idSocio );
			echo "<br><br>";
			echo form_label('Nombre y apellidos*: ', 'nombre'); 
			echo form_input($nombre);
			echo "<br><br>";
			echo form_label('DNI*: ', 'dni'); 
			echo form_input($dni);
			echo "<br><br>";
			echo form_label('Domicilio*: ', 'domicilio'); 
			echo form_input($domicilio);
			echo "<br><br>";
			echo form_label('Teléfono*: ', 'telefono'); 
			echo form_input($telefono);
			echo "<br><br>";
			echo form_label('Fecha de alta*: ', 'fechaAlta'); 
			echo form_input($fechaAlta, $fecha);
			echo "<br><br>";
			echo form_label('Fecha de baja*: ', 'fechaBaja'); 
			echo form_input($fechaBaja, $fechaBajaSocio);
			echo "<br><br><br>";
			echo form_submit('btnEntrar', 'Añadir');
			echo form_close();

		?>

	
	</div>
	
</div>