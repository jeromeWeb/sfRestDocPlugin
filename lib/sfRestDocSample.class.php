<?php 

class sfRestDocSample
{
	var $xml;
	
	public function loadFromXml(SimpleXMLElement $xml)
	{
		$this->xml = $xml;
	}
	
	public function getUrl()
	{
		return (string) $this->xml->URL;
	}

	public function getData()
	{
		return (string) $this->xml->DATA;
	}

	public function getMethod()
	{
		return (string) $this->xml->METHOD;
	}

	public function getFormat()
	{
		return (string) $this->xml->FORMAT;
	}

	public function getStatusCode()
	{
		return (string) $this->xml->STATUSCODE;
	}
	
	public function getResponse()
	{
		return (string) $this->xml->RESPONSE;
	} 
}