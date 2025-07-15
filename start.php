<?php
$programPath = "C:\\Users\\GAMING STORE\\Desktop\\Telegram.lnk";
shell_exec("start \"\" \"$programPath\"");
header("Location: index.php");
exit;
