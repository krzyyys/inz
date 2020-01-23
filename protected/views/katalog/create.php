<?php
/* @var $this KatalogController */
/* @var $model Katalog */

$this->breadcrumbs=array(
	'Katalogs'=>array('index'),
	'Create',
);

?>

<h1>Tworzenie katalogu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>