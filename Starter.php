<?php

namespace modules\starter;                          //Make sure namespace is same structure with parent directory

use \classes\Auth as Auth;                          //For authentication internal user
use \classes\CustomHandlers as CustomHandlers;      //To get default response message
use PDO;                                            //To connect with database

	/**
     * Starter class
     *
     * @package    modules/starter
     * @author     M ABD AZIZ ALFIAN <github.com/aalfiann>
     * @copyright  Copyright (c) 2018 M ABD AZIZ ALFIAN
     * @license    https://github.com/aalfiann/reSlim-modules-starter/blob/master/LICENSE.md  MIT License
     */
    class Starter {

        // database var
        protected $db;

        //base var
        protected $basepath,$baseurl,$basemod;

        //master var
		var $username,$token;
        
        //construct database object
        function __construct($db=null) {
			if (!empty($db)) $this->db = $db;
            $this->baseurl = (($this->isHttps())?'https://':'http://').$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $this->basepath = $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
			$this->basemod = dirname(__FILE__);
        }

        //Detect scheme host
        function isHttps() {
            $whitelist = array(
                '127.0.0.1',
                '::1'
            );
            
            if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
                if (!empty($_SERVER['HTTP_CF_VISITOR'])){
                    return isset($_SERVER['HTTPS']) ||
                    ($visitor = json_decode($_SERVER['HTTP_CF_VISITOR'])) &&
                    $visitor->scheme == 'https';
                } else {
                    return isset($_SERVER['HTTPS']);
                }
            } else {
                return 0;
            }            
        }

        //Get modules information
        public function viewInfo(){
            return file_get_contents($this->basemod.'/package.json');
        }


        // Create your app function below here
        /*
        public function test(){
            write your code here...
        }*/
    }