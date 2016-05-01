<?php
include "blockchain.class.php";

$BlockChain = new BlockChain('https://edb5a01e-3006-4629-90f0-21544d94b937_vp1-api.blockchain.ibm.com:443');

$queryChain = $BlockChain->deleteUser("user_type2_17239b9f9d");

echo $queryChain['OK'];
echo $queryChain['Error'];
echo "\n";

?>
