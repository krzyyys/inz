<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Cyfrowe archiwum dokumentow osobistych',

	// preloading 'log' component
	'preload'=>array(    
    'bootstrap'
),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
	'modules'=>array(
     
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class' => 'WebUser',
		),
		
		//'authManager'=>array(
					// 'class'=>'CPhpAuthManager',
//          'authFile' => ''                  // only if necessary
	//		),
			

		
		'bootstrap' => array(
            'class' => 'booster.components.Booster',
        ),

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName' => false, // usuniecie index.php z adresu
			'rules'=>array(
        'login'=>'site/login',
        'signup'=>'uzytkownik/create',
        'logout'=>'site/logout',
        'admin'=>'site/admin',
        'udostepnione/<nazwa:\w+>'=>'katalog/viewbyname',
        //'/profiles/<id:\d+>'=>'/uzytkownik/view',
        
       
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				
				
				//katalogi
				'katalog/<action:\w+>/<id:\d+>'=>'katalog/<action>',
				'katalog/<action:\w+><id:\w+>'=>'katalog/<action>',		
	
			),
			
		),


		'db'=>array(
        'connectionString' => 'mysql:host=serwer_bazy_danych;dbname=nazwa_bazy',
        'emulatePrepare' => true,
        'username' => 'login_do_bazy',
        'password' => 'haslo_bazy',
        'charset' => 'utf8',
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'krzysztof@barszcz.tk',
		
		//ze wzgledu na serwer dev.pwste.edu.pl 
		//ustawienia dotycz¹ce wysy³ania plików na serwer ograniczenie do :
		'maxFileupload'=>'2048',    //2 mb jako plik
		'maxPostsize'=>'8192',      //8mb jako ca³y $_POST
		'maxFile'=>'20',            //20 plików w ca³ym $_POST
		//dostêpne formaty do wysylania plików
		'fileFormat'=>array('txt','js','json','htm','html','css','xml','swf','flv','png','jpeg','jpg','gif','bmp','tiff','tif','svg','svgz','zip', '7zip', 'rar','mp3','pdf','psd', 'doc','docx','rtf','xls','xlsx','ppt','pptx','odt','ods')
	),
);