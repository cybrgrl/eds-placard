<?php
// Get and cleanse search term
if(isset($_GET['term'])) {
    $strSearchTerm = htmlspecialchars($_GET['term']);
} else {
    $strSearchTerm = '';
}

// The libraries object
$arrJournals = array(
        "astm" => array(
                "title" => "ASTM Standards",
                "remote" => "http://libraries.mit.edu/get/astmstand",
            ),
        "ieee" => array(
                "title" => "IEEE Xplore",
                "remote" => "http://libraries.mit.edu/get/ieee",
            ),
        "sciencedirect" => array(
                "title" => "ScienceDirect",
                "remote" => "http://libraries.mit.edu/get/sciencedirect",
            ),
        "webofscience" => array(
                "title" => "Web of Science",
                "remote" => "http://libraries.mit.edu/get/webofsci",
            ),
    );

// Functions
function CleanSearchTerm($strTemp) {
    $strTemp = strtolower($strTemp);
    $strTemp = str_replace('journal', '', $strTemp);
    $strTemp = trim($strTemp);

    return $strTemp;
}

$strSearchTerm = CleanSearchTerm($strSearchTerm);
$placard = FALSE;

foreach ($arrJournals as $journal => $name) {
    if ($strSearchTerm==$journal) {
        $strTitle = $name["title"];
        $strRemote = $name["remote"];
        $placard = TRUE;
        break;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <base target="_parent">
    <title><?php echo $strSearchTerm; ?> : Databases Placard : MIT Libraries</title>
    <link href="placards.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/scripts/jquery-1.6.1.min.js"></script>
    <script type="text/javascript">
    $(function() {
        TrackEvent('Placard','<?php echo $strTitle; ?>','Display',1);

        $("#bartonplus_placard a").click(function(e) {
            var link = $(e.target).text();
            TrackEvent('Placard','<?php echo $strTitle; ?>',link,e.which);
        });

    });

    function TrackEvent(Category,Action,Label,Value){
        _gaq.push(['_trackEvent', Category, Action, Label, Value]);
    }
    </script>
    <script type="text/javascript" src="ga.js"></script>
</head>
<body>
<?php if ($placard) { ?>
    <div id="bartonplus_placard">
        <h2 data-role="term"><?php echo $strTitle; ?></h2>
        <p><a data-role="remote" href="<?php echo $strRemote; ?>">Go to <em><?php echo $strTitle; ?></em> online</a></p>
    </div>
<?php }; ?>
</body>
</html>
