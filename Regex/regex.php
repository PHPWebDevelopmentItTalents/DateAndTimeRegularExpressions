<?php
error_reporting(E_ALL);

//match all words with is
$string = "disd is is safiaf";
$pattern = '/[a-zA-Z]*is[a-zA-Z]*/';

//match all words that ends ting
$string = "fsafasting fzzzzzzzasfastingdasfsa tingsadafasfd ting";
$pattern = '/\b[a-zA-Z]*ting\b/';

//match all valid words
$string = "fsafasting fzzzzzzzasfastingdasfsa tingsadafasfd ting";
$pattern = '/[[:alpha:]]+/';

//match valid sentence
$string = "Dsafasting fzzzzzzzasfastingdasfsa tingsadafasfd. Dsafsafa?";
$pattern = '/[[:upper:]]{1}.*[[:punct:]]{1}/';

//All gmail, yahoo and abv e-mails
$string = "asasfa@abv.bg fafaf@yahoo.com fsafasfa@gmail.com gadgadg fasdfasfa@mail.bg";
$pattern = '#[[:alnum:]]+@yahoo\.com|[[:alnum:]]+@gmail\.com|[[:alnum:]]+@abv\.bg#';

//All numbers between 1000 and 19999
$string = "123 4325 53252 19999 ";
$pattern = '/1{0,1}[[:digit:]]{4}/';

preg_match_all($pattern, $string, $matches);
var_dump($matches);