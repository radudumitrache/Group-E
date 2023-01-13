<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Are you worry about your children future? Register at our school and we show them the future">
    <meta name="keywords" content="Morgenster, school, children, learn, study, Emmen, Netherlands">
    <meta name="author" content="Yourname">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morgenster</title>
    <link rel="stylesheet" href="css/parentEvent-page.css">
    <link rel="icon" href="img/logo.svg">
</head>
<body>
<header>
    <a class="logo" href="home-page.php">
        <img src="img/logo.svg" alt="logo">
    </a>
    <div class="listcontainer">
        <ul class="headerList">
            <li>
                <a class="button2" href="home-page.php">
                    <button>Home</button>
                </a>
            </li>
            <li>
                <a class="button1" href="signIn-page.php">
                    <button>Sign in</button>
                </a>
            </li>
        </ul>
    </div>
</header>
<main>
    <div class="backFrame">
        <a href="parentMain-page.php" id="backButton">
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="60" height="60" rx="15" fill="#FDDF42"/>
                <line x1="38.7827" y1="14.3451" x2="18.4498" y2="30.2309" stroke="black" stroke-width="2" stroke-linecap="round"/>
                <line x1="39.2916" y1="47.9034" x2="18.173" y2="31.4037" stroke="black" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </a>

        <div class="firstEvent">
            
            <?php
                function scan_dir($dir) {
                    $ignored = array('.', '..', '.svn', '.htaccess');
                
                    $files = array();    
                    foreach (scandir($dir) as $file) {
                        if (in_array($file, $ignored)) continue;
                        $files[$file] = filemtime($dir . '/' . $file);
                    }
                
                    arsort($files);
                    $files = array_keys($files);
                
                    return ($files) ? $files : false;
                }
                $file='img/upload/event_parent_1';
                $images=scan_dir($file);
                echo "<img src='img/upload/event_parent_1/$images[0]'>";
                $myfile=fopen("description/description1.txt","r") or die("file error encountered");
                $description=fread($myfile,filesize("description/description1.txt"));
                echo "<div>
                        <h3>First event of the day</h3>
                        <p>$description</p>
                     </div>";
            ?>
        </div>
        <div class="firstEvent">
        <?php
                $file='img/upload/event_parent_2';
                $images=scan_dir($file);
                echo "<img src='img/upload/event_parent_2/$images[0]'>";
                $myfile=fopen("description/description2.txt","r") or die("file error encountered");
                $description=fread($myfile,filesize("description/description2.txt"));
                echo "<div>
                        <h3>Second event of the day</h3>
                        <p>$description</p>
                     </div>";
            ?>
        </div>
    </div>
</main>

</body>
</html>
