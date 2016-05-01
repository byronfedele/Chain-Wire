<?php
include "blockchain.class.php";

$BlockChain = new BlockChain('https://edb5a01e-3006-4629-90f0-21544d94b937_vp1-api.blockchain.ibm.com:443');

//echo $BlockChain->getBlock(5);
echo $BlockChain->queryChainCode("519d8eb666c35fc8bf2e41edfb3a10174709b420708cf8f9a0677c3823224666695f1d52dbd8e1894aad30f57d365370f191ac4e332e73f3226c50cb3317fac6", "hello_world", "user_type1_9c8a37b61c");


?>
