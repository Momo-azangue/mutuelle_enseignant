<?php 

use yii\bootstrap\Html;

$this->beginBlock('title'); ?>
Connexion
<?php $this->endBlock('title'); ?>



<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-1">
            <!-- Card -->
            <div class="card">
                <div class="view overlay">
                    <img class="card-img-top" style="height: 150px" src="/img/admin_connection.jpg" alt="Card image cap">
                    <a href="javascript:void()">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body" >
                    <h4 class="card-title">Administrateur</h4>
                    <p class="card-text" style="height: 5rem">Les administrateurs ont le droit d'enregistrer des entrées, et des sorties d'argents.</p>
                    <button data-toggle="modal" data-target="#modalAdministrator" class="btn btn-primary">Connexion</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-1">
            <div class="card">
                <div class="view overlay">
                    <img class="card-img-top" style="height: 150px" src="/img/member_connection.jpg" alt="Card image cap">
                    <a href="javascript:void()">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Membre</h4>
                    <p class="card-text" style="height: 5rem">Les membres peuvent voir les informations sur leurs comptes ainsi que les informations générales de la mutuelle.</p>
                    <button data-toggle="modal" data-target="#modalMember" class="btn btn-primary">Connexion</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form class="modal-content" action="<?= Yii::getAlias("@guest.member_form")?>" method="post">
            <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Connexion - Membre</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3" >
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" required id="member-username" class="form-control validate" name="username">
                    <label data-error="wrong" data-success="right" for="member-username">Votre pseudo</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-key prefix grey-text"></i>
                    <input type="password" required id="member-password" class="form-control validate" name="password">
                    <label data-error="wrong" data-success="right" for="member-password">Votre mot de passe</label>
                </div>
                <div class="reset-password ">
                    Réinitialiser <?= Html::a('mots de passe', ['guest/request-password-reset']) ?>?
                </div>
                <div class="custom-control custom-checkbox mb-4 text-right">
                    <input type="checkbox" class="custom-control-input" name="remember" id="member-rememberMe">
                    <label class="custom-control-label" for="member-rememberMe">Se souvenir</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" type="submit">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalAdministrator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" >
        <form class="modal-content" method="post" action="<?= Yii::getAlias("@guest.administrator_form")?>">
            <input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Connexion - Administrateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3" >
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" required id="administrator-username" class="form-control validate" name="username">
                    <label data-error="wrong" data-success="right" for="administrator-username">Votre pseudo</label>
                </div>

                <div class="md-form mb-5">
                    <i class="fas fa-key prefix grey-text"></i>
                    <input type="password" required id="administrator-password" class="form-control validate" name="password">
                    <label data-error="wrong" data-success="right" for="administrator-password">Votre mot de passe</label>
                </div>
      <!-- attention ici là je dois être attentif -->
                <div class="reset-password ">
                    Réinitialiser votre <?= Html::a('mots de passe', ['guest/request-password-reset']) ?>?
                </div>

                <div class="custom-control custom-checkbox mb-4 text-right">
                    <input type="checkbox" class="custom-control-input" name="rememberMe" id="administrator-rememberMe">
                    <label class="custom-control-label" for="administrator-rememberMe">Se souvenir</label>
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Se connecter</button>
            </div>
        </form>
    </div>
</div>