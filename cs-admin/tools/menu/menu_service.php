<?php



require_once("lib/JSON.php");



class MenuService {



    var $sections;

    var $dataFile;



    function init() {

        $this->sections = array("cafe", "deli", "wine_bar");
		
        $this->dataFile = realpath( dirname( __FILE__ ) ) . "/../../../cs-content/sites/lowells/data/menu.xml";
		
		//echo $this->dataFile;
		
    }



    function saveAndPublish($menu) {

        $newMenuXml = "";

        foreach ($menu as $section) {

            if (isset($section['name'])) {

                $sectionName = $section['name'];

                $newMenuXml .= "<$sectionName>\n";

                foreach ($section['items'] as $item) {

                    if (isset($item['label']) && isset($item['text'])) {

                        $newMenuXml .= "    <menu>\n";

                        $newMenuXml .= "        <label><![CDATA[" . $this->newlineToBr($item['label']) . "]]></label>\n";

                        $newMenuXml .= "        <text><![CDATA[" . $this->newlineToBr($item['text']) . "]]></text>\n";

                        $newMenuXml .= "    </menu>\n";

                    }

                }

                $newMenuXml .= "</$sectionName>\n";

            }

        }



        $oldXml = $this->readFileIntoString($this->dataFile);

        $startPos = strpos($oldXml, "<cafe>");

        $endPos   = strpos($oldXml, "</wine_bar>", $startPos);



        $xml = substr($oldXml, 0, $startPos);

        $xml .= $newMenuXml;

        $xml .= substr($oldXml, $endPos+11);



        $this->writeStringToFile($this->dataFile, $xml);

    }



    function loadMenu() {

        $xmlArr = $this->parseXML($this->dataFile);


        $menuData = array();



        $items = array();

        $item = array();

        foreach ($xmlArr as $xmlEvent) {
			
			
			
            if (in_array($xmlEvent['tag'], $this->sections)) {
				
				
				
                if ($xmlEvent['type'] == "open")

                    $items = array();

                else if ($xmlEvent['type'] == "close")

                    $menuData[] = array("name"=>$xmlEvent['tag'], "items"=>$items);

            }

            else if ($xmlEvent['tag'] == "menu") {

                if ($xmlEvent['type'] == "open")

                    $item = array();

                else if ($xmlEvent['type'] == "close")

                    $items[] = $item;

            }

            else if ($xmlEvent['tag'] == "label" && $xmlEvent['type'] == "complete") {

                $item['label'] = $this->brToNewline($xmlEvent['value']);

            }

            else if ($xmlEvent['tag'] == "text" && $xmlEvent['type'] == "complete") {

                $item['text'] = $this->brToNewline($xmlEvent['value']);

            }

        }
		


        return $menuData;

    }



    function readFileIntoString($filename) {

        $str = "";

        $in = fopen($filename, "r");

        if (!$in) {

            die("Unable to open: $filename");

        }

        while (!feof($in)) {

            $str .= fread($in, 8192);

        }

        fclose($in);

        return $str;

    }



    function writeStringToFile($filename, $str) {

        $fp = fopen($filename, "w");

        if (!$fp) {

            die("Unable to write to: $filename");

        }

        fputs($fp, $str);

        fclose($fp);

    }



    //////////////////////////////////////////////



    function parseXML($filename) {

        $contents = "";

        if (!($fp = @fopen($filename, 'r'))) {

            return array();

        }

        while (!feof($fp)) {

            $contents .= fread($fp, 8192);

        }

        fclose($fp);



        $parser = xml_parser_create('');

        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);

        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 0);

        xml_parse_into_struct($parser, $contents, $xml_values);

        xml_parser_free($parser);



        return $xml_values;

    }



    function brToNewline($str) {

        if (PHP_VERSION < 5) {

            $str = str_replace("\r", "\r\n", $str);

        }

        $str = str_replace("<br>", "\n", $str);

        return $str;

    }



    function newlineToBr($str) {

        $str = str_replace("\n", "<br>", $str);

        return $str;

    }

    

}



///////////////////////////////////////////////



header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

header("Cache-Control: no-store, no-cache, must-revalidate");

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");



header("Content-Type: text/plain");



$function = $_GET['function'];

$service = new MenuService();

$service->init();

if ($function == "load") {

    echo json_encode2($service->loadMenu());

}

else if ($function == "publish") {

	

    $json = $service->readFileIntoString("php://input");

    $menu = json_decode2($json, true);



    $service->saveAndPublish($menu);



    echo "OK\n";

}



?>