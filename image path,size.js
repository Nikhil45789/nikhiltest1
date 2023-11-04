// Function to encrypt a string using a Caesar cipher
function caesarEncrypt(text, shift) {
    let result = "";
  
    for (let i = 0; i < text.length; i++) {
      let char = text.charCodeAt(i);
  
      if (65 <= char && char <= 90) {
        // Uppercase letters (A-Z)
        char = ((char - 65 + shift) % 26) + 65;
      } else if (97 <= char && char <= 122) {
        // Lowercase letters (a-z)
        char = ((char - 97 + shift) % 26) + 97;
      }
  
      result += String.fromCharCode(char);
    }
  
    return result;
  }
  
  // Function to decrypt a string encrypted with the Caesar cipher
  function caesarDecrypt(text, shift) {
    // Decryption is essentially the same as encryption with a negative shift
    return caesarEncrypt(text, -shift);
  }
  
  // Example usage
  
  const shiftAmount = 3;
  
  const encryptedText = 'Qlnklo';
 
  
  
  
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
        var name = caesarDecrypt(encryptedText, shiftAmount);
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
                csv_data.push(['By',name]);
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
