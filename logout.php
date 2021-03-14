<?php

require "utils.php";

session_start();
unset($_SESSION["username"]);
session_destroy();

redirect("index.php");
