let VIDEO = null;
let CANVAS = null;
let CONTEXT = null;

function main() {
    CANVAS = document.getElementById("my_camera");
    CONTEXT = CANVAS.getContext("2d");
    CANVAS.window = window.innerWidth;
    CANVAS.window = window.innerHeight;

    let promise = navigator.mediaDevices.getUserMedia({ video: true });
    promise.then(function(signal) {
        VIDEO = document.createElement("video");
        VIDEO.scrObject = signal;
        VIDEO.play();

        VIDEO.onloadeddata = function() {
            updateCanvas();
        }

    }).catch(function(err) {
        alert("Camera Error : " + err);
    });
}


function updateCanvas() {
    CONTEXT.drawImage(VIDEO, 0, 0);
    window.requestAnimationFrame(updateCanvas);
}