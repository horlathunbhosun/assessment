<?php
$handle = fopen ("php://stdin", "r");
function compareTriplets($a0, $a1, $a2, $b0, $b1, $b2){
    // Complete this function
    $alice = 0;
    $bob = 0;

    $alice += ($a0 > $b0? 1:0) + ($a1 > $b1? 1:0) + ($a2 > $b2? 1:0);
    $bob += ($b0 > $a0? 1:0) + ($b1 > $a1? 1:0) + ($b2 > $a2? 1:0);

    $score = [];
    array_push($score,$alice,$bob);
    return $score;
}

fscanf($handle, "%d %d %d", $a0, $a1, $a2);
fscanf($handle, "%d %d %d", $b0, $b1, $b2);
$result = compareTriplets($a0, $a1, $a2, $b0, $b1, $b2);
echo implode(" ", $result)."\n";
?>
