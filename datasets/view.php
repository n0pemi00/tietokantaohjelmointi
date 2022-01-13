<?php
    //käyttää luotua database yhteyttä
    require_once('../db.php');
    $dbcon = createDbConnection();

    // CREATE VIEW primarytitlestart
    // AS
    // SELECT primary_title
    // FROM titles
    // WHERE START_year = 2010
    // LIMIT 10; viewvin luonti koodi

    //haku jonka koodi hakee mysql
    $sql ="SELECT * FROM `primarytitlestart`";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $dbcon->prepare($sql);
    $prepare->execute();
    $rows = $prepare->fetchAll();
    //tulostus
    $html = '<h1>asd</h1>';
    $html .= '<ul>';

    foreach($rows as $row) {
        $html .= '<li>' . $row["primary_title"] . '</li>';
    }
    $html .= '</ul>';

    echo $html;
?>