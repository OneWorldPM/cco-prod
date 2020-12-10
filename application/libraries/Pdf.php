<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf_min/tcpdf.php';
class Pdf extends TCPDF
{ function __construct() { parent::__construct(); }
}
