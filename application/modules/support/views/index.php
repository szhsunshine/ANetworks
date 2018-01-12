<div class="container">


  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-6">
        <h3>Welcome, Hero of Azeroth!</h3>
        <blockquote>
        <p>You have to forget me, Tirion! If the world is to live free from the tyranny of fear, it must not know what has happened here today.</p>
        <small>- Bolvar Fordragón</small>
        </blockquote>
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-md-8">



  <div class="panel panel-info">
    <div class="panel-heading">F.A.Q Articles</div>
  <div class="panel-body">
    <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Title</th>
          <th>Content</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
          <?php foreach($this->support_model->getFAQ()->result() as $faq) { ?>
        <tr>
          <td><?= $faq->title ?> </td>
          <td><?= $faq->content1 ?> </td>
         <td><a href="<?= base_url();  ?>support/view?id=<?= $faq->id ?>" class="btn btn-primary btn-sm">View article</a></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

  </div>

  </div>
</div>

<div class="col-md-4">

    <div class="panel panel-default">
    <div class="panel-heading">Contact support</div>
    <div class="panel-body">
      <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
              <li><a href="<?= $this->config->item('support_ticket');?>">Ticket</a></li>
              <li><a href="<?= $this->config->item('support_forum');?>">Forums</a></li>
              <li><a href="<?= $this->config->item('support_skype');?>">Skype</a></li>
              <li><a href="<?= $this->config->item('support_discord');?>">Discord</a></li>
      </ul>
    </div>
    </div>
</div>


</div>
