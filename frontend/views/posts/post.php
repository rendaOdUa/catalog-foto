<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;
use yii\helpers\FileHelper;
use yii\bootstrap\Modal;
?>
<div class="container_catalog">
<?php foreach ($posts as $post): ?>
  <h1 style="width: 100%; text-align: center;"><?= $post->name ?></h1>
  <h6 style="text-align: center;"><?= $post->date ?></h6>
	<h3 style="width: 100%; text-align: center;"><?= $post->description ?></h3>
        <?php $files = scandir(Yii::getAlias("@root").Yii::getAlias("@web").$post->imageUrl);?>
        <?php foreach ($files as $key => $img): ?>
            <?php if ($key != 0 && $key != 1): ?>
              <?php 
                Modal::begin([
                    'header' => $img,
                    'toggleButton' => ['label' => Html::img('@web'.$post->imageUrl.'/'.$img, ['width' => '100%', "height" => '100%']),
                    'class'=>'model_button'],
                ]);

                echo Html::img('@web'.$post->imageUrl.'/'.$img, ['width' => '100%', "height" => '100%']);

                Modal::end();
              ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <br>
    
<?php endforeach; ?>
</div>