<?php
  // configuration
  $file = "solid.svg";
  $default_color = "#369369";
  $default_query = "file-o";

  // set header
  header("Content-Type: image/svg+xml");

  // validate and set the query
  if (isset($_GET['q']) && is_string($_GET['q']) && strlen(trim($_GET['q'])) > 0) {
    // cleaning query
    $query = htmlspecialchars($_GET['q']);
  } else {
    $query = $default_query;
  }

  // set color
  if (isset($_GET['c']) && preg_match('/^[a-f0-9]{6}$/i', $_GET['c'])) {
    $color = 'fill="#'.$_GET['c'].'" ';
  } else {
    $color = 'fill="'.$default_color.'" ';
  }

  // return the requested SVG source from the sprite
  function svg($q,$f,$c){
    $default = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path '.$c.'d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"></path></svg>';
    $xml = simplexml_load_file($f) or die($default);
    foreach($xml->symbol as $symbol) {
      if ($symbol['id'] == $q) {
        $viewBox = $symbol['viewBox'];
        $path = $symbol->path['d'];
        break;
      }
    }
    if (isset($viewBox) && isset($path)) {
      return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="'.$viewBox.'"><path '.$c.'d="'.$path.'"></path></svg>';
    } else {
      return $default;
    }
  }

  // call the function with given variables
  echo svg($query,$file,$color);
?>
