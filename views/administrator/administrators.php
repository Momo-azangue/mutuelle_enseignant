<?php $this->beginBlock('title') ?>
    Administrateurs
<?php $this->endBlock() ?>
<?php $this->beginBlock('style') ?>
    <style>
    </style>
<?php $this->endBlock() ?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php if (count($administrators)): ?>
                <div class="col-12 mt-2">
                    <div class="row">
                        <?php foreach ($administrators as $administrator): ?>
                            <?php
                            $user = $administrator->user();
                            ?>
                            <div class="col-4 mb-2">
                                <div class="card">
                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img class="card-img-top"
                                             src="<?= \app\managers\FileManager::loadAvatar($user, "256") ?>"
                                             style="height: 12rem" alt="Card image cap">
                                        <a href="javascript:void()">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!-- Card content -->
                                    <div class="card-body">

                                        <!-- Title -->
                                        <h4 class="card-title text-capitalize"><?= $user->name . ' ' . $user->first_name ?>
                                            <?php
                                            if ($user->id == $this->params['user']->id):
                                                ?>
                                                <span class="text-secondary">(Vous)</span>
                                            <?php
                                            endif;
                                            ?>
                                        </h4>
                                        <!-- Text -->
                                        <p class="card-text">
                                            <span>Pseudo : </span><span
                                                    class="blue-text"><?= $administrator->username ?></span>
                                            <br>
                                            <span>Téléphone : </span><span class="text-secondary"><?= $user->tel ?></span>
                                            <br>
                                            <span>Email : </span><span class="blue-text"><?= $user->email ?></span>
                                            <br>
                                            <span>Adresse : </span><span class="text-secondary"><?= $user->address ?></span>
                                            <br>
                                            <span>Créé le : </span><span class="text-secondary"><?= $user->created_at ?></span>
                                        </p>
                                        <!-- Button -->
                                    </div>
                                    <?php
                                    if ($administrator->root):
                                        ?>
                                        <div class="card-footer primary-color text-white text-center">
                                            Root
                                        </div>
                                    <?php
                                    endif; ?>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
if ($this->params['administrator']->root):
    ?>
    <a href="<?= Yii::getAlias("@administrator.new_administrator") ?>" class="btn btn-primary btn-add"><i
                class="fas fa-plus"></i></a>
<?php
endif;