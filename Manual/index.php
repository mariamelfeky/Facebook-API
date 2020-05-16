<?php
    include __DIR__."/config.php";
?>
<html>
    <head></head>
    <body>
    <a href="https://www.facebook.com/v7.0/dialog/oauth?client_id=<?= FB_APP_ID ?>&redirect_uri=<?= FB_REDIRECT_URL ?>&state=localhost">Login with facebook</a>
    </body>
</html>
