<?php

function dateDiff($finalDate,$startDate)
{
  // Calculating the difference in timestamps
   $diff = strtotime($finalDate) - strtotime($startDate);

   // 1 day = 24 hours
   // 24 * 60 * 60 = 86400 seconds
   return abs(round($diff / 86400));
}


?>
