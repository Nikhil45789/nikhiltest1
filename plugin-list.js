jQuery('head').append('<ul id="fileSizes"></ul>')
var csv_data = [];
var images = jQuery('#the-list tr');
var totalImages = images.length;
var imagesProcessed = 0;
var d = new Date();

var month = d.getMonth() + 1;
var day = d.getDate();

var output = d.getFullYear() + '/' +
    (month < 10 ? '0' : '') + month + '/' +
    (day < 10 ? '0' : '') + day;
var count = 0;
images.each(function () {
    var title = jQuery('tbody .plugin-title>strong').eq(count).text();
    var desc = jQuery('.plugin-description').eq(count).text().replace(/\,/g, ' ');;
    var version = jQuery('.plugin-version-author-uri').eq(count).text().split('|')[0]
    csv_data.push([count + 1, title, desc, "Used", version, output]);
    // jQuery('#fileSizes').append('<li>' + src + ': ' + (fileSize / 1024).toFixed(2) + ' KB</li>');



    // Check if all images have been processed


    count++;
});
csv_data.push(['', '', '' + '', '', '']);
csv_data.push(['By', 'Nikhil']);

downloadCSVFile(csv_data);
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
    link.setAttribute("download", "Nikhil plugin list.csv");
    document.body.appendChild(link);

    link.click();
}
