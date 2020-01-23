<?php
/* @var $this UzytkownikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Uzytkowniks',
);

$this->menu=array(
	array('label'=>'Create Uzytkownik', 'url'=>array('create')),
	array('label'=>'Manage Uzytkownik', 'url'=>array('admin')),
);
?>

<h1>Uzytkowniks</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
