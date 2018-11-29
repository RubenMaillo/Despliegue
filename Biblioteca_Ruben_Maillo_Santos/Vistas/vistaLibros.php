<div class="migasPan"><h3><a href="../../../index.php/CEjercicio20">Home</a> >> Libros</h3></div>

<div id="libros">

<?php 

		echo form_open('CEjercicio20/Libros');

		$titulo=array(
			'name' => 'titulo',
			'placeholder' => 'Escribe el titulo del libro');

		$autor=array(
			'name' => 'autor',
			'placeholder' => 'Escribe el autor del libro');

		$tema=array("", "Novela Negra", "Ciencia ficción");

		

	?>
	
	<div id="buscarLibro">
		<center>
			<h2>LIBROS</h2>
				<?php 
					echo form_label('Título: ', 'titulo'); 
					echo form_input($titulo);

					echo form_label('Autor: ', 'autor'); 
					echo form_input($autor);

					echo form_label('Tema: ', 'tema'); 
					echo form_dropdown('tema', $tema);

					echo form_submit('btnEntrar', 'Buscar');
					echo form_close();
				?>
		</center>
	</div>

	<div id="tablaLibros">
		<?php
			
			$libros=simplexml_load_file("xml/listaLibros.xml");
			echo "<center><table border='3'>";

			foreach ($libros as $libro) {
				
				if($resultTitulo=="" && $resultAutor=="" && $resultTema==""){

					echo "<tr><td>Id:</td><td>".$libro->id_libro."</td></tr>";
					echo "<tr><td>ISBN:</td><td>".$libro->isbn."</td></tr>";
					echo "<tr><td>Título:</td><td>".$libro->titulo."</td></tr>";
					echo "<tr><td>Autor:</td><td>".$libro->autor."</td></tr>";
					echo "<tr><td>Tema:</td><td>".$libro->tema."</td></tr>";
					echo "<tr><td>Editorial:</td><td>".$libro->editorial."</td></tr>";
					echo "<tr><td>Fecha de edición:</td><td>".$libro->f_edicion."</td></tr>";
					echo "<tr><td>Número de ejemplares:</td><td>".$libro->num_ejemplares."</td></tr>";
					echo "<tr ><td colspan='2'>-------------------------------------------</td></tr>";

				}else{

				if($resultTitulo=="" && $resultAutor=="" && $tema[$resultTema]==""){

					echo "<tr><td>Id:</td><td>".$libro->id_libro."</td></tr>";
					echo "<tr><td>ISBN:</td><td>".$libro->isbn."</td></tr>";
					echo "<tr><td>Título:</td><td>".$libro->titulo."</td></tr>";
					echo "<tr><td>Autor:</td><td>".$libro->autor."</td></tr>";
					echo "<tr><td>Tema:</td><td>".$libro->tema."</td></tr>";
					echo "<tr><td>Editorial:</td><td>".$libro->editorial."</td></tr>";
					echo "<tr><td>Fecha de edición:</td><td>".$libro->f_edicion."</td></tr>";
					echo "<tr><td>Número de ejemplares:</td><td>".$libro->num_ejemplares."</td></tr>";
					echo "<tr ><td colspan='2'>-------------------------------------------</td></tr>";

				}
				else{

					if((isset($resultTitulo) && $libro->titulo==$resultTitulo) || (isset($resultAutor) && $libro->autor==$resultAutor) || (isset($resultTema) && $libro->tema==$tema[$resultTema])){
						
						echo "<tr><td>Id:</td><td>".$libro->id_libro."</td></tr>";
						echo "<tr><td>ISBN:</td><td>".$libro->isbn."</td></tr>";
						echo "<tr><td>Título:</td><td>".$libro->titulo."</td></tr>";
						echo "<tr><td>Autor:</td><td>".$libro->autor."</td></tr>";
						echo "<tr><td>Tema:</td><td>".$libro->tema."</td></tr>";
						echo "<tr><td>Editorial:</td><td>".$libro->editorial."</td></tr>";
						echo "<tr><td>Fecha de edición:</td><td>".$libro->f_edicion."</td></tr>";
						echo "<tr><td>Número de ejemplares:</td><td>".$libro->num_ejemplares."</td></tr>";
						echo "<tr ><td colspan='2'></td></tr>";

					}
				}
			}
				
			}

			echo "</table></center><br><br>";

		?>
	</div>
</div>
