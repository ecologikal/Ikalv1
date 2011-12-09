/*
 * jQuery File Upload Plugin JS Example 5.0.2
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://creativecommons.org/licenses/MIT/
 */

/*jslint nomen: true */
/*global $ */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
   // $('#fileupload').fileupload({
//		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
//	});
   var fileupload = $('#fileupload');
fileupload.fileupload({
//  I turned off autoUpload so the user could enter and select values that needed to be part of the 
//      of the upload request even after they selected a file
	acceptFileTypes:/(\.|\/)(gif|jpe?g|png)$/i,
     autoUpload: false

//  Each selected file has it's own inputs I needed to evaluate, and doing singleFileUploads made that easier   
    , singleFileUploads: true

//  I sometimes add the following to debug what value needs to be updated in my "send" binding              
//   , formData: {
//        testparm: "blah"
//   }
}).bind('fileuploadsend', function (e, data) {
    var description = data.context.find("input").val();

    if(data.data) { //chrome, ff
        data.data.append("description", description);
    } else { //ie
        data.formData = [{ name:"description",value:description}];
    }
}).bind('fileuploadfail', function (e, data) {
	
    //alert("Failed to upload file");
}).bind('stop', function (e) {
	//console.log(e);
    //$(location).attr('href','http://ecologikal.sytes.net/ecologikal/profile.php?goto=gallery');
});



   // Load existing files:
   // $.getJSON($('#fileupload form').prop('action'), function (files) {
   //    var fu = $('#fileupload').data('fileupload');
   //   fu._adjustMaxNumberOfFiles(-files.length);
   //     fu._renderDownload(files)
   //         .appendTo($('#fileupload .files'))
   //         .fadeIn(function () {
   //             // Fix for IE7 and lower:
   //            $(this).show();
   //          });
   //  });

    // Open download dialogs via iframes,
    // to prevent aborting current uploads:
    $('#fileupload .files a:not([target^=_blank])').live('click', function (e) {
        e.preventDefault();
        $('<iframe style="display:none;"></iframe>')
            .prop('src', this.href)
            .appendTo('body');
    });

});