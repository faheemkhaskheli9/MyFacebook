<?php
function humanTiming ($time)
	{
    $time = time() - $time; // to get the time since that moment
    $tokens = array 
		(
        31536000 => 'Year',
        2592000 => 'Month',
        604800 => 'Week',
        86400 => 'Day',
        3600 => 'Hour',
        60 => 'Minute',
        1 => 'Second'
    	);
    foreach ($tokens as $unit => $text) 
		{
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    	}
	}
?>