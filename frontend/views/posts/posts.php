<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\FileHelper;
?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
<div class="container_catalog">
<?php foreach ($posts as $post): ?>
    <a href=<?= "?r=posts%2Fpost&id=".$post->id ?>>
    <div class="poster" >
        <h4><?= $post->name ?></h4>
        <?php $files = scandir(Yii::getAlias("@root").Yii::getAlias("@web").$post->imageUrl);?>
        <?= Html::img('@web'.$post->imageUrl.'/'.$files[2], ['width' => '90%', "height" => '80%']) ?>
        <br>
    </div>
    </a>
<?php endforeach; ?>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>