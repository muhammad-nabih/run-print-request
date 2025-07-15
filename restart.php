<?php
$programName = "Telegram.exe";

$programPath = "C:\\Users\\GAMING STORE\\Desktop\\Telegram.lnk";

// Kill first
shell_exec("taskkill /F /IM \"$programName\"");
sleep(2); // Wait before restarting
shell_exec("start \"\" \"$programPath\"");
header("Location: index.php");
exit;
