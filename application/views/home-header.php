<!DOCTYPE HTML>
<!--
        Prologue by HTML5 UP
        html5up.net | @n33co
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Prologue by HTML5 UP</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/estilo.css'); ?>"/>
        -->
<!--[if lte IE 8]><script src="<?php echo base_url('assets/css/ie/html5shiv.js'); ?>"></script><![endif]-->
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.scrolly.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.scrollzer.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/skel.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/skel-layers.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/init.js'); ?>"></script>

        <link rel="stylesheet" href="<?php echo base_url('assets/css/skel.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-wide.css'); ?>" />

  <!--[if lte IE 9]><link rel="stylesheet" href="<?php echo base_url('assets/css/ie/v9.css'); ?>" /><![endif]-->
  <!--[if lte IE 8]><link rel="stylesheet" href="<?php echo base_url('assets/css/ie/v8.css'); ?>" /><![endif]-->
    </head>
    <body>

        <!-- Header -->
        <div id="header" class="skel-layers-fixed">

            <div class="top">

                <!-- Logo -->
                <div id="logo">
                      <span class="image avatar48">                
                    <img src="<?php if(isset($foto)){echo base_url('assets/images/'.$foto);} ?>" alt="" width="48" height="48"/></span>              <h1 id="title"><?php if(isset($nome)) {echo $nome;} ?></h1>
                    <p><?php if(isset($email)) {echo $email;} ?></p>
                    <p><?php if(isset($nome))echo'<a href="usuario/logout">Sair</a> '?> </p>
                </div>

                <!-- Nav -->
                <nav id="nav">
                    <!--
                    
                            Prologue's nav expects links in one of two formats:
                            
                            1. Hash link (scrolls to a different section within the page)
                            
                               <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

                            2. Standard link (sends the user to another page/site)

                               <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>
                    
                    -->
                    <ul>
                        <li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Início</span></a></li>
                        <li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Notícias</span></a></li>
                        <li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contato</span></a></li>
                        <li><a href="#cadastro" id="cadastro-link" class="skel-layers-ignoreHref"><span class="icon fa-user">Cadastro</span></a></li>
                        <li><a href="#login" id="login-link" class="skel-layers-ignoreHref"><span class="icon fa-sign-in">Login</span></a></li>
                    </ul>
                </nav>

            </div>

            <div class="bottom">

                <!-- Social Icons -->
                <ul class="icons">
                    <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                    <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
                </ul>

            </div>

        </div>
