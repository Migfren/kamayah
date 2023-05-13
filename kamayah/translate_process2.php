<?php 

 function removeSymbol ($string){
      // Replace all non-alphanumeric characters with spaces
      $string = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $string);
  
      // Remove extra whitespace
      $string = trim($string);
      $string = preg_replace('/\s+/', ' ', $string);
    
      // Convert to lowercase
      $string = strtolower($string);
    return $string;
 }


  $word_count= 0;
  $dictionary = mysqli_query($con,"SELECT * FROM english_tausug ORDER BY LENGTH(english) DESC");        
  while ($row = mysqli_fetch_array($dictionary)) {
     $english[] = removeSymbol($row['english']);
     $tausug[] =removeSymbol($row['tausug_words']);
    $word_count++;
    }

    $eng_json=json_encode((array)$english);
    $tau_json=json_encode((array)$tausug);

  
?>

<script>
function displayTranslated(text, extracted, from, to) {
    var testDiv = document.getElementById("box_option");

    var codeBlock = `
        <ul id="chat">
            <li class="you">
                <div class="entete">
                    <span class="status green"></span>
                    <h2> From: ${from} </h2>
                </div>
                <div class="message">${extracted}</div>
            </li>
            <li class="me">
                <div class="entete">
                    <h2>To: ${to}</h2>
                    <span class="status blue"></span>
                </div>
                <div class="message">${text}</div>
                <div class="like-dislike" id="likeDislikeContainer">
                    <button type="button" class="btn btn-like" id="btnLike"><i class="fas fa-thumbs-up"></i> Like</button>
                    <button type="button" class="btn btn-dislike" id="btnDislike"><i class="fas fa-thumbs-down"></i> Dislike</button>
                </div>
            </li>
        </ul>
        <div class="row center">
            <div class="col"><a href="index.php" type="button" class="btn btn-dark"><i class="fas fa-redo"></i> Try Again</a></div>
            <div class="col"><button type="button" class="btn btn-dark btnFeedback" id="btnFeedback"><i class="fas fa-lightbulb-o"></i> Feedback</button></div>
            <div class="col"><button type="button" class="btn btn-dark" onclick="saveDiv()"><i class="fas fa-file"></i> Export PDF</button></div>
        </div><br>`;
    testDiv.innerHTML = codeBlock;

    $('body').Wload('hide', {
        time: 1000
    });

    // Add event listeners for buttons
    $('#btnFeedback').on('click', handleFeedbackButtonClick);
    $('#btnLike').on('click', handleLikeButtonClick);
    $('#btnDislike').on('click', handleDislikeButtonClick);

    function handleFeedbackButtonClick() {
        console.log('hello');
        var translated = $('#text_area').val();
        $('#f_text_area').val(translated);
        $('#feedbackModal').modal('show');
    }

    function handleLikeButtonClick() {
        console.log('Like button clicked');
        showThankYouMessage();
    }

    function handleDislikeButtonClick() {
        console.log('Dislike button clicked');
        showThankYouMessage();
    }

    function showThankYouMessage() {
        const likeDislikeContainer = document.getElementById('likeDislikeContainer');
        likeDislikeContainer.innerHTML =
            '<p class="feedback-thanks" style="color: lightgreen;">Thank you for your feedback!</p>';
    }
}




