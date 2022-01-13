<?php
    //käyttää luotua database yhteyttä
    require_once('../db.php'); 
    $average_rating = $_GET['average_rating'];
    $conn = createDbConnection(); 
    //haku jonka koodi hakee mysql
    $sql = "SELECT `primary_title`
    FROM `titles` INNER JOIN title_ratings
    ON titles.title_id = title_ratings.title_id
    WHERE average_rating LIKE '%" . $average_rating . "%'
    LIMIT 10;";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $rows = $prepare->fetchAll();
    //tulostus
    $html = '<h1>Average rating ' . $average_rating . '</h1>';
    $html .= '<ul>';
    
    foreach($rows as $row) {
        $html .= '<li>' . $row['primary_title'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;

?>