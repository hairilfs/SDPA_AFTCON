<?php
  $x = array();

  for ($i=0; $i < 30; $i++) {
    $a = mt_rand(0, 3000);
    $x[] = $a;
  }

  print_r($x);

?>
