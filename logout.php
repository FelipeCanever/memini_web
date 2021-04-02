<?php

require "utils.php";

session_start();
unset($_SESSION["user"]);
session_destroy();

redirect("login.php");
