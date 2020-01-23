<?php

class PlikController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

public function isOwner($user, $rule)
	 {   
        if(!isset(Yii::app()->user->roles)) return false;
        if(Yii::app()->user->roles==='admin') return true;
        $model = $this->loadModel($_GET['id']); 
        return Yii::app()->user->id === $model->uzytkownikIDuzytkownika->IDuzytkownika;

		}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','plikCreateAjax','delete','admin','isOwner'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete'),
				'users'=>array('admin','user'),
			),
			
			array('allow',
				'actions'=>array('update','delete'),
				'expression' => array($this, 'isOwner'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
      $model = new Plik;
			$this -> render('create', array('model' => $model, ));
	}
	
	
	
		public function actionPlikCreateAjax($id){
		 
		 	 
		 //array_merge dodaje do siebie tablice, z globalnych zmiennych i robi je "du¿e" :)) 
		 
$valid_formats = array_merge(Yii::app()->params['fileFormat'],array_map('strtoupper', Yii::app()->params['fileFormat']));
$max_file_size = 1024*1024*2;
$path = "uploads/"; // Upload directory
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to exeicute all files
	foreach ($_FILES['myfile']['name'] as $f => $name) {     
	    if ($_FILES['myfile']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['myfile']['error'][$f] == 0) {	           
	        if ($_FILES['myfile']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
              
              
              $format = '%d%m%Y%H%M%S';
              $strf = strftime($format);
              $nazwa = $name;
              $name = str_replace(" ", "_", $name);
                           
              $sciezka = $path.$strf."-".str_pad(mt_rand(0, 999999999), 11, '0', STR_PAD_LEFT)."-".Yii::app()->user->id."-".$name;
	            if(move_uploaded_file($_FILES["myfile"]["tmp_name"][$f], $sciezka)){
                      

                      
                      $img_add = new Plik();
                      $img_add->nazwa = $nazwa;
                      $img_add->typ = pathinfo($nazwa, PATHINFO_EXTENSION);
                      
                      //mime_content_type($sciezka);

                      $img_add->adres = "/praca/$sciezka"; //it might be $img_add->name for you, filename is just what I chose to call it in my model
                      
                      $img_add->katalog_IDkatalogu = $id; // this links your picture model to the main model (like your user, or profile model)
                      $img_add->uzytkownik_IDuzytkownika = Yii::app()->user->id; 
                      $img_add->save(); // DONE
	            
                      $count++; // Number of successfully uploaded file
	            
	            }
	        }
	    }
	}
}

}
    

    /*$target_path = "uploads/";
    $ext = explode('.', basename( $file['name']));
    $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext)-1]; 

    if(move_uploaded_file($_FILES['myfile']['tmp_name'][$i], $target_path)) {
        echo "The file has been uploaded successfully <br />";
    } else{
        echo "There was an error uploading the file, please try again! <br />";
    }
      */
 

    


    
    
    
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Plik']))
		{
			$model->attributes=$_POST['Plik'];
			if($model->save())
				$this->redirect(array('/katalog/view','id'=>$model->katalog_IDkatalogu));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		

		//usuniecie pliku z serwera przeniesione do modelu
		//unlink(Yii::app()->basePath."../../..".$model->adres);

		
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array($this->redirect(Yii::app()->request->urlReferrer)));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Plik');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Plik('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Plik']))
			$model->attributes=$_GET['Plik'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Plik the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Plik::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Plik $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='plik-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
