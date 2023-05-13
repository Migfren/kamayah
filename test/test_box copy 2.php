<!-- Include the Tesseract.js library -->
<script src='https://unpkg.com/tesseract.js@4.0.2/dist/tesseract.min.js'></script>

<!-- Create an HTML canvas element -->
<canvas id="canvas" width="600" height="600"></canvas>
<div id='textarea'></div>
<!-- Load the image and recognize the text when the page is loaded -->
<script>
const texts = {
    'Hello': 'HI',
    'name': 'ngan',
    'what': 'unu'
}

var container1 = document.getElementById('textarea');
var container2 = document.createElement('div');

// create a span for the keys
var keySpan = document.createElement('span');

// iterate over the keys
for (var key in texts) {
    // create a span for the key

    const randomColor = Math.floor(Math.random() * 16777215).toString(16);
    keySpan.textContent += texts[key] + ' ';
    keySpan.style.color = randomColor;

    var result = document.createElement('span');

    result.textContent += key + ' ';
    result.style.color = randomColor;

    container2.appendChild(result);
}

// append the key span to the container
container1.appendChild(keySpan);

// append the container to the document body
document.body.appendChild(container2);
</script>