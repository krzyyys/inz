<?php
/* @var $this PlikController */
/* @var $model Plik */

$this->breadcrumbs=array(
	'Pliks'=>array('index'),
	$model->IDpliku=>array('view','id'=>$model->IDpliku),
	'Update',
);

/*$this->menu=array(
	array('label'=>'List Plik', 'url'=>array('index')),
	array('label'=>'Create Plik', 'url'=>array('create')),
	array('label'=>'View Plik', 'url'=>array('view', 'id'=>$model->IDpliku)),
	array('label'=>'Manage Plik', 'url'=>array('admin')),
);
*/
?>

<h1>Aktualizujesz plik <?php echo $model->nazwa; ?></h1> <br />

<?php $this->renderPartial('_form', array('model'=>$model)); ?>