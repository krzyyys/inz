<?php
/* @var $this PlikController */
/* @var $model Plik */

$this->breadcrumbs=array(
	'Pliks'=>array('index'),
	$model->IDpliku,
);

$this->menu=array(
	array('label'=>'List Plik', 'url'=>array('index')),
	array('label'=>'Create Plik', 'url'=>array('create')),
	array('label'=>'Update Plik', 'url'=>array('update', 'id'=>$model->IDpliku)),
	array('label'=>'Delete Plik', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDpliku),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Plik', 'url'=>array('admin')),
);
?>

<h1>View Plik #<?php echo $model->IDpliku; 

?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDpliku',
		'adres',
		'data',
		'widok_IDwidoku',
		'katalog_IDkatalogu',
		'uzytkownik_IDuzytkownika',
	),
)); ?>
