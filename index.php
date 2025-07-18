<?php
$programName = "Telegram.exe";

function isProgramRunning($programName)
{
    $output = shell_exec("tasklist /FI \"IMAGENAME eq $programName\"");
    return strpos($output, needle: $programName) !== false;
}

$running = isProgramRunning($programName);
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        مراقب برنامج الطباعة
    </title>
    <link rel="stylesheet" href="public/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
    <link rel="shortcut icon" href="public/print-icon.png" type="image/x-icon">


</head>

<body>
    <!-- floating icons Effect  -->
    <div class="floating-icons">
        <i class="fas fa-print floating-icon" style="left: 10%; animation-delay: 0s;  "></i>
        <i class="fas fa-print floating-icon" style="left: 15%; animation-delay: 2s;  "></i>
        <i class="fas fa-file-alt floating-icon" style="left: 20%; animation-delay: 1s;  "></i>
        <i class="fas fa-file-alt floating-icon" style="left: 25%; animation-delay: 4s;  "></i>
        <i class="fas fa-copy floating-icon" style="left: 30%; animation-delay: 3s;  "></i>
        <i class="fas fa-copy floating-icon" style="left: 35%; animation-delay: 6s;  "></i>
        <i class="fas fa-paper-plane floating-icon" style="left: 40%; animation-delay: 5s;  "></i>
        <i class="fas fa-paper-plane floating-icon" style="left: 45%; animation-delay: 8s;  "></i>
        <i class="fas fa-cogs floating-icon" style="left: 50%; animation-delay: 7s;  "></i>
        <i class="fas fa-cogs floating-icon" style="left: 55%; animation-delay: 10s;  "></i>
        <i class="fas fa-desktop floating-icon" style="left: 60%; animation-delay: 9s  ;"></i>
        <i class="fas fa-desktop floating-icon" style="left: 65%; animation-delay: 11s  ;"></i>
        <i class="fas fa-server floating-icon" style="left: 70%; animation-delay: 12s  ;"></i>
        <i class="fas fa-server floating-icon" style="left: 75%; animation-delay: 14s  ;"></i>
        <i class="fas fa-tools floating-icon" style="left: 80%; animation-delay: 13s  ;"></i>
        <i class="fas fa-tools floating-icon" style="left: 85%; animation-delay: 15s  ;"></i>
    </div>


    <!-- Theme Toggle For Dark Mode , Lightmode -->
    <button class="theme-toggle" onclick="toggleTheme()">
        <i class="fas fa-moon" id="theme-icon"></i>
    </button>

    <div class="container">
        <div class="card">
            <div class="header">
                <h1><i class="fas fa-print"></i> مراقب برنامج الطباعة</h1>
            </div>

            <div class="status <?= $running ? 'running' : 'stopped' ?>">
                <?= $running
                    ? '<i class="fas fa-check-circle"></i> نظام الطباعة يعمل بشكل طبيعي'
                    : '<i class="fas fa-times-circle"></i> نظام الطباعة متوقف حاليًا';
                ?>
            </div>

            <div class="controls">
                <form method="POST" action="start.php">
                    <button type="submit" class="btn btn-start">
                        <i class="fas fa-power-off"></i>
                        تشغيل النظام
                    </button>
                </form>
                <form method="POST" action="stop.php">
                    <button type="submit" class="btn btn-stop">
                        <i class="fas fa-stop-circle"></i>
                        إيقاف النظام
                    </button>
                </form>
                <form method="POST" action="restart.php">
                    <button type="submit" class="btn btn-restart">
                        <i class="fas fa-sync-alt"></i>
                        إعادة تشغيل
                    </button>
                </form>
                <form method="GET" action="index.php">
                    <button type="submit" class="btn btn-refresh">
                        <i class="fas fa-refresh"></i>
                        تحديث الحالة
                    </button>
                </form>
            </div>

            <div class="last-check">
                <i class="fas fa-clock" style="color: #fee14a;"></i>
                <span style="margin-right: 5px; margin-left: 5px;;">
                    آخر فحص: <?= date("Y-m-d H:i:s") ?>
                </span>
            </div>
        </div>
    </div>


    <script src="main.js"></script>
</body>

</html>
