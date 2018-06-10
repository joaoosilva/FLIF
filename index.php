<link rel="stylesheet" href="bootstrap.min.css" crossorigin="anonymous"
<?php
/**
 * Created by PhpStorm.
 * User: jsilva
 * Date: 10/06/18
 * Time: 11:26
 */

$image_section = initializeImageArray();
printImageArray($image_section, "Original Block Image 0-255 (8bits)");


function initializeImageArray()
{
    $image_section[0][0] = 100;
    $image_section[0][1] = 100;
    $image_section[0][2] = 60;
    $image_section[0][3] = 62;
    $image_section[0][4] = 70;
    $image_section[0][5] = 81;

    $image_section[1][0] = 100;
    $image_section[1][1] = 101;
    $image_section[1][2] = 62;
    $image_section[1][3] = 64;
    $image_section[1][4] = 100;
    $image_section[1][5] = 10;

    $image_section[2][0] = 10;
    $image_section[2][1] = 10;
    $image_section[2][2] = 10;
    $image_section[2][3] = 10;
    $image_section[2][4] = 10;
    $image_section[2][5] = 10;

    $image_section[3][0] = 10;
    $image_section[3][1] = 10;
    $image_section[3][2] = 10;
    $image_section[3][3] = 10;
    $image_section[3][4] = 10;
    $image_section[3][5] = 10;

    $image_section[4][0] = 10;
    $image_section[4][1] = 10;
    $image_section[4][2] = 10;
    $image_section[4][3] = 10;
    $image_section[4][4] = 10;
    $image_section[4][5] = 10;

    $image_section[5][0] = 10;
    $image_section[5][1] = 10;
    $image_section[5][2] = 10;
    $image_section[5][3] = 10;
    $image_section[5][4] = 10;
    $image_section[5][5] = 10;

    return $image_section;
}

function printImageArray($image_section, $message)
{
    echo "<div class='row'>";
    echo "<div class='col-12 '></div><h2>$message</h2></div>";
    for ( $x = 0; $x <= 5; $x++ ) {
        echo "<div class='col-12 row text-center '>";
        for ( $y = 0; $y <= 5; $y++ ) {
            echo "<div class='col-1 p-2 border'>" . $image_section[$x][$y] . "</div>";
        }
        echo "</div>";
    }
    echo "</div>";
}
