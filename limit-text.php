<?php
function limit_text($text,$limit){
    if(str_word_count($text, 0)>$limit){
        $word = str_word_count($text,2);
        $pos=array_keys($word);
        $text=substr($text,0,$pos[$limit]). '...';
    }
    return $text;
}

?>