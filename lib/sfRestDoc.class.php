<?php

class sfRestDoc {
	
    public function getRessources() {
        $path = sfConfig::get("app_rest_doc_dir");
        
        $dir = dir($path);
        $ressource = array();
        
        while (false !== ($file = $dir -> read())) {

            if (!is_file($dir -> path . "/$file")) {
                continue;
            }

            try {
                
                $service = new sfRestDocService();
                $service->loadFromXml($dir -> path . "/$file");
                $ressource[$service->getRessource()][] = $service;

            } catch(Exception $e) {
                sfContext::getInstance()->getLogger() -> log("$file is not a valid REST Documentation file : ".$e->getMessage(), sfLogger::ALERT);
            }
        }
        
        ksort($ressource);

        $dir -> close();
        
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
