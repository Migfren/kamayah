<!DOCTYPE html>
<html>
<head>
<title>Text TO Speach</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#says").click(function(){
    var url="https://translate.google.com/translate_tts?ie=UTF-8&q="+encodeURIComponent($("#text").val())+"&tl=ta&client=tw-ob";
    $(".speech").attr('src',url).get(0).play();
    console.log("URL : "+$(".speech").attr('src'));
  });
  
});
</script>
</head>
<body>
<input type="text" name="text" id="text" value="Token Number : 2">
<button type="button" id="says">Speak</button>
<audio src="" class="speech" hidden></audio>
</body>
</html>