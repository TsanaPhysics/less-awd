<?php
/**
 * LEQs-AWD Smart Telemetry API
 * Returns real-time or simulated water level, VPD, valve state, and environmental parameters.
 * Faculty of Science & Technology, Rambhai Barni Rajabhat University
 */
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

// Simulated sensor reading or live query
$mode = isset($_GET['mode']) ? $_GET['mode'] : 'rice_awd';

$response = [
    'status' => 'success',
    'timestamp' => date('c'),
    'device_id' => 'LEQS-AWD-ESP32-01',
    'firmware_version' => 'v2.4.0-OpenHandySense',
    'battery_voltage' => 12.6,
    'battery_percent' => 94,
    'solar_power_w' => 14.8,
    'rssi_dbm' => -68,
    'network' => '4G-LTE'
];

if ($mode === 'rice_awd') {
    $water_level_cm = isset($_GET['level']) ? floatval($_GET['level']) : -3.5;
    $pump_active = ($water_level_cm <= -15.0);
    $stage = 'Vegetative (แตกกอ)';
    if ($water_level_cm > 5) $stage = 'Flooded (น้ำท่วมขัง)';
    elseif ($water_level_cm < -10) $stage = 'Drying Phase (ช่วงปล่อยแห้ง)';

    $response['data'] = [
        'mode' => 'rice_awd',
        'water_level_cm' => $water_level_cm,
        'water_status' => ($water_level_cm >= 0 ? "น้ำท่วมผิวดิน +{$water_level_cm} cm" : "ระดับน้ำใต้ดิน " . abs($water_level_cm) . " cm"),
        'critical_threshold_cm' => -15.0,
        'target_refill_cm' => 5.0,
        'valve_state' => $pump_active ? 'OPEN' : 'CLOSED',
        'pump_relay' => $pump_active ? 1 : 0,
        'methane_status' => ($water_level_cm <= 0) ? 'SUPPRESSED (ลดมีเทน 48%)' : 'AEROBIC ACTIVE',
        'crop_stage' => $stage
    ];
} else {
    $temp = 32.4;
    $rh = 68.0;
    // Magnus-Tetens formula for VPD
    $es = 0.61078 * exp((17.27 * $temp) / ($temp + 237.3));
    $ea = $es * ($rh / 100);
    $vpd = $es - $ea;

    $response['data'] = [
        'mode' => 'durian_vpd',
        'air_temperature_c' => $temp,
        'air_humidity_percent' => $rh,
        'vpd_kpa' => round($vpd, 2),
        'soil_moisture_percent' => 54.2,
        'soil_temperature_c' => 28.5,
        'soil_ec_us_cm' => 820,
        'fogger_valve' => ($vpd > 1.4) ? 'OPEN' : 'CLOSED',
        'transpiration_risk' => ($vpd > 1.4) ? 'HIGH' : (($vpd < 0.6) ? 'LOW' : 'OPTIMAL')
    ];
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
