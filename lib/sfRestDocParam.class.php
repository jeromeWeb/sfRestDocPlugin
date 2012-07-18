<?php 

class sfRestDocParam
{
	var $xml;
	
	public function loadFromXml(SimpleXMLElement $xml)
	{
		$this->xml = $xml;
	}
	
	public function getName()
	{
		return (string) $this->xml->NAME;
	}

	public function getDescription()
	{
		return (string) $this->xml->DESCRIPTION;
	}

	public function getDefault()
	{
		return (string) $this->xml->DEFAULT;
	}

	public function getSample()
	{
		return (string) $this->xml->SAMPLE;
	}
	
	public function getRequired()
	{
        return ((string) $this->xml->REQUIRED == "true")?true:false;
	} 
}