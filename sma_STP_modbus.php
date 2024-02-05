<?php

// ***************************************************************
// ********************* Auslesen modbus STPxx.0 *****************
// ***************************************************************
	$file_out = "/data/www/datafiles/sma.txt";	// für DB eindimensional
	$file2_out = "/data/www/datafiles/sma2.txt"; // zum kucken mehrdimensional

	$sma = '192.168.1.10';	// ip SMA STP
	$port = 502;

	$arr_dbout = array(); // für Ausgabe
	
	include "items.php"; // Arrays mit Register
	
// ***************************************************************
// ********************* SOCKET VERBINDUNG ***********************
// ***************************************************************
	if (!$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) echo "error-create".socket_strerror(socket_last_error())."\n";
	if (!socket_connect($sock, $sma, $port)) echo "error-create".socket_strerror(socket_last_error($socket))."\n";

// ***************************************************************
// ********************* FNC HEX TO VALUE ************************
// ***************************************************************
		function splithex ($resp, $item) {
			GLOBAL $arr_out, $arr_dbout;
			$i = 18; // head 18  
			$reg = 0; // count Reg
			while ($reg < $item['anz']) {
				$ty = $item['type'][$reg];
				$blen = 8;		// default 32bit
				if ($ty == 'q') $blen = 16; // set 64bit
				$hexpart = substr($resp, $i, $blen);
				
				// hexzeichenkette in dec
				$tmp = unpack($ty, pack($ty, hexdec($hexpart)));
				$raw = reset($tmp);
				$val = $raw*$item['fkt'][$reg]; // mit Faktor multiplizieren
				
				// ausgabe ******+
				echo $item['add'][$reg]." ".$item['bezdb'][$reg]." = ".$val." ".$item['unit'][$reg]."\n";
				
				// in arrays **
				$key = $item['bezdb'][$reg]." (".$item['unit'][$reg].")";
				$arr_out[$item['bez']][$reg][$key] = $val;
				$arr_out[$item['bez']][$reg]['register'] = $item['add'][$reg];
				
				$arr_dbout[$item['bezdb'][$reg]] = $val;
				
				$i+=$blen; $reg++; // bytes und register hochzählen
			}
		} // fnc split

// ***************************************************************
// ********************* MAIN SEND COMANDS ***********************
// ***************************************************************
	for ($z=0; $z<count($com); $z++) {
		socket_write($sock, $com[$z]['hex']);
		$length = 255;
		$resp = socket_read ( $sock,$length,PHP_BINARY_READ );
		$resp_hex = bin2hex($resp); // bin in hexstr umwandeln
		echo $resp_hex;
		echo "\n";
		splithex($resp_hex, $com[$z]);
	} // loop **********************************

	socket_close($sock); // socket close
	
// ***************************************************************
// ********************* AUSGABE  ********************************
// ***************************************************************
	$jsondb  = json_encode ($arr_dbout, JSON_PRETTY_PRINT);
	echo "jsondb: ". $jsondb."\n";
	
	$h = fopen($file_out,"w");
		fwrite($h,$jsondb);
	fclose($h);

?>
