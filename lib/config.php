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

// Constants
define ('CSWA_V2_URL', 'https://webagentdev.arx.com/');
define ('SIGN_FINISH', 'sign_finish_html.php');
define ('FILES_DIR', 'files'); // last part of dir for caching signed files
define ('GC_TIME', 60 * 60); // in seconds -- how long should signed files sit in the cache dir before being reaped?
define ('SUCCESS', 0);
define ('FN_PREFIX_WIDTH', 39); // width of the front part of a file name
                                // eg u_92889c2b-d4d8-488f-8f41-48ea91c3f220_LICENSE.pdf

// Constants for CoSign Signature Web Agent
// layoutMask values
define ('SETTINGS_CHNG_PW', 8);         // Settings and change password
define ('SETTINGS_GRAPHICAL_SIGS', 16); // Graphical Signatures
define ('SIG_FIELD_NAME', 'signature 1');

// version 2
define ('UPLOAD_DOC', CSWA_V2_URL . 'Sign/UploadFileToSign');
define ('DOWNLOAD_SIGNED_FILE', CSWA_V2_URL . 'Sign/DownloadSignedFileG');
define ('SIGNING_CEREMONY', CSWA_V2_URL . 'Sign/SignCeremony');
