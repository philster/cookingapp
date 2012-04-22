<?php 
require_once 'config.php';
$sdp->perform_auth_action();
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css" media="screen"/>
    <title>MerchAppTV</title>
<script type="text/javascript" src="../SDPWebFramework/SDPWeb.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="merchapptv.js"></script>
</head>
<body>
<img src="facebook-like-button-300x191.png" style="position:fixed; top:10px; right: 10px;" height="40"/>
<div><a href="product.php"><img src="RachelShow.png"/></a></div>
<?php
function controlButton($image, $id) {
    $img = "<img id=\"$id\" src=\"images/$image.png\" width=\"30\" height=\"30\">";
    return "<td align=\"center\">$img</td>";
}

$controlTable = "<table background=\"images/toolbar.png\" width=\"320\" height=\"48\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr>";
$controlTable .= controlButton("skip_backward", "skip_backward");
$controlTable .= controlButton("reverse", "reverse");
$controlTable .= controlButton("play", "playPause"); 
$controlTable .= controlButton("forward", "forward"); 
$controlTable .= controlButton("skip_forward", "skip_forward"); 
$controlTable .= "</tr></table>";
echo '<div style="margin-left: 250px;">' . $controlTable . '</div>';
?>

<?php
include_once 'SimpleStore.php';
?>

</body>
</html>