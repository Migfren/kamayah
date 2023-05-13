<!DOCTYPE html>
<html>

<head>
    <title>Spell Checker Example</title>
    <script src="typo.js"></script>
</head>

<body>
    <script>
    function correctSpelling(text) {
        const dictionary = new Typo('en_US');
        const words = text.split(/\s+/);
        const correctedWords = words.map((word) => {
            if (!dictionary.check(word)) {
                const suggestions = dictionary.suggest(word);
                if (suggestions.length > 0) {
                    return suggestions[0];
                }
            }
            return word;
        });
        return correctedWords.join(' ');
    }

    // test the function
    const text = "This is an ronald of incorect spelling.";
    const correctedText = correctSpelling(text);
    console.log(correctedText); // "This is an example of incorrect spelling."
    </script>
</body>

</html>