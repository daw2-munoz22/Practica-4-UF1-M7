<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginación</title>
</head>
<body>
    <?php
        $db = mysqli_connect('localhost', 'root', 'root') or die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db,'moviesite') or die(mysqli_error($db)); 
        $noRegistros = 2; //Registros por página
        $pagina = 1; //Por defecto pagina = 1
        $buskr = '';
        if(isset($_GET['pagina'])){
            $pagina = $_GET['pagina'];
        }
        if(isset($_GET['searchs'])){
            $buskr = $_GET['searchs'];
        }
       
        $sSQL = "SELECT * FROM movie WHERE movie_name LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
        $result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
        echo "<table>";
        while($row = mysqli_fetch_array($result)) { 
	        echo "<tr><td height=80 align=center>";
	        echo $row["movie_id"]."<br>";
	        echo "</td>
	        <td align=center><img src='fotos/$row[movie_id]' width=70 height=70></td>
		        <td>$row[movie_name].</td>
		        <td align=center>$row[movie_year].</td>
	        </tr>";
        }
        $query = "SELECT count(*) FROM movie WHERE movie_name LIKE '%$buskr%'"; //Cuento el total de registros
        $result = mysqli_query($db,$query);
        $row = mysqli_fetch_array($result);
        $totalRegistros = $row["count(*)"]; //Almaceno el total en una variable
        
        $noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas
    ?>
    <tr>
        <td colspan="2" align="center"><?php echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
        <td colspan="2" align="center"><?php echo "<strong>Pagina: </strong>".$pagina; ?></td>
    </tr>
    <tr bgcolor="f3f4f1">
        <td colspan="4" align="right"><strong>Pagina:
    <?php
    for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
	    if($i == $pagina)
		    echo "<font color=red>$i </font>"; //A la pagina actual no le pongo link
	    else
		    echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>";
    }
    ?>
    </strong></td>
    </tr>
    </table>
</body>
</html>
