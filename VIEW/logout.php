<?php
session_start();
unset($_SESSION['login']);
Header("location: /lpphpadst126/view/index.php");
