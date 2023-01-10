'mail' => array(
				'class' => 'ext.yii-mail.YiiMail',
				'transportType'=>'smtp',
				'transportOptions'=>array(
						'host'=>'<hostanme>',
						'username'=>'<username>',
						'password'=>'<password>',
						'port'=>'25',						
				),
				'viewPath' => 'application.views.mail',				
		),