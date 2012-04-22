<?php

$AWS_API_KEY = 'AKIAJGCDYNVZMJR77GKA';
$AWS_API_SECRET_KEY = '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';
$AWS_ASSOCIATE_TAG = 'merchapptc-20';

require 'Exeu-Amazon-ECS-PHP-Library/lib/AmazonECS.class.php';
//require_once '../sdk.class.php';


try{

// get a new object with your API Key and secret key. Lang is optional.                                              
$myAmazon = new AmazonECS($AWS_API_KEY, $AWS_API_SECRET_KEY, 'com', $AWS_ASSOCIATE_TAG);

// from now on you want to have pure arrays as response
$myAmazon->returnType(AmazonECS::RETURN_TYPE_ARRAY);

// Make querie to amazon for this search item
   $responseGroup = 'Large';
//    $category = 'GourmetFood';
    $category = 'DVD';
//    $category = 'Books';

    $searchTerm = 'food network star';

    $responses = $myAmazon->country('com')->category($category)->responseGroup($responseGroup)->search($searchTerm);

    foreach ($responses['Items']['Item'] as $response) {

//[Label] => parthenonfoods.com

         echo '<hr/>Title: ' . $response['ItemAttributes']['Title'] . '<br/>';
         echo 'Publisher: ' . $response['ItemAttributes']['Publisher'] . '<br/>';
         echo 'Label: ' . $response['ItemAttributes']['Label'] . '<br/>';
         echo 'Price: ' . $response['OfferSummary']['LowestNewPrice']['FormattedPrice'] . '<br/>';
//         echo 'Image Link: ' . $response['ImageSets']['ImageSet']['SmallImage']['URL'] . '<br/>';
//         echo 'Item Link: ' . $response['DetailPageURL'] . '<br/>';

        $name = $response['ItemAttributes']['Title'];
        $imageUrl = $response['ImageSets']['ImageSet']['MediumImage']['URL'];

        $link = $response['DetailPageURL'];
        $image = '<img width="64" height="32" src="'.$imageUrl.'">';

        echo '<a href="'.$link.'" target="_blank"><img src="'.$imageUrl.'"></a>';

    } 

}
catch (Exception $e)
{
    //echo $e->getMessage();
}

?>