<?php
/** @var $callbackId int */
/** @var $url string */
?>
<html>
<body>
<script type="text/javascript">
    window.parent.CKEDITOR.tools.callFunction("<?= $callbackId ?>", "<?= \App::$Alias->scriptUrl .  $url ?>");
</script>
</body>
</html>