<!-- Create an HTML canvas element -->
<canvas id="canvas" width="600" height="600"></canvas>
<div id='textarea'></div> <br>
<!-- Load the image and recognize the text when the page is loaded -->

<?php 
include('../function/db.php');
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
var english = <?php echo $eng_json ?>;
var tausug = <?php echo $tau_json ?>;
var dict = [];
for (var n = 0; n < english.length; n++) {

    dict[english[n]] = tausug[n];
}



var container1 = document.getElementById('textarea');
var container2 = document.createElement('div');

// create a span for the keys

input = 'what is your name and  how are you, why do you';


for (var key in dict) {

    // Use the replace method with a callback function
    input = input.replace(key, function(match) {


        // Create a new span element for each replacement
        var keySpan = document.createElement('span');

        // Set the text content of the key span to the replacement
        keySpan.textContent += dict[key] + ' ';
        // Generate a random color for the key span
        const randomColor = Math.floor(Math.random() * 16777215).toString(16);
        keySpan.style.color = randomColor;

        // Append the key span to the container element
        container1.appendChild(keySpan);

        var result = document.createElement('span');

        result.textContent += key + ' ';
        result.style.color = randomColor;

        container2.appendChild(result);
 
        return dict[key];
    });
    document.body.appendChild(container2);

}
</script>