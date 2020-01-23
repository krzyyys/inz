<?php
/* @var $this UzytkownikController */
/* @var $model Uzytkownik */

$this->breadcrumbs=array(
	'Uzytkowniks'=>array('index'),
	$model->IDuzytkownika,
);

/*$this->menu=array(
	array('label'=>'List Uzytkownik', 'url'=>array('index')),
	array('label'=>'Create Uzytkownik', 'url'=>array('create')),
	array('label'=>'Update Uzytkownik', 'url'=>array('update', 'id'=>$model->IDuzytkownika)),
	array('label'=>'Delete Uzytkownik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDuzytkownika),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Uzytkownik', 'url'=>array('admin')),
);
*/

?>


<h1>Profil użytkownika <?php echo $model->login; ?></h1>


<table class="detail-view" id="yw0">
<tr class="odd"><th>Imie</th><td><?php echo CHtml::encode($model->imie); ?></td></tr>
<tr class="odd"><th>Awatar</th><td>
<?php if(empty(CHtml::encode($model->plikIDpliku['adres']))) { 
                    ?>
                    <img class="img-responsive  center-block" src="https://placeholdit.imgix.net/~text?txtsize=80&txt=nie+wybrano+awatara&w=700&h=300"  style="max-height:250px; width:100%; overflow:hidden;"  alt="">
                    <?php }                 
                                        
                    else
                    { ?>
                    <img class="img-responsive  center-block" src="<?php echo CHtml::encode($model->plikIDpliku['adres']); ?>" style="max-height:250px; width:100%; overflow:hidden;" alt="">
                    <?php } ?>

</td></tr>
<tr class="odd"><th>E-mail</th><td><?php echo CHtml::encode($model->email); ?></td></tr>
<?php if($model->katalogs!=NULL){ ?>
<tr class="even"><th>Katalogi uzytkownika</th><td>


   <?php
foreach ($model->katalogs as $cosik){

  echo '<b>'.CHtml::link($cosik['nazwa'],array('katalog/'.$cosik['IDkatalogu'])).' ('. CHtml::encode($cosik['widokIDwidoku']['nazwa']).')</b> <br /> '.CHtml::encode($cosik['opis']).' <br /><br />';
}

?>
</td></tr>

<?php

}

?>

</table>
 
                  
                  <?php
                  echo CHtml::button("Zmień hasło", 
                                                      array('submit' => array("uzytkownik/changepassword","id"=>$model->IDuzytkownika),
                                                      'class'=>'btn btn-primary btn-block',
                                                      'encode' => false,
                                                       ));  
                  ?> 
                  <?php
                  echo CHtml::button("Zmień dane", 
                                                      array('submit' => array("uzytkownik/update","id"=>$model->IDuzytkownika),
                                                      'class'=>'btn btn-warning btn-block',
                                                      'encode' => false,
                                                       ));  
                  ?> 
                  <?php
                  echo CHtml::button("Usuń", 
                                                      array('submit' => array("uzytkownik/delete","id"=>$model->IDuzytkownika),
                                                      'confirm'=>'Jesteś pewny, że chcesz usunąć konto?',
                                                      'class'=>'btn btn-danger btn-block',
                                                      'encode' => false,
                                                       ));  
                  ?> 
                  <br /><br />






