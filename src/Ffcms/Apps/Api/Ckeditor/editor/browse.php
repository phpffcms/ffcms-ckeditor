<?php
/** @var $callbackName string */
use Ffcms\Core\Helper\Type\Str;
use Ffcms\Apps\Api\Ckeditor\Editor;

/** @var $callbackId int */
/** @var $files array|null */
/** @var $type string */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo \App::$Alias->getVendor('css', 'bootstrap'); ?>"/>
    <link rel="stylesheet" href="<?php echo \App::$Alias->getVendor('css', 'fa'); ?>"/>
    <title><?= __('FFCMS file browser') ?></title>
    <script>
        var CKcallback = <?= $callbackId ?>;
        function callCkeditor(url) {
            window.opener.CKEDITOR.tools.callFunction(CKcallback, url);
            window.close();
        }
    </script>
    <style>
        .image-item {
            height: 100px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<h2 class="text-center"><?= __('File browser') ?></h2>
<div class="row">
    <div class="col-md-12">
        <?php echo \Ffcms\Core\Helper\HTML\Bootstrap\Nav::display([
            'property' => ['class' => 'nav-tabs'],
            'tabAnchor' => 'n',
            'items' => [
                ['type' => 'link', 'text' => __('Images'), 'link' => ['ckbrowser/browse', 'images', null, ['CKEditor' => $callbackName, 'CKEditorFuncNum' => $callbackId]]],
                ['type' => 'link', 'text' => __('Flash'), 'link' => ['ckbrowser/browse', 'flash', null, ['CKEditor' => $callbackName, 'CKEditorFuncNum' => $callbackId]]],
                ['type' => 'link', 'text' => __('Files'), 'link' => ['ckbrowser/browse', 'files', null, ['CKEditor' => $callbackName, 'CKEditorFuncNum' => $callbackId]]],
            ]
        ]); ?>
    </div>
</div>

<div class="row" style="padding-top: 10px;margin-left: 5px;">
    <?php if ($files !== null && count($files) > 0): ?>
        <?php foreach ($files as $file): ?>
            <div class="col-md-2 well" style="margin-left: 5px;">
                <div class="text-center"><strong><?= basename($file) ?></strong></div>
                <?php if ($type === 'images'): ?>
                <img src="<?= \App::$Alias->scriptUrl . '/' . $file ?>" class="img-responsive image-item" />
                <?php elseif ($type === 'flash'): ?>
                    <div class="text-center"><i class="fa fa-file-video-o fa-4x"></i></div>
                <?php else: ?>
                    <div class="text-center"><i class="fa fa-file fa-4x"></i></div>
                <?php endif; ?>
                <div class="text-center" style="padding-top: 5px;">
                    <a href="javascript::void(0)" onclick="return callCkeditor('<?= \App::$Alias->scriptUrl . '/' . $file ?>')" class="btn btn-success btn-sm"><i class="fa fa-check"></i> <?= __('Select') ?></a>
                    <a href="<?= \App::$Alias->scriptUrl . '/' . $file ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> <?= __('Preview') ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
    <div class="col-md-12"><p class="alert alert-warning"><?= __('Files not found') ?></p></div>
    <?php endif; ?>
</div>


</body>
</html>