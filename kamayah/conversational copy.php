'<ul id="chat">'+
  '  <li class="you">'+
  '      <div class="entete">'+
  '           <span class="status green"></span>'+
  '           <h2>Migfren</h2>'+
  '          <h3>10:12AM, Today</h3>'+
  '      </div>'+
  '     <div class="message">'+
  '         <i> English : What is your name? </i> <br>Tausug : Unu in Ngan mu? '+
  '     </div>'+
  ' </li>'+
  '  <li class="me">'+
  '     <div class="entete">'+
  '          <h3>10:12AM, Today</h3>'+
  '         <h2>Arqam</h2>'+
  '         <span class="status blue"></span>'+
  '     </div>+
  '     <div class="message">'+
  '         <i> English : My name is Arqam.</i> <br> Tausug : In ngan ku hi Arqam.'+
  '     </div>'+
  ' </li>'+
  '</ul>'

  


  function displayTranslated(text) {
        var testDiv = document.getElementById("box_option");


        var codeBlock = '<div class="card-body">' +
            '<h4 class="" style="color:white;"> Result : </h4>' +
            ' <div class="col-md-12">' +
            ' <textarea id="text_area" style="text-align:center;" name="w3review" rows="4" cols="50" readonly >' +
            text +
            ' </textarea>' +
            '    <span id="text_counter"></span>' +
            '  </div> <br>' +
            '  <div class="row">' +
            '<div class="col"><a href="index.php" type="button"  class="btn btn-dark"><i class="fas fa-redo"></i> Try Again</a></div>' +
            '<div class="col"> <button type="button" class="btn btn-dark btnFeedback" id="btnFeedback"><i class="fas fa-lightbulb-o "></i> Feedback  </button> </div>' +
            '</div> </div>';