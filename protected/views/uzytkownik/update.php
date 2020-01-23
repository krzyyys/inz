<?php
/* @var $this UzytkownikController */
/* @var $model Uzytkownik */

$this->breadcrumbs=array(
	'Uzytkowniks'=>array('index'),
	$model->IDuzytkownika=>array('view','id'=>$model->IDuzytkownika),
	'Update',
);


?>

<h1>Aktualizacja  <?php echo $model->login; ?></h1>

<?php $this->renderPartial('_form2', array('model'=>$model)); ?>