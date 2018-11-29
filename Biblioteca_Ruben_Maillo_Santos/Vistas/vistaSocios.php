<div class="migasPan"><h3><a href="../../../index.php/CEjercicio20">Home</a> >> Socios</h3></div>

<div id="socios">

	<?php 

		echo form_open('CEjercicio20/Socios');

		$dni=array(
			'name' => 'dni',
			'placeholder' => 'Escribe el DNI del socio');

		$nombre=array(
			'name' => 'nombre',
			'placeholder' => 'Escribe el nombre del socio');

	?>

	
	
	<div id="buscarSocio">
		<center>
			<h2>SOCIOS</h2>
			<div id="formSocio">
				<?php 
					
					echo form_label('DNI: ', 'dni'); 
					echo form_input($dni);

					echo form_label('Nombre: ', 'nombre'); 
					echo form_input($nombre);

					echo form_submit('btnEntrar', 'Buscar');
					echo form_close();
				?>
			</div>
			<div id="nuevoSocio">
				<?php 
					echo form_open("CEjercicio20/vistaAnadirSocio");
					echo form_submit('btnNuevo', 'Nuevo');
					echo form_close();
				?>
			</div>

		</center>
	</div>

	<div id='alta'>
		<?php
			
			$socios=simplexml_load_file("xml/listaSocios.xml");

			echo "<h2>Socios de alta</h2>";

			foreach ($socios as $socio) {
				if($socio->fecha_baja=="No" && $resultDni=="" && $resultNombre==""){
					echo "<a href='../CEjercicio20/datosSocio/".$socio->dni."'>".$socio->dni."  ----  ".$socio->nombre_apellidos."<br></a>";
				}
				else{
					if(((isset($resultDni) && $socio->dni==$resultDni)|| (isset($resultNombre) && $socio->nombre_apellidos==$resultNombre)) && $socio->fecha_baja=="No"){
						
						echo "<a href='../CEjercicio20/datosSocio/".$socio->dni."'>".$socio->dni."  ----  ".$socio->nombre_apellidos."<br></a>";
					}
				}
			}

		?>
	</div>

	<div id='baja'>
		<?php
			
			$socios=simplexml_load_file("xml/listaSocios.xml");

			echo "<h2>Socios de baja</h2>";
			foreach ($socios as $socio) {
				if($socio->fecha_baja!="No" && $resultDni=="" && $resultNombre==""){
					echo "<a href='../CEjercicio20/datosSocio/".$socio->dni."'>".$socio->dni."  ----  ".$socio->nombre_apellidos."<br></a>";
				}
				else{
					if(((isset($resultDni) && $socio->dni==$resultDni) || (isset($resultNombre) && $socio->nombre_apellidos==$resultNombre)) && $socio->fecha_baja!="No"){

						echo "<a href='../CEjercicio20/datosSocio/".$socio->dni."'>".$socio->dni."  ----  ".$socio->nombre_apellidos."<br></a>";

					}
				}

			}
		?>
	</div>
	
</div>
