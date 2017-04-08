<?php

require_once "connect.php"; // Gives us $con
require_once "thermo_functions.php";
require_once "constants.php";

$qry_str = 'SELECT  `value` FROM `status` WHERE `id` 
	IN ('.CURRENT_SETPOINT_ID.', '.CURRENT_TEMP_ID.', '.MODE_ID.',
			'.OCCUPIED_ID.', '.HEAT_STATUS_ID.', '.COOL_STATUS_ID.',
			'.FAN_STATUS_ID.') ORDER BY `id` ASC;';

$result = query_db($con, $qry_str);

# 1
$entry = fetch_array_db($result);
$return['current_temp'] = $entry['value'];

# 2
$entry = fetch_array_db($result);
$return['current_setpoint'] = $entry['value'];

# 3
$entry = fetch_array_db($result);
$return['mode'] = $entry['value'];

# 18
$entry = fetch_array_db($result);
$return['occupied'] = $entry['value'];

# 19
$entry = fetch_array_db($result);
$return['heat_status'] = $entry['value'];

# 20
$entry = fetch_array_db($result);
$return['cool_status'] = $entry['value'];

# 21
$entry = fetch_array_db($result);
$return['fan_status'] = $entry['value'];

echo json_encode($return);

?>