<!DOCTYPE HTML>

<?php
use EDAM\UserStore\UserStoreClient;
use EDAM\NoteStore\NoteStoreClient;
use EDAM\Types\Data, EDAM\Types\Note, EDAM\Types\Resource, EDAM\Types\ResourceAttributes;
use EDAM\Error\EDAMUserException, EDAM\Error\EDAMErrorCode;

ini_set("include_path", ini_get("include_path") . PATH_SEPARATOR . "../evernote/lib" . PATH_SEPARATOR);
require_once("autoload.php");

require_once("Thrift.php");
require_once("transport/TTransport.php");
require_once("transport/THttpClient.php");
require_once("protocol/TProtocol.php");
require_once("protocol/TBinaryProtocol.php");

require_once("packages/Errors/Errors_types.php");
require_once("packages/Types/Types_types.php");
require_once("packages/UserStore/UserStore.php");
require_once("packages/UserStore/UserStore_constants.php");
require_once("packages/NoteStore/NoteStore.php");
require_once("packages/Limits/Limits_constants.php");

$authToken = "S=s1:U=26f48:E=13f7353dff5:C=1381ba2b3f5:P=1cd:A=en-devtoken:H=db47bd43568923301e8c48040c574928";
#$authToken = "your developer token";

if ($authToken == "your developer token") {
  print "Please fill in your developer token\n";
  print "To get a developer token, visit https://sandbox.evernote.com/api/DeveloperToken.action\n";
  exit(1);
}

// Initial development is performed on our sandbox server. To use the production 
// service, change "sandbox.evernote.com" to "www.evernote.com" and replace your
// developer token above with a token from 
// https://www.evernote.com/api/DeveloperToken.action
$evernoteHost = "sandbox.evernote.com";
$evernotePort = "443";
$evernoteScheme = "https";

$userStoreHttpClient =
  new THttpClient($evernoteHost, $evernotePort, "/edam/user", $evernoteScheme);
$userStoreProtocol = new TBinaryProtocol($userStoreHttpClient);
$userStore = new UserStoreClient($userStoreProtocol, $userStoreProtocol);

// Connect to the service and check the protocol version
$versionOK =
  $userStore->checkVersion("Evernote EDAMTest (PHP)",
			   $GLOBALS['EDAM_UserStore_UserStore_CONSTANTS']['EDAM_VERSION_MAJOR'],
			   $GLOBALS['EDAM_UserStore_UserStore_CONSTANTS']['EDAM_VERSION_MINOR']);
print "Is my Evernote API version up to date?  " . $versionOK . "\n\n";
if ($versionOK == 0) {
  exit(1);
}

// Get the URL used to interact with the contents of the user's account
// When your application authenticates using OAuth, the NoteStore URL will
// be returned along with the auth token in the final OAuth request.
// In that case, you don't need to make this call.
$noteStoreUrl = $userStore->getNoteStoreUrl($authToken);

$parts = parse_url($noteStoreUrl);
if (!isset($parts['port'])) {
  if ($parts['scheme'] === 'https') {
    $parts['port'] = 443;
  } else {
    $parts['port'] = 80;
  }
}
$noteStoreHttpClient = 
  new THttpClient($parts['host'], $parts['port'], $parts['path'], $parts['scheme']);
$noteStoreProtocol = new TBinaryProtocol($noteStoreHttpClient);
$noteStore = new NoteStoreClient($noteStoreProtocol, $noteStoreProtocol);

// List all of the notebooks in the user's account        
$notebooks = $noteStore->listNotebooks($authToken);
?>

<head>
	<title>Test</title>
</head>
<body>
<?php
	foreach ($notebooks as $notebook) {
?>
		<p><?=notebook->name?></p>
<?php
	}
?>
	<p>Number of Notebooks: <?=count($notebooks)?></p>
	<p>yay</p>
<?php phpinfo() ?>
</body>

