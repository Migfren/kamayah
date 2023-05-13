<script src='https://unpkg.com/tesseract.js@v2.1.0/dist/tesseract.min.js'></script>
<script src='https://unpkg.com/tesseract.js@1.0.19/src/index.js'></script>


<img id="blah" src="123.png" />


<script>
const rectangle = {
    left: 0,
    top: 0,
    width: 500,
    height: 250
};


Tesseract.recognize(
    '123.png',
    'eng', {
        rectangle
    }, {
        logger: m => console.log(m)

    }
).then(({
    data: {
        text,
        horc
    }
}) => {
    console.log(text);
    console.log(horc);
    document.getElementById("test").value = horc;
})
</script>



<div id='test'>
<input id='test'>