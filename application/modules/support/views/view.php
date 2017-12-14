<?
$id = $_GET['id'];
?>

<div class="container">
  <?php foreach($this->support_model->getFaqId()->result() as $faqid) { ?>
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1><?= $faqid->title ?></h1>
      </div>
    </div>
  </div>
<div class="row">
  <div class="col-xs-12">

    <div class="panel panel-info">

  <div class="panel-body">
    <hr>
    <p><?= $faqid->longcontent ?> </p>

    <hr>


    <ul class="pager">
      <li><a href="<?= base_url();  ?>support">Go to support center</a></li>
      <li><a href="<?= base_url();  ?>home/">Go to index page</a></li>
    </ul>
    <div class="divider"></div>

<?php } ?>
