<?php

/** @var yii\web\View $this */
/** @var Blog blogs */
/** @var backend\models\Blog $blog */
/** @var yii\helpers\ArrayHelper $blogs */
$this->title = 'My Yii Application';
?>
<div>
    <table class="table">
        <tr>
            <td>

            </td>
        </tr>
        <?php foreach ($blogs as  $blog) {?>
        <tr>
            <td>
                <a href="<?=\yii\helpers\Url::to(['/blog/view', 'id'=>$blog->slug])?>"><?= $blog->title?></a>
            </td>
        </tr>
        <?php }?>
    </table>
</div>

