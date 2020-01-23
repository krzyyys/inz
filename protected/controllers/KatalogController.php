<?php

class KatalogController extends Controller
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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	 
    public function isOwner($user, $rule)
    {
        if(!isset(Yii::app()->user->roles)) return false;
        if(Yii::app()->user->roles==='admin') return true;
        $model = $this->loadModel($_GET['id']); 
        return Yii::app()->user->id === $model->uzytkownikIDuzytkownika->IDuzytkownika;

		}
		
	public function accessRules()
	{
	
	
			return array(
			array('allow',
				'actions'=>array('index','view','Viewbyname'),
				'users'=>array('*'),
			),

			array('allow',
				'actions'=>array('create'),
				'roles'=>array('admin', 'user'),
			),
			
		 array('allow',
				'actions'=>array('admin'),
				'roles'=>array('admin',),
			),
						
			array('allow',
				'actions'=>array('update','delete','ustaw','awatar'),
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
	public function actionView($id)	{
	
      $model = $this->loadModel($id);
      
     // http://s30791.dev.pwste.edu.pl/praca/katalog/983165930  
      //0-prywatny 1-publiczny 2-udostepniony
      //jezeli widok jest prywatny
      
      
      switch ($model->widok_IDwidoku) {
    //widok prywatny
    case '0':
        //jezeli uzytkownik jest zalogowany i posiada jakas role
        if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){

            //jezeli jest to administrator lub w³aœciciel
            if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika'])){
      
                 //renderuj plik widoku z administrowaniem
                $this->render('viewadmin',array(
                'model'=>$model));
                exit();
                
             }else {
             
                       $this->redirect('index');
                       exit();
             
             } }
                       
                       $this->redirect('index');
                       exit();
             
        break;
        
    //widok publiczny
    case '1':
        //jezeli uzytkownik jest zalogowany i posiada jakas role
        if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){         
            //jezeli jest to administrator lub w³aœciciel
            if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika'])){
      
                 //renderuj plik widoku z administrowaniem
                $this->render('viewadmin',array(
                'model'=>$model));
                exit();
                }
                //renderuj plik widoku z administrowaniem
                $this->render('viewuser',array(
                'model'=>$model));
                exit();
             } 
             
                 $this->render('viewuser',array(
                'model'=>$model));
                exit();
        break;
        
         case '2':   
    //widok udostepniony
     //jezeli uzytkownik jest zalogowany i posiada jakas role
        if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){
                     
            //jezeli jest to administrator lub w³aœciciel
            if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika'])){
      
                 //renderuj plik widoku z administrowaniem
                $this->render('viewadmin',array(
                'model'=>$model));
                exit();
                
             }else {
             
                       $this->redirect('index');
                       exit();
             
             } }   else {
                       
                       $this->redirect('index');
                       exit();
             }
      
      
   }}
             
     public function actionViewbyname($nazwa)
      {
	
      
      $model = Katalog::model()->findByAttributes(array('unikalna'=>$nazwa));
      if($model===null){
                          $this->redirect($this->createUrl('/'));
                        } 
                        else if($model->widok_IDwidoku=='2'){
                        
                        if(isset(Yii::app()->user->roles)&&isset(Yii::app()->user->id)){
                     
                              //jezeli jest to administrator lub w³aœciciel
                              if(((Yii::app()->user->roles)==='admin')||(Yii::app()->user->id) === ($model->uzytkownikIDuzytkownika['IDuzytkownika'])){
      
                             //renderuj plik widoku z administrowaniem
                            $this->render('viewadmin',array(
                            'model'=>$model));
                            exit();
                            
                            } else {                        
                        
                              $this->render('viewuser',array('model'=>$model));
                }
                } else {

                        $this->render('viewuser',array('model'=>$model));
                        }
	
	} else {
	
	$this->render('viewuser',array('model'=>$model));
	
	}
	
	
	
	}
	/**
	 * ustawia obraz w katalogu
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionUstaw($id,$obraz)
	{
    
		$model=$this->loadModel($id);
    $model->plik_IDpliku=$obraz;
    
    
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file(Yii::app()->basePath."../../..".$model->plikIDpliku->adres);
    
    if (preg_match('/^image\/.+/i', $mime)) {

    
     if($model->save())  $this->redirect(array('view','id'=>$model->IDkatalogu));
     
		}
	}
	
	
	/**
	 * ustawia obraz dla uzytkownika
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionAwatar($id,$obraz)
	{
    
		$model=$this->loadModel($id);
		
		$uzytkownik=Uzytkownik::model()->findByPk($model->uzytkownik_IDuzytkownika);
		
    $uzytkownik->plik_IDpliku=$obraz;
    
    
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file(Yii::app()->basePath."../../..".$uzytkownik->plikIDpliku->adres);
    
    if (preg_match('/^image\/.+/i', $mime)) {

    
     if($uzytkownik->save())  $this->redirect(array('/uzytkownik/view','id'=>$uzytkownik->IDuzytkownika));
     
		}
	}
	



	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	 
	public function actionCreate()
	{
		$model=new Katalog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Katalog']))
		{
			$model->attributes=$_POST['Katalog'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDkatalogu));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

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

		if(isset($_POST['Katalog']))
		{
			$model->attributes=$_POST['Katalog'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->IDkatalogu));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/katalog'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Katalog',array('criteria'=>array(
        'condition'=>'widok_IDwidoku=1')));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Katalog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Katalog']))
			$model->attributes=$_GET['Katalog'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Katalog the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Katalog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Strona nie istnieje.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Katalog $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='katalog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
