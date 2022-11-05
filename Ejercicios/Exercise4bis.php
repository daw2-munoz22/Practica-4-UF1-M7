<?php

$db = mysqli_connect('localhost', 'root', 'root') or 
die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$query = 'SELECT people_fullname,movie_name FROM movie,people WHERE movie_leadactor=people_id';
$result = mysqli_query($db,$query) or die(mysqli_error($db));

while($row = mysqli_fetch_assoc($result)){
    extract($row);
    echo $movie_name. ' : '. $people_fullname . '<br>';
};
echo '<br>';
mysqli_query($db,$query) or die(mysqli_error($db));
echo 'Data inserted successfully!';
?>