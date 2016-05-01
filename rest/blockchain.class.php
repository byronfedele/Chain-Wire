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
	 * Function registrar
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function registrar($enrollId, $enrollSecret)
	{
		// set the URL
		$url = $this->_url."/registrar";

		// start the CURL
		$ch = curl_init();

		// set the params
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "enrollId": "'.$enrollId.'", "enrollSecret": "'.$enrollSecret.'" }');

		// if it's not working return an error
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close ($ch); 
		$array = json_decode($result, true);

		return $array;
	}

	/**
	 * Function deleteUser
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (string) $blockID the block id
	 * @return (array) - the response
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function deleteUser($enrollmentID)
	{
		// set the URL
		$url = $this->_url . "/registrar/" . $enrollmentID;
		
		// start the CURL
		$ch = curl_init();

		// set the options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		// if it's not working return an error
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close ($ch); 
		$array = json_decode($result, true);

		return $array;
	}

	/**
	 * Function getBlock
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (string) $blockID the block id
	 * @return (array) - the response
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function getBlock($blockID)
	{
		// set the URL
		$url = $this->_url . "/chain/blocks/" . $blockID;
		
		// start the CURL
		$ch = curl_init();

		// set the options
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		// if it's not working return an error
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close ($ch); 
		$array = json_decode($result, true);

		return $array;
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
	 * @return (array) - the response
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function queryChainCode($chaincodeIDName, $string, $secureContext)
	{
		// set the URL
		$url = $this->_url."/chaincode";

		// start the CURL
		$ch = curl_init();

		// set the params
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "jsonrpc": "2.0", "method": "query", "params": { "type": 1, "chaincodeID": { "name": "'.$chaincodeIDName.'" }, "ctorMsg": { "function": "read", "args": [ "'.$string.'" ] }, "secureContext": "'.$secureContext.'" }, "id": 0 }');

		// if it's not working return an error
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close ($ch); 
		$array = json_decode($result, true);

		return $array;
	}

	/**
	 * Function deployChainCode
	 * Deploy chain code
	 * Date created: 2016-04-30
	 *
	 * @access public
	 * @param (string) $string
	 * @param (string) $secureContext
	 * @return (json) - response server
	 * @author <a href="mailto:alberto.fontana@maxpho.com">Alberto Fontana</a>
	 * @copyright Copyright (c) 2009-2016 Maxpho Srl (http://www.maxpho.com) 
	 **/
	public function deployChainCode($string, $secureContext)
	{
		global $go_path;

		// set the URL
		$url = $this->_url."/chaincode";

		// start the CURL
		$ch = curl_init();

		// set the params
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "jsonrpc": "2.0", "method": "deploy", "params": { "type": 1, "chaincodeID": { "path": "'.$go_path.'" }, "ctorMsg": { "function": "init", "args": [ "'.$string.'" ] }, "secureContext": "'.$secureContext.'" }, "id": 0 }');

		// if it's not working return an error
		if( ! $result = curl_exec($ch)) 
		{ 
			trigger_error(curl_error($ch)); 
		} 
		curl_close ($ch); 
		$array = json_decode($result, true);

		return $array;
	}
}
?>
