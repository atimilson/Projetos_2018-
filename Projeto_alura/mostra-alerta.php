<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
function mostraAlerta($tipo){
    if(isset($_SESSION["$tipo"])){
 ?>       
        
<p class="alert-<?=$tipo?>"><?=$_SESSION["$tipo"]?></p>     
 <?php
  unset($_SESSION["$tipo"]);
        
    }
}
?>