<?php
require_once 'config.php';
$sdp->perform_auth_action();

// global variables
$APP_NAME = "I Will Buy That 4 Me";

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
    <title>MerchAppTV</title>
<script type="text/javascript" src="../SDPWebFramework/SDPWeb.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="ContentFlow/contentflow.js"></script>
<script type="text/javascript" src="merchapptv.js"></script>
</head>
<body>

<?php
if (!$sdp->loggedIn()) {
    $loginUrl = $sdp->loginUrl();
    echo "<img src=\"iwillbuythat4me.jpg\"/><br/><p>Welcome to $APP_NAME.</p><p><a href=\"$loginUrl\">To get started, please sign in.</a></p>";
    exit;
}

$logoutUrl = $sdp->logoutUrl();

$params = array('q' => 'food');
$contentList = array();
try {
    $contentList = $sdp->getPlatformContentList($params, 20, 0);
} catch (Exception $e) {
    echo("<p>Couldn't get the content list. Check the connection details in the Settings tab.</p>");
}
?>
<div class="ContentFlow">
    <div class="loadIndicator"><div class="indicator"></div></div>
    <div class="flow">
        <!-- img class="item" src="someImageFile.jpg" title="Your_Image_Title"/ -->
        <!-- Add as many items as you like. -->
<?php
foreach ($contentList as $content) {
    $title = $content->title;
    echo '<img class="item" href="content.php" src="'.imageUrl($content).'" title="'.$content->title.'"/>';
}
?>
    </div>
    <div class="globalCaption"></div>
    <div class="scrollbar"><div class="slider"><div class="position"></div></div></div>
</div>
<div id="nav" style="background: url(nav.png) no-repeat; margin:10px auto; width:650px; height:144px;"></div>

</body>
</html>