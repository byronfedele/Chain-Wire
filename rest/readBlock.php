<?php
include "blockchain.class.php";

$BlockChain = new BlockChain('https://edb5a01e-3006-4629-90f0-21544d94b937_vp1-api.blockchain.ibm.com:443');

$queryChain = $BlockChain->queryChainCode(
	"a4d929a8f8f79113961329c9f42f19874056f7a93ff8f7f96d4df85951b9dae2cb05b6a4db4d11c7e6167dd4553bf51332c08bd9656011a0204b3b9d82ab1ee3", 
	"hello_world", 
	"user_type1_9c8a37b61c"
);

echo $queryChain['result']['message'];
echo "\n";

?>
