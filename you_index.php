<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
session_start();

$_SESSION['developerKey'] = 'AI39si7MpDpXAQb6cBshuZjZ6p-n4oTcmfxO0_Mfy_zkGuzY88BSeYb8AwgRWtXBvolLjWZKu6pMK3vboJR4EDYTSlUhw8Yknw';

function uploadStatus($status, $code = null, $videoId = null)
{
    switch ($status) {
        case $status < 400:
            echo  'Success ! Entry created (id: '. $videoId .
                  ') <a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
                  $videoId .'\'); ">(check details)</a>';
            break;
        default:
            echo 'There seems to have been an error: '. $code .
                 '<a href="#" onclick=" ytVideoApp.checkUploadDetails(\''.
                 $videoId . '\'); ">(check details)</a>';
    }
}

function authenticated()
{
    if (isset($_SESSION['sessionToken'])) {
        return true;
    }
}

/**
 * Helper function to print a list of authenticated actions for a user.
 */
function printAuthenticatedActions()
{
    print <<<END
        <div id="actions"><h3>Features ---</h3>
        
        <ul>
        
        <li><a href="#" onclick="ytVideoApp.listVideos('search_owner', '', 1);
        return false;">Retrieve course-videos</a></li>
        
        <li><a href="#" onclick="ytVideoApp.prepareUploadForm();
        return false;">Upload a course-video</a><br />
        <div id="syndicatedUploadDiv"></div><div id="syndicatedUploadStatusDiv">
        </div></li>
        
        <li><a href="#" onclick='window.close();'>Go back</a></li>
        
        </ul>
        
        </div>
END;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>Google App Module</title>
  <script src="video_app.js" type="text/javascript"></script>
</head>

<body>
  <div id="main">
    <div id="titleBar">
      <h2>Google App Module</h2>        
    </div>    
    
    <!-- Authentication status -->
    <div>
    <?php
      if (authenticated()) {
          // successful authentication here....
      } else {
          print <<<END
                    <div id="generateAuthSubLink"><a href="#"
                    onclick="ytVideoApp.presentAuthLink();
                    return false;">Click here to generate authentication link</a>
                    </div>
END;
    }
    ?>
    </div>
    <!-- end Authentication status -->
    
    <br clear="all" />
    <?php
        // if $_GET['status'] is populated then we have a response
        // about a syndicated upload from YouTube's servers
        if (isset($_GET['status'])) {
            (isset($_GET['code']) ? $code = $_GET['code'] : $code = null);
            (isset($_GET['id']) ? $id = $_GET['id'] : $id = null);
            print '<div id="generalStatus">' .
                  uploadStatus($_GET['status'], $code, $id) .
                  '<div id="detailedUploadStatus"></div></div>';
         }
    ?>
    <!-- General status -->
    <?php
        if (authenticated()) {
            printAuthenticatedActions();
        }
    ?>
    <!-- end General status -->
    
    <br clear="all" />
    <div id="searchResults">
      <div id="searchResultsListColumn">
        
          <div id="searchResultsVideoList"></div>
        
        <div id="searchResultsNavigation">
          <form id="navigationForm" action="javascript:void();">
            <input type="button" id="previousPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.previousPage);" value="Back" style="display: none;" />
            <input type="button" id="nextPageButton" onclick="ytVideoApp.listVideos(ytVideoApp.previousQueryType, ytVideoApp.previousSearchTerm, ytVideoApp.nextPage);" value="Next" style="display: none;" />
          </form>
        </div>
      </div>
  </div>
  <!--
  <div id="videoPlayer"></div>
  -->
  </div>
</body>
</html>