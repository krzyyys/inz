<?php
/* @var $this PlikController */
/* @var $model Plik */

$this->breadcrumbs=array(
	'Pliks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Plik', 'url'=>array('index')),
	array('label'=>'Manage Plik', 'url'=>array('admin')),
);
?>

<h1>Create Plik</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>