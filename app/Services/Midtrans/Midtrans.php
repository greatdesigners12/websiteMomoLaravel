<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Config;
 
class Midtrans {
    protected $serverKey;
    protected $isproduction;
    protected $isSanitized;
    protected $is3ds;
 
    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->isproduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');
 
        $this->_configureMidtrans();
    }
 
    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isproduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;
    }

    
}