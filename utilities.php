<?php

    function nameDropDown() {
        //käyttää luotua database yhteyttä
        require_once('db.php');
        $conn = createDbConnection();
        //haku jonka koodi hakee mysql 
        $sql = 'SELECT DISTINCT name_ FROM names_
        limit 20;';
        // Tarkistukset yms
        // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        $rows = $prepare->fetchAll();
        //tulostus
        $html = '<select name="name_">';

        foreach($rows as $row) {

            $html .= '<option>' . $row['name_'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    function avgrating() {
        //käyttää luotua database yhteyttä
        require_once('db.php'); 
        $conn = createDbConnection(); 
        //haku jonka koodi hakee mysql
        $sql = "SELECT DISTINCT average_rating FROM title_ratings
        ORDER BY average_rating DESC
        limit 26;";
        // Tarkistukset yms
        // Aja kysely kantaan   
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        $rows = $prepare->fetchAll();
        //tulostus
        $html = '<select name="average_rating">';
      
        foreach($rows as $row) {
          
            $html .= '<option>' . $row['average_rating'] . '</option>';
        }
        $html .= '</select>';
        
        return $html;
    }

    function names() {
    //käyttää luotua database yhteyttä
    require_once('db.php');
    $conn = createDbConnection();
    //haku jonka koodi hakee mysql
    $sql = "SELECT DISTINCT name_ FROM names_ WHERE name_ like 'B%' LIMIT 10";
    // Tarkistukset yms
    // Aja kysely kantaan
    $prepare = $conn->prepare($sql);
    $prepare->execute();
    $rows = $prepare->fetchAll();
    //tulostus
    $html = '<select name="name">';

    foreach($rows as $row) {
        $html .= '<option>' . $row['name_'] . '</option>';
    }
    $html .= '</select>';
    return $html;
}
    ?>