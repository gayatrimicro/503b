<?php
session_start();

session_destroy();
header('location: /503b/ordering/');
?>