<?php

use yii\web\View;
use zencharts\businesslayer\UserPermission;
use zencharts\components\Url;
use zencharts\helpers\Html;

/* @var $this View */

?>

<?= $this->render('/common/tabs') ?>

<div class="row general-settings-container">

    <!--USER SETTINGS-->
    <div class="col-xs-12"><h4>User Settings</h4></div>

    <?php foreach (Yii::$app->rightsNegotiator->getSystemAdministrationRightsNegotiator()->getAllSubNavs(Yii::$app->controller->navId) as $subNav) { ?>

        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <?= Html::a(Html::tag('span', Html::img(Yii::$app->rightsNegotiator->getSystemAdministrationRightsNegotiator()
                    ->getSubNavIconUrl($subNav['sub_nav_id']))) . Html::tag('span', $subNav['sub_nav_name'], [
                    'class' => 'general-settings-text',
                ]), Url::to([$subNav['sub_nav_uri']]), [
                'class' => 'bordered-content',
            ]); ?>
        </div>

    <?php } ?>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <?= Html::a(Html::tag('span', Html::img('/images/settings/users_setting_icon.svg')) . Html::tag('span', ' Users', ['class' => 'general-settings-text']). Html::tag('span', ' Advanced Settings.', ['class' => 'general-settings-text']), Url::to(['/system_administration/system-settings/user-credentials']), [
            'class' => 'bordered-content',
        ]) ?>
    </div>

    <?php if (UserPermission::isSuperUser()) { ?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
            <?= Html::a(Html::tag('span', Html::img('/images/settings/general_setting_icon.svg')) . Html::tag('span', ' API Users', ['class' => 'general-settings-text']), Url::to(['/system_administration/system-settings/api-users']), [
                'class' => 'bordered-content',
            ]) ?>
        </div>
    <?php } ?>

    <!--PROFILE SETTINGS-->
    <div class="col-xs-12"><h4>Profile Settings</h4></div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
        <?= Html::a(Html::tag('span', Html::img('/images/settings/general_setting_icon.svg')) . Html::tag('span', ' Profile Settings', [
                'class' => 'general-settings-text',
            ]), Url::to(['/system_administration/user-management/users/edit', 'id' => Yii::$app->user->id]), [
            'class' => 'bordered-content',
        ]); ?>
    </div>
</div>
