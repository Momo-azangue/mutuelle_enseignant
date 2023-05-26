'mail' => array(
				'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => false,
				'transportType'=>'smtp',
				'transport'=>array(
                        'class' => 'Swift_SmtpTransport',
						'host'=>'smtp.gmail.com',
						'username'=>'azanguewill@gmail.com',
						'password'=>'hszkplyonwzizggk',
						'port'=>'25',
                        'encryption' => 'tls',
				),
				'viewPath' => 'application.views.mail',
		),

'params' => [
            'maxExecutionTime' => 120,
            ],

