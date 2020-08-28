<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
/*
 * ---------------------------------------------------------------------------------------------------------------------------
 *  vCard library for Code Igniter applications extended from class_vcard from Troy Wolf [troy@troywolf.com]
 *  <carlos@online.com.bo> 
 * ---------------------------------------------------------------------------------------------------------------------------
 */
 
/**
* Codeigniter vCard  library
*/
class Vcard
{
    /**
     * vcard variables
     **/
    protected $ci;

    protected $log;
    protected $data;              //array of this vcard's contact data
    private $filename;             //filename for download file naming
    private $class;             //PUBLIC, PRIVATE, CONFIDENTIAL
    private $revision_date;     //vCard Date
    private $card;                //vCard String

    /**
     * __construct
     **/
    public function __construct()
    {
        $this->ci =& get_instance();
        //$ci->load->library('session');
        $this->ci->load->library('zip');
    }

    /**
     *The Vcards class constructor. You can set some defaults here if desired.
     *
     */    
  function Vcard($data = false) {
    $this->log = "New vcard() called<br />";

    $this->data = array(
      "display_name"=>null
      ,"first_name"=>null
      ,"last_name"=>null
      ,"company"=>null
     
      ,"cell_tel"=>null
      ,"email"=>null
      ,"email2"=>null
      ,"twitter"=>null  
      ,"instagram"=>null 
      ,"facebook"=>null
      ,"linkedin"=>null
      ,"messenger"=>null
      ,"zoom"=>null
      ,"skype"=>null
      ,"whatsapp"=>null      
      ,"url"=>null
      ,"photo"=>null
    
      );
    if(is_array($data))
    {
        foreach($data as $item => $value)
        {
            $this->data[$item] = $value;
        }
    }
    return true;
  }


    /**
     *The Reload method. This metod update the DATA array content.
     *
     */    
  function reload($data = false) {
    $this->log = "reload() called<br />";

    $this->data = array(
      "display_name"=>null
      ,"first_name"=>null
      ,"last_name"=>null      
      ,"company"=>null      
      ,"cell_tel"=>null
      ,"email1"=>null
      ,"twitter"=>null
      ,"instagram"=>null
      ,"facebook"=>null
      ,"linkedin"=>null
      ,"messenger"=>null
      ,"zoom"=>null
      ,"skype"=>null
      ,"whatsapp"=>null
      ,"url"=>null
       ,"photo"=>null   
      
      
      );
    if(is_array($data))
    {
        foreach($data as $item => $value)
        {
            $this->data[$item] = $value;
        }
    }
    $this->build();
    
    return $this->card;
  }
  
  
  
    /**
     * Build  method checks all the values, builds appropriate defaults for
     * missing values, generates the vcard data string
     *
     * @param 
     * @return VCF file
     */   
  function build() {
    $this->log .= "vcard build() called<br />";
    /*
    For many of the values, if they are not passed in, we set defaults or
    build them based on other values.
    */
    if (!$this->class) { $this->class = "PUBLIC"; }
    if (!$this->data['display_name']) {
      $this->data['display_name'] = trim($this->data['first_name']." ".$this->data['last_name']);
    }
   
    
      $this->card = "BEGIN:VCARD\r\n";
    $this->card .= "VERSION:3.0\r\n";
    $this->card .= "CLASS:".$this->class."\r\n";
   
   
      $this->card .= "FN:".$this->data['display_name']."\r\n";
      $this->card .= "N:"
      .$this->data['last_name'].";"
      .$this->data['first_name']."\r\n";
     
      if ($this->data['photo']) { $this->card .= "PHOTO;MEDIATYPE=image:".$this->data['photo']."\r\n"; }   
      if ($this->data['email']) { $this->card .= "EMAIL;TYPE=internet,pref:".$this->data['email']."\r\n"; }
    
      if ($this->data['twitter']) { $this->card .= "url;TYPE=internet:".$this->data['twitter']."\r\n"; }

      if ($this->data['instagram']) { $this->card .= "URL;TYPE=internet:".$this->data['instagram']."\r\n"; }
      if ($this->data['facebook']) { $this->card .= "URL;TYPE=internet:".$this->data['facebook']."\r\n"; }
    $this->card .= "END:VCARD\r\n";
  }

    /**
     * Download method streams the vcard to the browser client.
     *
     * @param 
     * @return VCF file
     */  
    function download() {
        echo $this->getvcard();
        return true;
    }

    /**
     * Zipdownload method. Streams the vcard zipped to the browser client.
     *
     * @param 
     * @return VCF file ZIPPED
     */  
    function zipdownload() {
        
        $this->log .= "vcard download() called<br />";
        if (!$this->card) { $this->build(); }
        if (!$this->filename) { $this->filename = trim($this->data['display_name']); }
        $this->filename = str_replace(" ", "_", $this->filename);
        $datavcard = $this->getvcard();

        $name = $this->filename.".vcf";
       $this->download($name, NULL);
        
        return true;
    }
    /**
     * Get Vcard for Download.
     *
     * @param 
     * @return VCF file
     */  
    function getvcard() {
        $this->log .= "vcard download() called<br />";
        if (!$this->card) { $this->build(); }
        if (!$this->filename) { $this->filename = trim($this->data['display_name']); }
        $this->filename = str_replace(" ", "_", $this->filename);
        header("Content-type: text/directory");
        header("Content-Disposition: attachment; filename=".$this->filename.".vcf");
        header("Pragma: public");
        return $this->card;
        //return true;
    }
    /**
     * Get Vcard for Download.
     *
     * @param 
     * @return VCF file
     */  
    function returnvcard() {
        $this->log .= "vcard download() called<br />";
        if (!$this->card) { $this->build(); }
        if (!$this->filename) { $this->filename = trim($this->data['display_name']); }
        $this->filename = str_replace(" ", "_", $this->filename);
        return $this->card;
        //return true;
    }

    /**
     * Zip Download method. Streams the vcard ARRAY zipped to the browser client.
     *
     * @param 
     * @return VCF file ZIPPED
     */  
    function zipdownloads($filename = false, $vcards = false) {
        
        
        foreach($vcards as $item => $value)
        {
            foreach($value as $key => $val)
            {
                $this->ci->zip->add_data($key, $val);
            }
        }
        // Write the zip file to a folder on your server.
        $this->ci->zip->archive('./vcards/'.$filename.'.zip');
        // Download the file to your desktop.
        $this->ci->zip->download($filename.'.zip');
        return true;
    }        
    
}
?>