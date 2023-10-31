<?php



        return [

            'params' => [
                'maxExecutionTime' => 120,
                ],
            
            'controllerMap' => [
    'migrate' => [
        'class' => 'yii\console\controllers\MigrateController',
        'migrationPath' => [
            '@app/migrations/m181220_125829_create_user_table',
            '@app/migrations/m181222_173732_create_administrator_table',
            '@app/migrations/m181222_174013_create_member_table',
            '@app/migrations/m181222_174733_create_saving_table',
            '@app/migrations/m181222_175225_create_borrowing_saving_table',
            '@app/migrations/m181222_175405_create_borrowing_table',
            '@app/migrations/m181222_180233_create_exercise_table',
            '@app/migrations/m181222_180245_create_session_table',
            '@app/migrations/m181222_180915_create_refund_table',
            '@app/migrations/m181222_181147_create_help_table',
            '@app/migrations/m181222_181745_create_contribution_table',
            '@app/migrations/m201227_125715_seed_help_types',
            '@app/migrations/m230613_230745_create_agape_table',
            '@app/migrations/m230619_214013_create_tontine_table',
            '@app/migrations/m230701_053125_create_contribution_tontine_table',
            '@app/migrations/m201222_181934_set_foreign_keys',
            
            
            // Ajoutez d'autres chemins de migration dans l'ordre souhaité
        ],
    ],
],
// ...
];
