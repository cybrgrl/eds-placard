// This is a separate GA property from the rest of the libraries website because it is being tracked via the BartonPlus property IDs
var _gaq = _gaq || [];
var here = document.domain;
switch(here) {
	case 'libraries.mit.edu':
		_gaq.push(['_setAccount', 'UA-1760176-20']);
		break;
	case 'libraries-test.mit.edu':
		_gaq.push(['_setAccount', 'UA-1760176-22']);
		break;
	case 'libraries-dev.mit.edu':
		_gaq.push(['_setAccount', 'UA-1760176-22']);
		break;
	default:
		break;
}
// no pageview is tracked because the placards show within a pageview that is already recorded

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();