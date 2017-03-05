<?php 
$date = new DateTime(date("Y-m-d h:i:s"), new DateTimeZone('Europe/Paris')); 

date_default_timezone_set('America/New_York'); 

echo date("Y-m-d h:iA", $date->format('U'))."<br>"; 
echo date("Y-m-d h:i:s")."<br>"; 

// 2012-07-05 10:43AM 

function timezone_offset_string ($offset) {
        return sprintf( "%s%02d:%02d", ( $offset >= 0 ) ? '+' : '-', abs( $offset / 3600 ), abs( $offset % 3600 ) );
}

$offset = timezone_offset_get( new DateTimeZone( 'Asia/Bangkok' ), new DateTime() );
echo "offset Asia/Bangkok : " . timezone_offset_string( $offset ) . "<br>";

$offset = timezone_offset_get( new DateTimeZone( 'Europe/Paris' ), new DateTime() );
echo "offset Europe/Paris : " . timezone_offset_string( $offset ) . "<br>";

$offset = timezone_offset_get( new DateTimeZone( 'America/New_York' ), new DateTime() );
echo "offset America/New_York : " . timezone_offset_string( $offset ) . "<br>";

echo date("e")."<br><br>";


$zones = timezone_identifiers_list();

//print_r($zones);

foreach ($zones as $a => $val) {
	
	echo $a." : ".$zones[$a]."<br>";
	
}

/*foreach ($zones as $zone) 
{
    $zone = explode('/', $zone); // 0 => Continent, 1 => City
    
    // Only use "friendly" continent names
    if ($zone[0] == 'Africa' || $zone[0] == 'America' || $zone[0] == 'Antarctica' || $zone[0] == 'Arctic' || $zone[0] == 'Asia' || $zone[0] == 'Atlantic' || $zone[0] == 'Australia' || $zone[0] == 'Europe' || $zone[0] == 'Indian' || $zone[0] == 'Pacific')
    {        
        if (isset($zone[1]) != '')
        {
            echo $locations[$zone[0]][$zone[0]. '/' . $zone[1]] = str_replace('_', ' ', $zone[1])."<br>"; // Creates array(DateTimeZone => 'Friendly name')
        } 
    }
}*/
?>