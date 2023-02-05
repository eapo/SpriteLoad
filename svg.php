<?php
  header("Content-Type: image/svg+xml");
  $query = htmlspecialchars($_GET['q']);
  $file = "solid.svg";

  function svg($q){
    $default = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"></path></svg>';
    $query = (!empty($q))?$q:'file-o';
    $xml = simplexml_load_file($file) or die($default);
    foreach($xml->symbol as $symbol) {
      if ($symbol['id'] == $query) {
        $viewBox = $symbol['viewBox'];
        $path = $symbol->path['d'];
        break;
      }
    }
    if (isset($viewBox) && isset($path)) {
      return '<svg xmlns="http://www.w3.org/2000/svg" viewBox="'.$viewBox.'"><path d="'.$path.'"></path></svg>';
    } else {
      return $default;
    }
  }
  echo svg($query);
?>
