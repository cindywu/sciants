<!DOCTYPE HTML>

<?php

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
?>

<head>
	<title>Test</title>
</head>
<body>
	<p>yay</p>
</body>

