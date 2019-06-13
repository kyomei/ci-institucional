<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/4.0/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$description?>">
    <meta name="author" content="Rafael Jeferson">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?=$title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/css/carousel.css" rel="stylesheet');?>">
  </head>
  <body cz-shortcut-listen="true">

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
         <?php $this->load->view('commons/menu'); ?>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">
