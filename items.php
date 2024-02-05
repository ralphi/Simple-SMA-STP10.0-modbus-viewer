<?php

	$com  = array();
	$com[0] = array(
		'bez'   => 'DC Eingang A',
		'bezdb'	=> array('PVA_I', 'PVA_U', 'PVA_P'),
		'hex'	=> "\x00\x02\x00\x00\x00\x06\x03\x03\x78\x31\x00\x06",
		'add'	=> array(30769,30771,30773),
		'anz'	=> 3,
		'fkt'	=> array(0.001, 0.01, 1),
		'unit'	=> array('A', 'V', 'W'),
		'type'	=> array('l', 'l', 'l')	// l, q
	);
	$com[1] = array(
		'bez'   => 'DC Eingang B',
		'bezdb'	=> array('PVB_I', 'PVB_U', 'PVB_P'),
		'hex'	=> "\x00\x03\x00\x00\x00\x06\x03\x03\x78\xED\x00\x06",
		'add'	=> array(30957,30959,30961),
		'anz'	=> 3,
		'fkt'	=> array(0.001, 0.01, 1),
		'unit'	=> array('A', 'V', 'W'),
		'type'	=> array('l', 'l', 'l')	// l, q
	);
	$com[2] = array(	// PV Ertrag
		'bez'   => 'PV Ertrag',
		'bezdb'	=> array('PVE_Wh','PVE_kWh','PVE_MWh','PVdayE_Wh','PVdayE_kWh', 'PVdayE_MWh'),
		'hex'	=> "\x00\x04\x00\x00\x00\x06\x03\x03\x77\x41\x00\x0C",
		'add'	=> array(30529,30531,30533,30535,30537,30539 ),
		'anz'	=> 6,
		'fkt'	=> array(1,1,1,1,1,1),
		'unit'	=> array('Wh','kWh','MWh','Wh','kWh','MWh'),
		'type'	=> array('l','l','l','l','l','l')	// l, q
	);
	$com[3] = array(	// Bat1
		'bez'   => 'Batterie',
		'bezdb'	=> array('Bat_I','Bat_SoC','Bat_kap','Bat_temp','Bat_U'),
		'hex'	=> "\x00\x05\x00\x00\x00\x06\x03\x03\x78\x7B\x00\x0A",
		'add'	=> array(30843,30845,30847,30849,30851),
		'anz'	=> 5,
		'fkt'	=> array(0.001,1,1,0.1,0.01),
		'unit'	=> array('A','%','%','°C','V'),
		'type'	=> array('l','l','l','l','l','l')	// l, q
	);
	$com[4] = array(	// Batterieladung
		'bez'   => 'Batterieladung',
		'bezdb'	=> array('P_Batin','P_Batout','BatEin','BatEout'),
		'hex'	=> "\x00\x06\x00\x00\x00\x06\x03\x03\x7A\xA1\x00\x0C",
		'add'	=> array(31393,31395,31397,31401),
		'anz'	=> 4,
		'fkt'	=> array(1,1,1,1),
		'unit'	=> array('Wh','Wh','Wh','Wh'),
		'type'	=> array('l','l','q','q')	// l, q
	);
	$com[5] = array(	// Netz
		'bez'   => 'Netz',
		'bezdb'	=> array('U_L1','U_L2','U_L3','Pexp_L1','Pexp_L2','Pexp_L3',
		'Pimp_L1','Pimp_L2','Pimp_L3'),
		'hex'	=> "\x00\x07\x00\x00\x00\x06\x03\x03\x7A\x15\x00\x12",
		'add'	=> array(31253,31255,31257,31259,31261,31263,31265,31267,31269),
		'anz'	=> 9,
		'fkt'	=> array(0.01,0.01,0.01,1,1,1,1,1,1),
		'unit'	=> array('V','V','V','W','W','W','W','W','W'),
		'type'	=> array('l','l','l','l','l','l','l','l','l')	// l, q
	);
	$com[6] = array(	// Netz
		'bez'   => 'Zaehler',
		'bezdb'	=> array('E_IMP','E_EXP'),
		'hex'	=> "\x00\x08\x00\x00\x00\x06\x03\x03\x77\x75\x00\x04",
		'add'	=> array(30581,30583),
		'anz'	=> 2,
		'fkt'	=> array(1,1),
		'unit'	=> array('Wh','Wh'),
		'type'	=> array('l','l')	// l, q
	);
	$com[7] = array(	// Netz
		'bez'   => 'AC_Leistung',
		'bezdb'	=> array('P_IMP','P_EXP'),
		'hex'	=> "\x00\x09\x00\x00\x00\x06\x03\x03\x78\x91\x00\x04",
		'add'	=> array(30865,30867),
		'anz'	=> 2,
		'fkt'	=> array(1,1),
		'unit'	=> array('W','W'),
		'type'	=> array('l','l')	// l, q
	);


?>
