<?php
    $db = mysqli_connect('localhost', 'root', 'root') or 
        die ('Unable to connect. Check your connection parameters.');
        
    mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
    
    $query = 'INSERT INTO movie
        (movie_id, movie_name, movie_type, movie_year, movie_leadactor,
        movie_director)
    VALUES
        (4, "Halloween", 6, 1978, 1, 2),
        (5, "Aelita", 1, 1924, 2, 6),
        (6, "Rescate en Nueva York", 7, 1997, 4, 3)';
    mysqli_query($db,$query) or die(mysqli_error($db));

    $query  = 'INSERT INTO people
        (people_id, people_fullname, people_isactor, people_isdirector)
    VALUES
        (7, "Malcolm McDowell", 1, 0),
        (8, "Leonardo di Capri", 1, 0),
        (9, "Bradd Pitt", 0, 1)';
    mysqli_query($db,$query) or die(mysqli_error($db));

?>