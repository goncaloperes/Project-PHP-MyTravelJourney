<?php


    /*
    * Format the Date
    */
    function formatDate($date)
    {
        return date('F j, Y, g:i a', strtotime($date));
    }



    /*
     *
     */
    function shortenText($text, $chars = 250)
    {
        $text = $text . " ";
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text, ' ')); //To not cut the text in the middle of a word -> It stops when it picks up a SPACE
        $text = $text . "...";
        return $text;
    }