function eng_to_tausug(input, mix_lang, callback) {

    var english = <?php echo $eng_json ?>;
    var tausug = <?php echo $tau_json ?>;
    var dict = [];

    // Create the dictionary object with longer phrases taking priority
    for (var i = 0; i < english.length; i++) {
        dict[english[i]] = tausug[i];
    }





    console.log('translating english');
    console.log(mix_lang);
    input = input.replace("'s", " is");
    input = input.replace(/[\r\n]/gm, ' ');
    input = input.toLowerCase();
    input = input.replace(/'/g, "");

    // mix_lang=  mix_lang.replace(/\s+/g, '');
    if (mix_lang == 1) {
        var from = 'fil';
        var to = 'en';
        $.ajax({
            url: "translate_test/trans2.php",
            method: "POST",
            data: {
                string: input,
                from: from,
                to: to,
            },
            success: function(data) {

                input = data;
                input = input.replace(/'/g, "");

                input = input.toLowerCase();

                for (let i = 0; i < input.length; i++) {
                    for (let j = input.length; j > i; j--) {
                        let substring = input.substring(i, j);
                        if (substring in dict) {
                            input = input.substring(0, i) + dict[substring] + input.substring(j);
                            i += dict[substring].length - 1; // skip over the newly inserted translation
                            break; // start searching for a new phrase from the end of the inserted translation
                        }
                    }
                }
                callback(input);
                console.log(input)

            }
        });
    } else {
        console.log(input);
        input = input.toLowerCase();

        for (let i = 0; i < input.length; i++) {
            for (let j = input.length; j > i; j--) {
                let substring = input.substring(i, j);
                if (substring in dict) {
                    input = input.substring(0, i) + dict[substring] + input.substring(j);
                    i += dict[substring].length - 1; // skip over the newly inserted translation
                    break; // start searching for a new phrase from the end of the inserted translation
                }
            }
        }

        callback(input);
        $('#to_textArea').val(input);
        return input;
    }



    // input = input.replace("_"," ");


}


function eng_to_tagalog(string, from, to) {

    var trasnlated_data = '';
    $.ajax({
        url: "translate_test/trans2.php",
        method: "POST",
        data: {
            string: string,
            from: from,
            to: to,
        },
        success: function(data) {
            displayTranslated(data, string, from, to)
            $('#to_textArea').val(data);
        }
    });


}

function tag_to_eng(string, from, to) {

    var trasnlated_data = '';
    $.ajax({
        url: "translate_test/trans2.php",
        method: "POST",
        data: {
            string: string,
            from: from,
            to: to,
        },
        success: function(data) {
            displayTranslated(data, string, from, to)
            $('#to_textArea').val(data);
        }
    });


}


function tau_to_tag(input) {


    var english = <?php echo $eng_json ?>;
    var tausug = <?php echo $tau_json ?>;
    var dict = [];
    for (var n = 0; n < tausug.length; n++) {

        dict[tausug[n]] = english[n];
    }
    input = input.replace("'s", " is");
    input = input.replace(/[\r\n]/gm, '');
    input = input.toLowerCase();

    // input = input.replace(/ /g,"_");
    for (let i = 0; i < input.length; i++) {
        for (let j = input.length; j > i; j--) {
            let substring = input.substring(i, j);
            if (substring in dict) {
                input = input.substring(0, i) + dict[substring] + input.substring(j);
                i += dict[substring].length - 1; // skip over the newly inserted translation
                break; // start searching for a new phrase from the end of the inserted translation
            }
        }
    }


    console.log(input)

    var from = 'en';
    var to = 'fil';

    $.ajax({
        url: "translate_test/trans2.php",
        method: "POST",
        data: {
            string: input,
            from: from,
            to: to,
        },
        success: function(data) {
            displayTranslated(data, input, from, to)
            $('#to_textArea').val(data);
        }
    });







}


function tag_to_tau(string, from, to) {

    var trasnlated_data = string;
    console.log(from)
    console.log(to)
    tagalog = string;
    $.ajax({
        url: "translate_test/trans2.php",
        method: "POST",
        data: {
            string: string,
            from: from,
            to: to,
        },
        success: function(data) {

            var input = data;
            var english = <?php echo $eng_json ?>;
            var tausug = <?php echo $tau_json ?>;
            var dict = [];
            for (var n = 0; n < english.length; n++) {

                dict[english[n]] = tausug[n];
            }

            console.log('translating to tausug');
            input = input.replace("'s", " is");
            input = input.replace(/[\r\n]/gm, ' ');
            input = input.toLowerCase();
            input = input.replace(/'/g, "");
            // input = input.replace(/ /g,"_");
            for (let i = 0; i < input.length; i++) {
                for (let j = input.length; j > i; j--) {
                    let substring = input.substring(i, j);
                    if (substring in dict) {
                        input = input.substring(0, i) + dict[substring] + input.substring(j);
                        i += dict[substring].length - 1; // skip over the newly inserted translation
                        break; // start searching for a new phrase from the end of the inserted translation
                    }
                }
            }
            console.log(input)

            $('#to_textArea').val(input);
            displayTranslated(input, tagalog, from, 'tau')
        }
    });





}


function tausug_to_english(input) {

    var english = <?php echo $eng_json ?>;
    var tausug = <?php echo $tau_json ?>;
    var dict = [];
    for (var n = 0; n < tausug.length; n++) {

        dict[tausug[n]] = english[n];
    }
    input = input.replace("'s", " is");
    input = input.replace(/[\r\n]/gm, '');
    input = input.toLowerCase();

    // input = input.replace(/ /g,"_");
    for (let i = 0; i < input.length; i++) {
        for (let j = input.length; j > i; j--) {
            let substring = input.substring(i, j);
            if (substring in dict) {
                input = input.substring(0, i) + dict[substring] + input.substring(j);
                i += dict[substring].length - 1; // skip over the newly inserted translation
                break; // start searching for a new phrase from the end of the inserted translation
            }
        }
    }

    return input;

}
</script>
</script>