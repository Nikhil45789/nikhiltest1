
jQuery('head').append('<ul id="fileSizes"></ul>')
var csv_data = [];
var images = jQuery('img');
var totalImages = images.length;
var imagesProcessed = 0;
var d = new Date();

var month = d.getMonth() + 1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
    (month < 10 ? '0' : '') + month + '/' +
    (day < 10 ? '0' : '') + day;

images.each(function () {
    var imageElement = jQuery(this);
    var src = imageElement.attr('src');

    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', src, true);

    xhr.onload = function () {
        if (xhr.status == 200) {
            var fileSize = xhr.getResponseHeader('Content-Length');
            if (fileSize) {
                var reason = "";
                if ((fileSize / 1024).toFixed(2) > 100 && (fileSize / 1024).toFixed(2) < 150) {
                    reason = "optimized as much as possible ";
                }
                else if((fileSize / 1024).toFixed(2) > 150){
                    reason = "site is getting disturbed";
                }
                
                else if((fileSize / 1024).toFixed(2) > 500){
                    reason = "image is getting blurred";
                }
                csv_data.push([window.location.href, src, (fileSize / 1024).toFixed(2) + "KB", output, reason]);
                jQuery('#fileSizes').append('<li>' + src + ': ' + (fileSize / 1024).toFixed(2) + ' KB</li>');
            }
           
            imagesProcessed++;

            // Check if all images have been processed
            if (imagesProcessed === totalImages) {
                csv_data.push(['', '', '' + '', '', '']);
                csv_data.push(['By','Nikhil']);
                downloadCSVFile(csv_data);
            }
        }
    };

    xhr.send();
});

function downloadCSVFile(csv_data) {
    var csvContent = "data:text/csv;charset=utf-8,";

    // Create CSV content
    csv_data.forEach(function (dataRow) {
        var row = dataRow.join(",");
        csvContent += row + "\r\n";
    });

    var encodedUri = encodeURI(csvContent);

    var link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", "Nikhil image_sizes.csv");
    document.body.appendChild(link);

    link.click();
}
