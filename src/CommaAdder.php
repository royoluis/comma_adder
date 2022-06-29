<?php

class CommaAdder {

    public $fileName;
    public $fileList;

    public function getList() {
        $fileList = [];
        if ($file = fopen($this->fileName, "r")) {
            while(!feof($file)) {
                $number = fgets($file);
                if (is_numeric(trim($number))) {
                    $fileList[] = $number;
                }
            }
            fclose($file);
        }
        return $fileList;
    }

    public function addcomma() {
        $fileList = $this->fileList;
        try {
            if (is_array($fileList) && isset($fileList)) {
                $commaList = str_replace(array("\r", "\n"), '', $this->fileList);
                asort($commaList);
                return join(",", $commaList);
            }
            if (!isset($fileList)) {
                throw new Exception('Error: There is no list. Please add one.');
            }
            throw new Exception('Error: Invalid list. Please use a correct array.');
        }
        catch (Exception $e) {
            print("\n" . $e->getMessage());
        }
    }
}
