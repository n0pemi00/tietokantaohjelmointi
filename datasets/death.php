<?php
    //käyttää luotua database yhteyttä
    require_once('../db.php');
    $name_ = $_GET['name_'];
    $conn = createDbConnection();
    //haku jonka koodi hakee mysql
    $sql = "SELECT death_year
    FROM `names_`
    where name_ like '%" . $name_ . "%';";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $rows = $prepare->fetchAll();
    //tulostus
    $html = '<h1> Kuolemavuosi' . $name_ . '</h1>';

    $html .= '<ul>';

    foreach($rows as $row) {

        $html .= '<li>' . $row['death_year'] . '</li>';
    }
    $html .= '</ul>';
    echo $html;
    ?>