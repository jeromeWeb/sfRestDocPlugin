<?php

class sfRestDoc {

    public function getRessources() {
        $paths = sfConfig::get("app_rest_doc_dir");
var_dump($paths);
        $ressource = array();
        
        foreach ($paths as $path) {
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
                    $ressource[$service -> getRessource()][] = $service;

                } catch(Exception $e) {
                    sfContext::getInstance() -> getLogger() -> log("$file is not a valid REST Documentation file : " . $e -> getMessage(), sfLogger::ALERT);
                }
            }
    
            $dir -> close();
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
