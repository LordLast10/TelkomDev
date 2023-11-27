// app.js

$(document).ready(function () {
    const scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

    scanner.addListener('scan', function (content) {
        // Kirim hasil pemindaian ke server menggunakan jQuery
        $.ajax({
            type: 'POST',
            url: '/scan',
            contentType: 'application/json',
            data: JSON.stringify({ content: content }),
            success: function (data) {
                console.log('Success:', data);
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    Instascan.Camera.getCameras()
        .then(cameras => {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        })
        .catch(error => {
            console.error('Error accessing camera:', error);
        });
});
