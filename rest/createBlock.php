<?php
include "config.php";
include "blockchain.class.php";

$BlockChain = new BlockChain('https://edb5a01e-3006-4629-90f0-21544d94b937_vp1-api.blockchain.ibm.com:443');

$create_block = $BlockChain->deployChainCode("we're under attack!", 'user_type1_bdcf4973d7');
$ccid = $create_block['result']['message'];
echo $ccid;
echo "\n";
?>
