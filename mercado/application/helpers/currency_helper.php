<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function numeroEmReais($numero){
    return "R$ ". number_format($numero,2 ,",",".");
}