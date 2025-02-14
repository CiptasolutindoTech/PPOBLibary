<?php
namespace Cst\PPOBLib;

use Cst\PPOBLib\PPOBBase;
use Illuminate\Support\Str;

class Pulsa extends PPOBBase
{

    function __construct($phone, $company_id)
    {
        $this->nova = $this->formatPhone($phone);
        $this->company_id = $company_id;
    }
    /**
     * Get pulsa inquiry data
     *
     * @return  \Illuminate\Http\Client\Response
     */
    public function inquiry()
    {
        if(empty($this->phone)){
            throw new \Exception('Phone number required');
        }
        return $this->post($this->inquiryEndpoint(), [['nova' => $this->nova, 'ppob_company_id' => $this->company_id]]);
    }
    /**
     * Pay pulsa inquiry data
     *
     * @return  \Illuminate\Http\Client\Response
     */
    public function pay($ppob_product_code, $id_transaksi = null)
    {
        if (is_null($id_transaksi)) {
            $id_transaksi = Str::uuid()->toString();
        }
        if(empty($this->phone)){
            throw new \Exception('Phone number required');
        }
        return $this->post($this->paymentEndpoint() . '/payment', [
            ['product_id' => $ppob_product_code,
            'id_transaksi' => $id_transaksi,
            'nova' => $this->nova,
            'ppob_company_id' => $this->company_id]]);
    }
}
