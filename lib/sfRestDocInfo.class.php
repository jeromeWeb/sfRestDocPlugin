<?php 

class sfRestDocInfo
{
	var $xml;
	
	public function loadFromXml(SimpleXMLElement $xml)
	{
		$this->xml = $xml;
	}
	
	public function getTitle()
	{
		return (string) $this->xml->TITLE;
	}

	public function getArticle()
	{
		return (string) $this->xml->ARTICLE;
	}
}