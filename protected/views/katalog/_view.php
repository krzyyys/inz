<?php
/* @var $this KatalogController */
/* @var $data Katalog */

?>

<div class="view">


<!-- Project One -->
        <div class="row">
            <div class="col-md-7">
                <a href="<?php echo CHtml::encode($data->IDkatalogu); ?>">
                    <?php if(empty(CHtml::encode($data->plikIDpliku['adres']))) { 
                    ?>
                    <img class="img-responsive  center-block" src="https://placeholdit.imgix.net/~text?txtsize=80&txt=nie+wybrano+miniatury&w=700&h=300"  style="max-height:250px; width:100%; overflow:hidden;"  alt="">
                    <?php }                 
                                        
                    else
                    { ?>
                    <img class="img-responsive  center-block" src="<?php echo CHtml::encode($data->plikIDpliku['adres']); ?>" style="max-height:250px; width:100%; overflow:hidden;" alt="">
                    <?php } ?>
                </a>
            </div>
            <div class="col-md-5">
                <h3>	<?php echo CHtml::encode($data->nazwa); ?></h3>
                <h4>	<?php echo CHtml::encode($data->uzytkownikIDuzytkownika['login']); ?></h4>
                <p>	  <?php echo CHtml::encode($data->opis); ?></p>
                
                <a class="btn btn-warning btn-block" href="/praca/katalog/<?php echo CHtml::encode($data->IDkatalogu); ?>">Zobacz katalog <span class="glyphicon glyphicon-chevron-right"></span></a>
                  
                	
                	
              
            </div>
        </div>
        <!-- /.row -->
	<br />
</div>