<?php
/* @var $this KatalogController */
/* @var $model Katalog */

$this->breadcrumbs=array(
	'Katalogs'=>array('index'),
	$model->IDkatalogu=>array('view','id'=>$model->IDkatalogu),
	'Update',
);


?>

<h1>Aktualizacja katalogu <?php echo $model->nazwa; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>