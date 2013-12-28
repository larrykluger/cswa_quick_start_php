<?php
// Error if called separately
if (!defined('INDEX')) {
   die('You cannot call this script directly!');
}

// generate output
html_head("Quick Start PHP");
?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
		<div class="container">
			<h1>Hello, world!</h1>
			<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
			<p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
		</div>
    </div>
<?php
footer();
html_foot();

break;
?>

      <div class="jumbotron">
        <h1>Upload and Sign</h1>
        <p class="lead">Upload and digitally sign a PDF document.</p>
		
		<!-- The fileinput-button span is used to style the file input field as button -->
		<span class="btn btn-success fileinput-button">
			<i class="icon-plus icon-white"></i>
			<span>Select a file...</span>
			<!-- The file input field used as target for the file upload widget -->
			<input id="fileupload" type="file" name="files[]" multiple>
		</span>
        <div id="dropzone" class="fade well">...or drop PDF files here</div>
		<br>
		<br>
		<!-- The global progress bar -->
		<div id="progress" class="progress progress-success progress-striped">
			<div class="bar"></div>
		</div>
		
        <!-- <a id="sign_btn" class="btn btn-large btn-success" href="#">Sign!</a> -->
        <p class="lead" style="margin-top:20px;">Use your DevPortal email and password</p>
	  </div>
    </div> <!-- /container -->

	<!-- Modal - See http://twitter.github.io/bootstrap/javascript.html#modals  -->
	<div id="start_signing" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<h3 id="myModalLabel">Processing…</h3>
	  </div>
	  <div class="modal-body">
	    <p id="modal_feedback"></p>
		<p>We're processing your signing request.</p>
		<p>Remember to use your DevPortal email and password</p>
	  </div>
	</div>
	
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script>
	$(document).ready(function () {
      // Use .ready may not be necessary, see http://goo.gl/aAhs  but we'll be
	  // conservative and include it.
      function add_events(){
        $('#sign_btn').on('click', function (e) {
		  window.location="sign_start.php";
		  // See http://goo.gl/ltHjD
		  $('#start_signing').modal({keyboard: false, backdrop: 'static'});
		});
      }
	  add_events();
    });
    </script>

	<!-- Start of file upload stuff -->
	<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
	<script src="js/vendor/jquery.ui.widget.js"></script>
	<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
	<script src="js/jquery.iframe-transport.js"></script>
	<!-- The basic File Upload plugin -->
	<script src="js/jquery.fileupload.js"></script>
	<script>
	/*jslint unparam: true */
	/*global window, $ */
	$(function () {
		'use strict';
		var url = 'upload_handler_index.php',
		uid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
           var r = Math.random()*16|0, v = c == 'x' ? r : (r&0x3|0x8);
           return v.toString(16);}); // See http://goo.gl/cYjpM
		
		// See https://github.com/blueimp/jQuery-File-Upload/wiki/API
		//     https://github.com/blueimp/jQuery-File-Upload/wiki/Options
		$('#fileupload').fileupload({
			url: url,
			singleFileUploads: true,
			dataType: 'json',
			dropZone: $('#dropzone'),
			formData: [{name: 'uid', value: uid}], // send a uid to uniquely identify the file
			done: function (e, data) {
			    var file = data.result.files[0],
				    file_name = file.name.substr(39); // drop the uid prefix
				$('#modal_feedback').text(file_name + ' was uploaded.');
				$('#progress').addClass('hide');
				// See http://goo.gl/ltHjD
				$('#start_signing').modal({keyboard: false, backdrop: 'static'});
				window.location="sign_start.php" + "?fn="  + encodeURIComponent(file.name);
				},
			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .bar').css(
					'width',
					progress + '%'
				);
			},
			acceptFileTypes: /(\.|\/)(pdf|xls|xlsx|doc|docx)$/i // doesn't seem to work
		});
	
		// dropzone effects. See http://goo.gl/vAfxB
		$(document).bind('dragover', function (e) {
			var dropZone = $('#dropzone'),
				timeout = window.dropZoneTimeout;
			if (!timeout) {
				dropZone.addClass('in');
			} else {
				clearTimeout(timeout);
			}
			var found = false,
				node = e.target;
			do {
				if (node === dropZone[0]) {
					found = true;
					break;
				}
				node = node.parentNode;
			} while (node != null);
			if (found) {
				dropZone.addClass('hover');
			} else {
				dropZone.removeClass('hover');
			}
			window.dropZoneTimeout = setTimeout(function () {
				window.dropZoneTimeout = null;
				dropZone.removeClass('in hover');
			}, 100);
		});	
	});
	</script>
	<!-- End of file upload stuff -->
	
  </body>
</html>
