<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 29/12/2016
 * Time: 14:01
 */

session_start();

unset($_SESSION['usuario']);

header("Location: index.php");