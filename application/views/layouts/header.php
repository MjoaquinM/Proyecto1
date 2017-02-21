<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$menuNavBar = [['Login','login'], ['Support','support']];
$headerNavBar = 'Waf Home';
$pageTitle = 'Admin Interface';
$mainPageTitle = 'Waf - MS ui';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap Core CSS -->
    <?php echo '<link href="'.base_url().'application/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">'; ?>

    <?php echo '<link href="'.base_url().'application/assets/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">'; ?>

    <!-- MetisMenu CSS -->
    <?php echo '<link href="'.base_url().'application/assets/css/metisMenu/metisMenu.min.css" rel="stylesheet">'; ?>

    <!-- Custom CSS -->
    <?php echo '<link href="'.base_url().'application/assets/css/sb-admin-2.css" rel="stylesheet">';?>

    <!-- Morris Charts CSS -->
    <?php echo '<link href="'.base_url().'application/assets/css/morris/morris.css" rel="stylesheet">'; ?>    

    <!-- Custom Fonts -->
    <?php echo '<link href="'.base_url().'application/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">';?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
