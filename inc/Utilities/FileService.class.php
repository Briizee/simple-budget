<?php

class FileService {
    private static string $fileContents = "";

    public static function readfile(string $fileName) {

        try {
            //get filehandle
            $fh = fopen($fileName, 'r');
            //if can't open throw exception
            if (!$fh) {
                
                throw new Exception("Could not open file: $fileName");
            }
            //read file contents into class variable
            self::$fileContents = fread($fh, filesize($fileName));
            //close filehandle
            fclose($fh);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function writeFileContents(string $fileName) {

        try {
            //get filehandle
            $fh = fopen($fileName, 'a');

            if(!$fh) {
                throw new Exception("There was an issue making $fileName");
            }
            fwrite($fh,self::$fileContents);

            fclose($fh);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getFileContents() {
        return self::$fileContents;
    }

    public static function appendItem(array $newLine) {
        //remove the submit
        array_pop($newLine);
        //append newline to end of csv
        $line = "\n";
        //add our data
        $line .= implode(",", $newLine);
        self::$fileContents .= $line;
    }
}

?>