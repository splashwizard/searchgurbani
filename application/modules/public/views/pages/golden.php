<html>
<body>


<?php

$newsUrl = 'http://www.sikhnet.com/hukam';
$newsContents = file_get_contents($newsUrl);

$startDiv = '</div><div id="hukam_footer">';
$endDiv = '</p></noscript></div>';
$headDiv = stringSearch($startDiv, $endDiv, $newsContents);

echo '<pre>';
print_r($headDiv);
echo '</pre>';

?>
</body>
</html>
