<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Repositório de Documentos</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    
<!--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>-->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/') ?>datatables.min.css"/>
    <!-- Our Custom CSS -->
    
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/') ?>estilo-menu-repositorio.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style type="text/css">
    
    .limitar_descricaoDoc{
        max-width: 350px; 
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
    }

    .limitar_descricaoDoc a {
        outline:0;
    }

    .dataTables_wrapper .dataTables_length {
        float: right;
    }

    .dataTables_wrapper .dataTables_length label{
        margin-bottom: 0px;
        padding-top: 7px;
    }

    .dataTables_wrapper .dataTables_filter {
        float: left;
        text-align: left;
        width: 68%;
    }

    .dataTables_wrapper .dataTables_filter label{
        text-transform: uppercase;
        font-weight: bold;
        width: 100%;
    }

    .dataTables_wrapper .dataTables_filter input {        
        border: 1px solid black;
        width: 91%;
        height: 40px;
        border-radius: 5px;      
        /*background: rgba(224,224,224,0.9);       */
        background: #fff;       
    }

    .dataTables_wrapper .dataTables_filter input:focus {                
        background: #fff;
        border-radius: 5px;
        border: none;       
        outline:0;
       box-shadow: 0px 0px 5px rgb(49,165,231);
    }
</style>

</head>
<body>