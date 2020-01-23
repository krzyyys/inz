<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;

$model=NULL;

?>


<div id="exTab1" class="container">	
<ul  class="nav nav-pills">
			<li class="active">
        <a  href="#1a" data-toggle="tab">Uzytkownicy</a>
			</li>
			<li><a href="#2a" data-toggle="tab">Katalogi</a>
			</li>
			<li><a href="#3a" data-toggle="tab">Pliki</a>
			</li>
		</ul>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="1a">
         <?php Yii::app()->runController('uzytkownik/admin'); ?>
				</div>
				<div class="tab-pane" id="2a">
          <?php Yii::app()->runController('katalog/admin'); ?>
				</div>
        <div class="tab-pane" id="3a">
          <?php Yii::app()->runController('plik/admin');?>
				</div>
			</div>
  </div>
  



