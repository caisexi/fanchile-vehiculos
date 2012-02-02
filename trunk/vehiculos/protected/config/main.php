<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SISTEMA DE CONTROL DE FLOTA DE VEHICULOS',
    
        'theme'=>'fanchile',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*', 
                'application.modules.srbac.controllers.SBaseController'
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'hola123',
                        'generatorPaths' => array(
			'ext.giix-core', // giix generators
                        ),
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
                'srbac' => array(
                     'userclass'=>'Usuarios', //default: User
                     'userid'=>'id', //default: userid
                     'username'=>'usuario', //default:username
                     'delimeter'=>'@', //default:-
                     'debug'=>true, //default :false
                     'pageSize'=>10, // default : 15
                     'superUser' =>'Authority', //default: Authorizer
                     'css'=>'srbac.css',  //default: srbac.css
                     'layout'=>
                       'application.views.layouts.main', //default: application.views.layouts.main,                                          //must be an existing alias
                     'notAuthorizedView'=> 'srbac.views.authitem.unauthorized', // default:                   
                                       //srbac.views.authitem.unauthorized, must be an existing alias
                     'alwaysAllowed'=>array(   //default: array()
                      'SiteLogin','SiteLogout','SiteIndex','SiteAdmin',
                     'SiteError', 'SiteContact'),
                     'userActions'=>array('Show','View','List'), //default: array()
                    'listBoxNumberOfLines' => 15,  //default : 10
                    'imagesPath' => 'srbac.images', // default: srbac.images
                     'imagesPack'=>'tango', //default: noia
                     'iconText'=>true, // default : false
                     'header'=>'srbac.views.authitem.header', //default : srbac.views.authitem.header, 
                                                              //must be an existing alias
                     'footer'=>'srbac.views.authitem.footer', //default: srbac.views.authitem.footer, 
                                                              //must be an existing alias
                     'showHeader'=>true, // default: false
                     'showFooter'=>true, // default: false
                     'alwaysAllowedPath'=>'srbac.components', // default: srbac.components
                                                              // must be an existing alias
                   )
	),

	// application components
	'components'=>array(
                'ePdf' => array(
        'class'         => 'ext.yii-pdf.EYiiPdf',
        'params'        => array(
            'mPDF'     => array(
                'librarySourcePath' => 'application.vendors.mpdf.*',
                'constants'         => array(
                    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                ),
                'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                /*'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                    'mode'              => '', //  This parameter specifies the mode of the new document.
                    'format'            => 'A4', // format A4, A5, ...
                    'default_font_size' => 0, // Sets the default document font size in points (pt)
                    'default_font'      => '', // Sets the default font-family for the new document.
                    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                    'mgr'               => 15, // margin_right
                    'mgt'               => 16, // margin_top
                    'mgb'               => 16, // margin_bottom
                    'mgh'               => 9, // margin_header
                    'mgf'               => 9, // margin_footer
                    'orientation'       => 'P', // landscape or portrait orientation
                )*/
            ),
            'HTML2PDF' => array(
                'librarySourcePath' => 'application.vendors.html2pdf.*',
                'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                /*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                    'orientation' => 'P', // landscape or portrait orientation
                    'format'      => 'A4', // format A4, A5, ...
                    'language'    => 'en', // language: fr, en, it ...
                    'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                    'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                    'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                )*/
            )
        ),
    ),
    //...

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=vehiculos',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'hola123',
			'charset' => 'utf8',
                        'enableParamLogging' => true,
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
             'authManager'=>array(
                    // Path to SDbAuthManager in srbac module if you want to use case insensitive  
                     //access checking (or CDbAuthManager for case sensitive access checking)
                    'class'=>'application.modules.srbac.components.SDbAuthManager',
                    // The database component used
                    'connectionID'=>'db',
                    // The itemTable name (default:authitem)
                'itemTable'=>'items',
                    // The assignmentTable name (default:authassignment)
                'assignmentTable'=>'assignments',
                    // The itemChildTable name (default:authitemchild)
                'itemChildTable'=>'itemchildren',
                  )
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'fcontreras@f.anchile.cl',
                'salt'=>'1234re43wd24sffggg35awr',
	),
);