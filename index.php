<link rel="stylesheet" href="bootstrap.min.css" crossorigin="anonymous"
<?php
/**
 * Created by PhpStorm.
 * User: jsilva
 * Date: 10/06/18
 * Time: 11:26
 */

$imageSection = initializeImageArray();
printImageArray($imageSection, "Original Block Image 0-255 (8bits)");
$flifedImage = flifAgorithm($imageSection);
printImageArray($flifedImage, "Flifed Block Image(median)");

function initializeImageArray()
{
    $image_section[0][0] = 168;
    $image_section[0][1] = 161;
    $image_section[0][2] = 161;
    $image_section[0][3] = 150;
    $image_section[0][4] = 154;
    $image_section[0][5] = 168;
    $image_section[0][6] = 164;
    $image_section[0][7] = 154;

    $image_section[1][0] = 171;
    $image_section[1][1] = 154;
    $image_section[1][2] = 161;
    $image_section[1][3] = 150;
    $image_section[1][4] = 157;
    $image_section[1][5] = 171;
    $image_section[1][6] = 150;
    $image_section[1][7] = 164;

    $image_section[2][0] = 171;
    $image_section[2][1] = 168;
    $image_section[2][2] = 147;
    $image_section[2][3] = 164;
    $image_section[2][4] = 164;
    $image_section[2][5] = 161;
    $image_section[2][6] = 143;
    $image_section[2][7] = 154;

    $image_section[3][0] = 164;
    $image_section[3][1] = 171;
    $image_section[3][2] = 154;
    $image_section[3][3] = 161;
    $image_section[3][4] = 157;
    $image_section[3][5] = 157;
    $image_section[3][6] = 147;
    $image_section[3][7] = 132;

    $image_section[4][0] = 161;
    $image_section[4][1] = 161;
    $image_section[4][2] = 157;
    $image_section[4][3] = 154;
    $image_section[4][4] = 143;
    $image_section[4][5] = 161;
    $image_section[4][6] = 154;
    $image_section[4][7] = 132;

    $image_section[5][0] = 164;
    $image_section[5][1] = 168;
    $image_section[5][2] = 157;
    $image_section[5][3] = 154;
    $image_section[5][4] = 161;
    $image_section[5][5] = 140;
    $image_section[5][6] = 140;
    $image_section[5][7] = 132;

    $image_section[6][0] = 154;
    $image_section[6][1] = 161;
    $image_section[6][2] = 157;
    $image_section[6][3] = 150;
    $image_section[6][4] = 140;
    $image_section[6][5] = 132;
    $image_section[6][6] = 136;
    $image_section[6][7] = 128;

    return $image_section;
}

function initializeEmptyArray()
{
    for ( $line = 0; $line <= 7; $line++ ) {
        for ( $col = 0; $col <= 6; $col++ ) {
            $flifedImage[$col][$line] = 0;
        }
    }

    return $flifedImage;
}

function printImageArray($imageSection, $message)
{
    echo "<div class='row'>";
    echo "<div class='col-12'><h2>$message</h2></div>";
    for ( $line = 0; $line <= 7; $line++ ) {
        echo "<div class='col-12 row text-center '>";
        for ( $col = 0; $col <= 6; $col++ ) {
            echo "<div class='col-1 p-2 border'>" . $imageSection[$col][$line] . "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}

function flifAgorithm($imageSection)
{
    $flifedImage = initializeEmptyArray();
    for ( $line = 0; $line <= 7; $line++ ) {
        for ( $col = 0; $col <= 6; $col++ ) {
            if ( $col === 0 && $line === 0 ) { //first celule
                $flifedImage[$col][$line] = median($imageSection[$col][$line], $imageSection[$col][$line], $imageSection[$col][$line]);
            } elseif ( $col === 0 ) { //firt column with rhe first celule
                $flifedImage[$col][$line] = median($imageSection[$col][$line - 1], $imageSection[$col][$line], $imageSection[$col][$line - 1]);
            } elseif ( $line === 0 ) { //firt column with rhe first celule
                $flifedImage[$col][$line] = median($imageSection[$col][$line], $imageSection[$col - 1][$line], $imageSection[$col - 1][$line]);
            } else {
                $flifedImage[$col][$line] = median($imageSection[$col][$line-1], $imageSection[$col - 1][$line], $imageSection[$col - 1][$line-1]);
            }
        }
    }

    return $flifedImage;
}

function median($upNeighbor, $leftNeighbor, $upLeftNeighbor)
{
    $medArray[0] = $upNeighbor;
    $medArray[1] = $leftNeighbor;
    $medArray[2] = $upNeighbor + $leftNeighbor - $upLeftNeighbor;
//    echo "<br>mediana($medArray[0] , $medArray[1] , $medArray[2] )";
    sort($medArray);

    return $medArray[1];
}
