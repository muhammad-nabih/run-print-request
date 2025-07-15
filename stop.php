<?php
$programName = "Telegram.exe";

shell_exec("taskkill /F /IM \"$programName\"");
header("Location: index.php");
exit;
