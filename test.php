<form onsubmit="mindeeSubmit(event)">
    <input type="file" id="my-file-input" name="file" />
    <input type="submit" />
</form>

<script type="text/javascript">
const mindeeSubmit = (evt) => {
    evt.preventDefault();
    let myFileInput = document.getElementById('my-file-input');
    if (!myFileInput) {
        return
    }
    let myFile = myFileInput.files[0];
    if (!myFile) {
        return
    }
    let data = new FormData();
    data.append("document", myFile, myFile.name);

    let xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", function() {
        if (this.readyState === 4) {
          //  console.log(this.responseText);
            let response = JSON.parse(this.responseText);
            let ocrContent = "";
            let values = response.document.inference.prediction.text.values;
            values.forEach(val => ocrContent += val.content + " ");
            console.log(ocrContent);
        }
    });

    xhr.open("POST", "https://api.mindee.net/v1/products/devweb09/hand_writing/v1/predict");
    xhr.setRequestHeader("Authorization", "50142b726afef5f01626891951c2e9ef");
    xhr.send(data);
}
</script>