<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Библиотека',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	
	$isGuest =  Yii::$app->user->isGuest;
	
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' =>  $isGuest ? [   	
							 ['label' => 'Регистрация', 'url' => ['/libs/regist']],
							 ['label' => 'Вход', 'url' => ['/libs/login']],
						]:[
							'<li>'
							. Html::beginForm(['/libs/logout'], 'post')
							. Html::submitButton(
								'Выход (' . Yii::$app->user->identity->username . ')',
								['class' => 'btn btn-link logout']
							)
							. Html::endForm()
							. '</li>'
					   ]
       
    ]);
    NavBar::end();

    ?>

    <div class="container">

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>	
		
		
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<script>

   var Url_to = '<?=Url::to([''])?>';

</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
