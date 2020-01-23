<?php
/* @var $this PlikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pliks',
);

$this->menu=array(
	array('label'=>'Create Plik', 'url'=>array('create')),
	array('label'=>'Manage Plik', 'url'=>array('admin')),
);
?>

<h1>Pliks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
