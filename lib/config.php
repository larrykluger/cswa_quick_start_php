<?php
// config.php
//
//
// Copyright 2013 (c) by Larry Kluger
// License: The MIT License. See http://opensource.org/licenses/MIT

// Error if called separately
if (!defined('INDEX')) {
   die('You cannot call this script directly!'); 
}

// Always load the following:
require_once ('lib/utils.php');

// cookie definition
// Serialize the following
// cookie_info [cookie_ver => COOKIE_VER, filename => string, guid => string]



// Constants
define ('CSWA_URL', 'https://webagentdev.arx.com/');
define ('SIGN_FINISH', 'index.php?op=sign_finish_html');
define ('FILES_DIR', 'files'); // last part of dir for caching signed files
define ('GC_TIME', 60 * 60); // in seconds -- how long should signed files sit in the cache dir before being reaped?
define ('SUCCESS', 0);
define ('COOKIE_NAME', 'sess');
define ('COOKIE_VER', 1);




// Constants for CoSign Signature Web Agent
// layoutMask values
define ('SETTINGS_CHNG_PW', 8);         // Settings and change password
define ('SETTINGS_GRAPHICAL_SIGS', 16); // Graphical Signatures
define ('SIG_FIELD_NAME', 'signature 1');
define ('UPLOAD_DOC', CSWA_URL . 'Sign/UploadFileToSign');
define ('DOWNLOAD_SIGNED_FILE', CSWA_URL . 'Sign/DownloadSignedFileG');
define ('SIGNING_CEREMONY', CSWA_URL . 'Sign/SignCeremony');
