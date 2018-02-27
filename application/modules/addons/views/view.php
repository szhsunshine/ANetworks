<?php
$category = array(
     1 => 'Action Bars',
     2 => 'Chat & Communication',
     3 => 'Artwork',
     4 => 'Auction & Economy',
     5 => 'Audio & Video',
     6 => 'Bags & Inventory',
     7 => 'Boss Encounters',
     8 => 'Buffs & Debuffs',
     9 => 'Class',
     10 => 'Combat',
     11 => 'Guild',
     12 => 'Mail',
     13 => 'Map & Minimap',
     14 => 'Minigames',
     15 => 'Miscellaneous',
     16 => 'Professions',
     17 => 'PvP',
     18 => 'Quests & Leveling',
     19 => 'Roleplay',
     20 => 'Tooltip',
     21 => 'Unitframes'
	);

	$expansion = array(
	1 => 'Classic',
	2 => 'The Burning Crusader',
	3 => 'Wrath of the Lich King',
	4 => 'Cataclysm',
	5 => 'Mist of Pandaría',
	6 => 'Warlords of Draenor',
	7 => 'Legión'
);

	?>


<div class="container">
<br/>
<div class="about bg-addons col-sm-12" id="about">
      <?php if(isset($_POST['button_get']))
      {
        $this->addon_model->download($idaddon);
      } ?>

  <div class="about-w3lsrow">
    <div class="col-sm-8 w3about-img">
      <div class="w3about-text">
         <?php foreach($this->addon_model->getInformation($idaddon)->result() as $add) { ?>
        <h5 class="w3l-subtitle">- <?= $add->addon_name ?> </h5>
        <small> Game Versión :
          <?php foreach($this->addon_model->versionSelected($add->addon_version)->result() as $version) { ?>
             <?= $version->gameversion ?></small>
           <?php } ?>
| <small> Uploaded : <?= date('Y-m-d', $add->uploaded); ?> </small>
        <p><?= substr($add->addon_description, 0, 300) ?></p>
        <br />
        <div class="clearfix"> </div>
        <form class="form-horizontal" method="post">
        <input type="submit" class="btn-sm btn-primary" name="button_get" value="Download" />
        <!-- Edit for editors -->
        <button class="btn-sm btn-warning"> Edit</button>
        </form>
      <?php } ?>

      </div>
    </div>



</div>

</div>
<br />
    <div class="portfolio bg-dark" id="gallery">
        <div class="agileits-title">
          <h3>Gallery</h3>
        </div>
        <br />


        	<div class="filtr-item w3layouts agileits portfolio-t" data-category="1, 5" data-sort="Busy streets">
  					<a href="<?= base_url() ?>assets/images/p1.jpg" class="b-link-stripe w3layouts agileits b-animate-go thickbox">
  						<figure>
  							<img src="<?= base_url() ?>assets/images/p1.jpg" class="img-responsive w3layouts agileits" alt="W3layouts Agileits">
  							<figcaption>
  								<h3>ANetwork <span>Hub</span></h3>
  							</figcaption>
  						</figure>
  					</a>
  				</div>

          <div class="filtr-item w3layouts agileits" data-category="2, 5" data-sort="Luminous night">
            <a href="<?= base_url() ?>assets/images/p1.jpg" class="b-link-stripe w3layouts agileits b-animate-go thickbox">
              <figure>
                <img src="<?= base_url() ?>assets/images/p1.jpg" class="img-responsive w3layouts agileits" alt="W3layouts Agileits">
                <figcaption>
                  <h3>ANetwork <span>Hub</span></h3>
                </figcaption>
              </figure>
            </a>
          </div>



        <div class="filtr-item w3layouts agileits" data-category="2, 5" data-sort="Luminous night">
            <a href="<?= base_url() ?>assets/images/p1.jpg" class="b-link-stripe w3layouts agileits b-animate-go thickbox">
              <figure>
                <img src="<?= base_url() ?>assets/images/p1.jpg" class="img-responsive w3layouts agileits" alt="W3layouts Agileits">
                <figcaption>
                  <h3>ANetwork <span>Hub</span></h3>
                </figcaption>
              </figure>
            </a>
          </div>
          <br />
          <br />
</div>

<div class="portfolio bg-addons" id="gallery">
<br/>
<br/>
<br/>
    <div class="agileits-title">
      <h3>You may be interested the following addons</h3>
    </div>
    <ul class="simplefilter w3layouts agileits">
    <?php foreach($this->addon_model->getRamdonAddons($idaddon)->result() as $rad) { ?>
    <a href="<?= base_url() ?>addons/view/<?= $rad->id ?>">
    <li class="w3layouts agileits"> <?= $rad->addon_name ?></li>
  </a>
    <?php } ?>
    </ul>
</div>


</div>
