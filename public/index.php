<?php
echo 'WORK!';

var_dump($_POST);
var_dump(filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING));
var_dump(file_get_contents('php://input'));