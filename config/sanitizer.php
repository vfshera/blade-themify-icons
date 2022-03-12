<?php
/**
 * $svgPath => From Dir
 * $cleanSvgPath => To Dir
 */
$svgPath = implode(DIRECTORY_SEPARATOR,[__DIR__, "..","resources","icons"]);
$cleanSvgPath = implode(DIRECTORY_SEPARATOR,[__DIR__, "..","resources","svg"]);


/**
 * GET SVG ONLY
 */
$icons = preg_grep('/.+\.svg$/', scandir($svgPath));

/**
 * FLATTENING KEYS
 */

$icons = iterator_to_array(new RecursiveIteratorIterator(new RecursiveArrayIterator($icons)), false);


foreach($icons as $icon){

  $separator = 'svg11.dtd">';
$iconContent = file_get_contents(implode(DIRECTORY_SEPARATOR,[$svgPath,$icon]));

$cleanIcon = trim(explode($separator,$iconContent)[1]);

$newSvgFile = fopen(implode(DIRECTORY_SEPARATOR,[$cleanSvgPath,strtolower($icon)]), 'w');

if(fwrite($newSvgFile,$cleanIcon)){
  echo "{$icon} WRITTEN!";
}else{
  
echo "WRITTING {$icon} FAILED!";
}



}