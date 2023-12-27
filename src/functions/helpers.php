<?php
function include_template($name, array $data = [])
{
  $name = ROOTPATH . '/src/templates/' . $name;
  $result = '';

  if (!is_readable($name)) {
    return $result;
  }

  ob_start();
  extract($data);
  require $name;

  $result = ob_get_clean();

  return $result;
}