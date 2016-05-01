<?
/**
 * Class BlockChain
 * rest server api call
 * Date created: 2016-04-30
 *
 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
 **/
class BlockChain
{
	var $_url;

	/**
	 * Constructor
	 *
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 **/
	public function __construct($url)
	{
		$this->_url = $url;
	}

	/**
	 * Function getBlock
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (string) $blockID the block id
	 * @return (json) - server response
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function getBlock($blockID)
	{
		$url = $this->_url . "/chain/blocks/" . $blockID;
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		$result = curl_exec ($ch);
		curl_close ($ch); 

		return $result;
	}

	/**
	 * Function queryChainCode
	 * Query chain code
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (string) $chaincodeIDName
	 * @param (string) $string
	 * @param (string) $secureContext
	 * @return (json) - response server
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function queryChainCode($chaincodeIDName, $string, $secureContext)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->_url."/chaincode");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "jsonrpc": "2.0", "method": "query", "params": { "type": 1, "chaincodeID": { "name": "'.$chaincodeIDName.'" }, "ctorMsg": { "function": "read", "args": [ "'.$string.'" ] }, "secureContext": "'.$secureContext.'" }, "id": 0 }');

		$result = curl_exec ($ch);
		curl_close ($ch); 
		return $result;

	}

	/**
	 * Function deployChainCode
	 * Deploy chain code
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (url) $chaincodeID
	 * @param (string) $secureContext
	 * @param (string) $msg
	 * @return (json) - response server
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function deployChainCode($chaincodeIDName, $string, $secureContext)
	{
	}
}
?>
