<?php
// Get and cleanse search term
if(isset($_GET['term'])) {
    $strSearchTerm = htmlspecialchars($_GET['term']);
} else {
    $strSearchTerm = '';
}

// The libraries object
$arrJournals = array(
        "blood" => array(
                "title" => "Blood",
                "remote" => "http://owens.mit.edu/sfx_local?url_ver=Z39.88-2004&url_ctx_fmt=infofi/fmt:kev:mtx:ctx&ctx_enc=info:ofi/enc:UTF-8&ctx_ver=Z39.88-2004&sfx.ignore_date_threshold=1&rfr_id=info:sid/MITEDS:placard&rft.object_id=954925385125",
                "barton" => "http://library.mit.edu/F/?func=item-global&doc_library=MIT01&doc_number=000292123",
            ),
        "nature" => array(
                "title" => "Nature",
                "remote" => "http://libraries.mit.edu/get/nature",
                "barton" => "http://library.mit.edu/F/?func=item-global&doc_library=MIT01&doc_number=000294170",
            ),
        "science" => array(
                "title" => "Science",
                "remote" => "http://libraries.mit.edu/get/science",
                "barton" => "http://library.mit.edu/F/?func=item-global&doc_library=MIT01&doc_number=000294958",
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
        $strBarton = $name["barton"];
        $placard = TRUE;
        break;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <base target="_parent">
    <title><?php echo $strSearchTerm; ?> : Journals Placard : MIT Libraries</title>
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
        <ul class="inline">
            <li><a data-role="remote" href="<?php echo $strRemote; ?>">Go to <em><?php echo $strTitle; ?></em> online</a></li>
            <li><a data-role="barton" href="<?php echo $strBarton; ?>">Find print copies of <em><?php echo $strTitle; ?></em> in the library</a></li>
        </ul>
    </div>
<?php }; ?>
</body>
</html>