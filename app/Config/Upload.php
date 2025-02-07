<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Upload extends BaseConfig
{
    public $validFields          = true;
    public $useFilename          = true;
    public $overwrite            = false;
    public $maxSize              = 300;
    public $maxWidth             = 0;
    public $maxHeight            = 0;
    public $minWidth             = 0;
    public $minHeight            = 0;
    public $maxFilename          = 0;
    public $encryptName          = false;
    public $fileExtAllow         = '';
    public $fileTypes            = '';
    public $fileMimeType        = '';
}
