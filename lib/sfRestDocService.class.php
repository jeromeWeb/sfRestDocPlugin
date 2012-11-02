<?php

class sfRestDocService {

	var $xml;
	var $infos;
	var $params;
	var $samples;
	var $errors;
	
	/**
	 * Load Service Documentation from XML
	 * @throws Exception
	 */
	public function loadFromXml($xml_path) {
		//Try to validate all the XML with XSD
		$xml = new DOMDocument();

		$xml -> load($xml_path);

		libxml_use_internal_errors(true);
		if (!$xml -> schemaValidate(dirname(__FILE__) . "/xsd/service.xsd")) {

			$message = "";
			foreach (libxml_get_errors() as $error) {
				$message .= sprintf("Ligne %d, %s", $error -> line, $error -> message);
			}

			libxml_use_internal_errors(false);
			throw new Exception(sprintf("%s", $message));
		}

		$this -> xml = simplexml_load_file($xml_path);

		// hydrates infos
		if ($this -> xml -> INFOS) {
			foreach ($this->xml->INFOS->children() as $element) {
				$info = new sfRestDocInfo();
				$info -> loadFromXml($element);
				$this -> infos[] = $info;
			}
		}
		
		// hydrates params
		if ($this -> xml -> PARAMS) {
			foreach ($this->xml->PARAMS->children() as $element) {
				$param = new sfRestDocParam();
				$param -> loadFromXml($element);
				$this -> params[] = $param;
			}
		}

		// hydrates samples
		if ($this -> xml -> SAMPLES) {
			foreach ($this->xml->SAMPLES->children() as $element) {
				$sample = new sfRestDocSample();
				$sample -> loadFromXml($element);
				$this -> samples[] = $sample;
			}
		}

		// hydrates errors
		if ($this -> xml -> ERRORS) {
			foreach ($this->xml->ERRORS->children() as $element) {
				$error = new sfRestDocSample();
				$error -> loadFromXml($element);
				$this -> errors[] = $error;
			}
		}
	}

	public function getRessource() {
		return (string)$this -> xml -> RESSOURCE;
	}

	public function getTitle() {
		return (string)$this -> xml -> TITLE;
	}

	public function getMethod() {
		return (string)$this -> xml -> METHOD;
	}

	public function getRessourceSlug() {
		return sfRestDoc::slugify($this -> getRessource());
	}

	public function getSlug() {
		return sfRestDoc::slugify($this -> getTitle());
	}

	public function getUrl() {
		return (string)$this -> xml -> URL;
	}

	public function getResponseFormat() {
		return (string)$this -> xml -> RESPONSE_FORMAT;
	}

	public function getDescription() {
		return (string)$this -> xml -> DESCRIPTION;
	}

	public function getDocumentation() {
		return (string)$this -> xml -> DOCUMENTATION;
	}

	public function getSecurity() {
		return ((string)$this -> xml -> SECURITY == "true") ? true : false;
	}

	public function getAvailable() {
		return ((string)$this -> xml -> AVAILABLE == "true") ? true : false;
	}

	public function hasParameter() {
		return (is_array($this -> params)) ? true : false;
	}

	public function getParams() {
		return $this -> params;
	}

	public function hasSample() {
		return (is_array($this -> samples)) ? true : false;
	}

	public function getSamples() {
		return $this -> samples;
	}

	public function hasError() {
		return (is_array($this -> errors)) ? true : false;
	}

	public function getErrors() {
		return $this -> errors;
	}

	public function hasInfo() {
		return (is_array($this -> infos)) ? true : false;
	}

	public function getInfos() {
		return $this -> infos;
	}	
	/**
	 * Transform object to array
	 * Used by the routing to generate an url with a sfObjectRoute
	 * @return array
	 */
	public function toParams() {
		return array("ressourceSlug" => $this -> getRessourceSlug(), "slug" => $this -> getSlug(), );
	}

	static public function retrieve($params) {
		$paths = sfConfig::get("app_rest_doc_dir");

		foreach (self::array_values_recursive($paths) as $path) {
			if (!is_dir($path))
			{
				continue;
			}

			$dir = dir($path);

			while (false !== ($file = $dir -> read())) {

				if (!is_file($dir -> path . "/$file")) {
					continue;
				}

				try {

					$service = new sfRestDocService();
					$service -> loadFromXml($dir -> path . "/$file");
					if ($service -> getSlug() == $params['slug'] && $service -> getRessourceSlug() == $params['ressourceSlug']) {
						$dir -> close();
						return $service;
					}

				} catch(Exception $e) {
					sfContext::getInstance() -> getLogger() -> log("$file is not a valid REST Documentation file : " . $e -> getMessage(), sfLogger::ALERT);
				}
			}

			$dir -> close();
		}
	}

	static private function array_values_recursive($array){
		if (!is_array($array)) {
			return FALSE;
		}
		$result = array();
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				$result = array_merge($result, self::array_values_recursive($value));
			}
			else {
				$result[$key] = $value;
			}
		}
		return $result;
	}

}
