<?php
namespace Cst\PPOB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class PPOBBase extends Connection
{
    protected $base_uri;
    protected $endpoint;
    protected $inquiry_endpoint = "inquiry";
    protected $payment_endpoint = "payment";
    protected $info_endpoint = "info";
    public $company_id;
    protected $nova;
    /**
     * get mitra info
     *
     * @param mixed $url
     * @return string
     */
    public function info($url = null){
        return  $this->get($this->infoEndpoint())->body();
    }
    /**
     * Get inquiry data
     */
    public function inquiry()
    {
    }
    /**
     * Pay pulsa inquiry data
     *
     */
    public function pay($ppob_product_code, $id_transaksi = null)
    {

    }

    /**
     * Get the value of endpoint
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Set the value of endpoint
     *
     * @return  self
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Get the value of inquiry_endpoint
     */
    public function getInquiry_endpoint()
    {
        return $this->inquiry_endpoint;
    }

    /**
     * Set the value of inquiry_endpoint
     *
     * @return  self
     */
    public function setInquiry_endpoint($inquiry_endpoint)
    {
        $this->inquiry_endpoint = $inquiry_endpoint;

        return $this;
    }

    /**
     * Get the value of payment_endpoint
     */
    public function getPayment_endpoint()
    {
        return $this->payment_endpoint;
    }

    /**
     * Set the value of payment_endpoint
     *
     * @return  self
     */
    public function setPayment_endpoint($payment_endpoint)
    {
        $this->payment_endpoint = $payment_endpoint;

        return $this;
    }

    /**
     * Get the value of info_endpoint
     */
    public function getInfo_endpoint()
    {
        return $this->info_endpoint;
    }

    /**
     * Set the value of info_endpoint
     *
     * @return  self
     */
    public function setInfo_endpoint($info_endpoint)
    {
        $this->info_endpoint = $info_endpoint;

        return $this;
    }
     /**
     * Get the Full Info Endpoint
     */
    public function infoEndpoint()
    {
        return $this->getEndpoint().$this->getInfo_endpoint();
    }
     /**
     * Get the Full Inquiry Endpoint
     */
    public function inquiryEndpoint()
    {
        return $this->getEndpoint().$this->getInquiry_endpoint();
    }
     /**
     * Get the Full Payment Endpoint
     */
    public function paymentEndpoint()
    {
        return $this->getEndpoint().$this->getPayment_endpoint();
    }
    public function formatPhone($phones){
        $phones=str_replace(['-',' ','/'],'',$phones);
        if(Str::is('+*', $phones)){
            $phones=str_replace('+','',$phones);
        }elseif (Str::is('08*', $phones)) {
            $phones = Str::replaceFirst('0','62', $phones);
        }
        if(strlen($phones)<10){
            throw new \Exception("Phone Number Invalid : {$phones}");
        }
        return $phones;
    }

}
