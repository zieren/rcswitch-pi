<?php
// For Apache to run this, run visudo and add this line:
// www-data ALL=(ALL) NOPASSWD: /usr/bin/rcswitch
define('SWITCH_CMD', 'sudo rcswitch');
date_default_timezone_set('Europe/Berlin');

$systemCode = $_GET['system'];
$unitCode = $_GET['unit'];
$state = $_GET['state'];
$sleep = $_GET['sleep'];

$message = date('Y-m-d H:i:s').' switching '.$systemCode.':'.$unitCode.' to '.$state.'... ';

$output = array();
$retval = 0;
$cmd = implode(' ', array(SWITCH_CMD, $systemCode, $unitCode, $state, '2>&1'));
if ($sleep) {
  $cmd = '(sleep '.$sleep.' ; '.$cmd.') > /dev/null &';
}
exec($cmd, $output, $retval);

if ($retval === 0) {
  $message .= "OK\n";
} else {
  $message .= 'FAIL: '.implode("\n", $output)."\n";
}
$logfile = fopen('/tmp/rcswitch.log', 'a');
fwrite($logfile, $message);
fclose($logfile);
echo $message;
