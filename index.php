<?php
    //käyttää luotua database yhteyttä
    require_once('utilities.php');
    $html = "<h2>Hakuja</h2>";
    $html .= '<form action="GET">';
    //kutsuu funktioita
    $html .= avgrating();
    $html .= nameDropDown();
    //lukee kansiossa olevat tiedostot ja liittää ne nappuloihin
    $path = 'datasets';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
        }
        closedir($handle);
    }
    $html .= names();
    $html .= '</form>';

    echo $html;
?>