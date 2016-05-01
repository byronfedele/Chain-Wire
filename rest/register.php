<?php
include "blockchain.class.php";

$BlockChain = new BlockChain('https://edb5a01e-3006-4629-90f0-21544d94b937_vp1-api.blockchain.ibm.com:443');

$registrar = $BlockChain->registrar('user_type8_60cea889af', '417e6181d5');
echo $registrar['OK'];
echo "\n";
?>
