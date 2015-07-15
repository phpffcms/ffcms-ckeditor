<?php
/** @var $callbackId int */
/** @var $message string */
?>
<html>
<body>
<script type="text/javascript">
    window.parent.CKEDITOR.tools.callFunction("<?= $callbackId ?>", "", "<?= \App::$Security->strip_tags($message) ?>");
</script>
</body>
</html>