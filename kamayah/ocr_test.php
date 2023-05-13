<?php










require 'vendor/autoload.php';

$request = new HttpRequest();
$request->setUrl('https://microsoft-computer-vision3.p.rapidapi.com/analyze');
$request->setMethod(HTTP_METH_POST);

$request->setQueryData([
	'language' => 'en',
	'descriptionExclude[0]' => 'Celebrities',
	'visualFeatures[0]' => 'ImageType',
	'details[0]' => 'Celebrities'
]);

$request->setHeaders([
	'content-type' => 'application/json',
	'X-RapidAPI-Key' => '287958e683mshba0c0d3cb708978p1bdf1fjsnf9420709d683',
	'X-RapidAPI-Host' => 'microsoft-computer-vision3.p.rapidapi.com'
]);

// $request->setBody('{"url":"http://example.com/images/test.jpg"}');

try {
	$response = $request->send();

	echo $response->getBody();
} catch (HttpException $ex) {
	echo $ex;
}