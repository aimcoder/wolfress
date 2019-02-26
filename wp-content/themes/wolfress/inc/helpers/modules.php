<?php

function get_module ($module_name, $args = []) {
  add_module($module_name, $args);
}

function add_module ($module_name, $args = []) {
  if (empty($module_name)) {
    return;
  }

  extract($args, EXTR_SKIP);

  require_once(TEMPLATE_PATH.'/modules/'.$module_name.'/'.$module_name.'.php');
}
