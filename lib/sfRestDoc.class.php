<?php

class sfRestDoc {

    public static function getRessources($section = null) {

    	$paths = sfConfig::get("app_rest_doc_dir");
    	if ($section !== null)
    	{
    		if (!array_key_exists($section, $paths))
    		{
    			throw new Exception("Section $scetion doesn't exists.");
    		}
    		
    		$paths = $paths[$section];
    	}
    	
    	$ressource = array();
        
        foreach ($paths as $path) {
        	
            if (is_array($path) || !is_dir($path))
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
                    $ressource[$service -> getRessource()][$service->getUrl().$service->getMethod()] = $service;

                } catch(Exception $e) {
                    sfContext::getInstance() -> getLogger() -> log("$file is not a valid REST Documentation file : " . $e -> getMessage(), sfLogger::ALERT);
                }
            }
    
            $dir -> close();
        }

        foreach ($ressource as $key=>$value)
        {
        	ksort($ressource[$key]);
        }
        
        ksort($ressource);

        return $ressource;
    }

    static public function slugify($text) {
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        if (function_exists('iconv')) {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

}
