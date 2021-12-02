<?php
$film = json_decode(file_get_contents("http://www.omdbapi.com/?i=tt0118715&apikey=2a13b34e"), true);
echo $film["Title"]." je film koji je izašao ".$film["Year"]." godine. U njemu glume ".$film["Actors"].".";
?>