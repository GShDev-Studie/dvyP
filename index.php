<?php 
 
// Load and initialize downloader class 
include_once 'YouTubeDownloader.class.php'; 
$handler = new YouTubeDownloader(); 
 
// Youtube video url 
$youtubeURL = $_GET[url]; 
 
// Check whether the url is valid 
if(!empty($youtubeURL) && !filter_var($youtubeURL, FILTER_VALIDATE_URL) === false){ 
    // Get the downloader object 
    $downloader = $handler->getDownloader($youtubeURL); 
     
    // Set the url 
    $downloader->setUrl($youtubeURL); 
     
    // Validate the youtube video url 
    if($downloader->hasVideo()){ 
	    $videoDownloadLink = $downloader->getVideoDownloadLink(); 
        $videoTitle = $videoDownloadLink[0]['title'];
         $downloadURL = $videoDownloadLink[0]['url']; 
	echo "{'succeeded':false,'url':'$downloadURL','title':'$videoTitle'}";
	
	
		
			
				  }else{ 
        echo "{'msg':'The video is not found, please check YouTube URL.','succeeded':false}"; 
    } 
}else{ 
    echo "{'msg':'Please provide valid YouTube URL.','succeeded':false}"; 
} 
 
?>
