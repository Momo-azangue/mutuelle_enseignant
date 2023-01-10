<?php $this->beginBlock('title') ?>
Types d'aide
<?php $this->endBlock()?>
<?php $this->beginBlock('style')?>
<style>
    .img-container {
            display: inline-block;
            width: 150px;
            height: 150px;
        }
        .img-container img{
            width: 100%;
            height: 100%;
            border-radius: 1000px;
        }
        .white-block {
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.49);
        }

        .labels .col-7 {
            color: dodgerblue;
        }
</style>
<?php $this->endBlock()?>


<div class="container mt-5 mb-5">

    <?php if (count($helptype)):?>
        <div class="col-12 white-block mb-2">
        
        <table class="table table-hover">
            <thead class="blue-grey lighten-4">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Montant</th>
                </tr>

            </thead>
            <tbody>
                <?php foreach ($helptype as $index => $ht): ?>
                    <tr>
                        <th scope="row"><?= $index + 1 ?></th>
                        <td class="blue-text"><?= $ht->title ?> </td>
                        <td><?= $ht->amount ?> XAF</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php else: ?>
        <div class="row">
            <h1 class="col-12 text-center text-muted">Aucun type d'aide enregistré.</h1>
        </div>
    <?php endif;?>

</div>