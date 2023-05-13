<?php 

 function removeSymbol ($input){
    $input = preg_replace('/[^(\x20-\x7F)]*/','',strtolower($input));
    $input = preg_replace('/[.,]/', '', $input);
    return $input;
 }


  $word_count= 0;
  $dictionary = mysqli_query($con,"SELECT * from english_tausug ");        
  while ($row = mysqli_fetch_array($dictionary)) {
     $english[] = removeSymbol($row['english']);
     $tausug[] =removeSymbol($row['tausug']);
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

// Object.keys(dict).forEach(function(key) {
//     console.log(key + ":" + dict[key]);

// });
</script>


<script>
function eng_to_tausug(input) {

    input = input.replace(/[^a-zA-Z0-9 ]/g, "");
    input = input.toLowerCase();
    for (let i = 0; i < input.length; i++) {
        Object.keys(dict).forEach(function(key) {
            input = input.replace(key, dict[key]);


        });

    }
    $("#text_area").val(input);

}


function tausug_to_english(input) {
    input = input.replace(/[^a-zA-Z0-9 ]/g, "");
    input = input.toLowerCase();
    
    for (let i = 0; i < input.length; i++) {
        Object.keys(dict).forEach(function(key) {
            input = input.replace(dict[key], key);


        });
    }

    $("#text_area").val(input);

}
</script>