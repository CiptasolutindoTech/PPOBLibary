<?php

namespace Cst\PPOB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class Connection
{
    public $company_id;
    public $sandbox;
    protected function url()
    {
        if (empty(env('PPOB_API_URI'))) {
            throw new \Exception('PPOB URI Required');
        }
        return env('PPOB_API_URI');
    }
    protected function appToken()
    {
        if (empty(config('app.ppob_api_key', env('PPOB_API_KEY')))) {
            throw new \Exception('PPOB Api key required');
        }
        return config('app.ppob_api_key', env('PPOB_API_KEY'));
    }
    protected function secretKey()
    {
        if (empty(config('app.ppob_secret_key', env('PPOB_SECRET_KEY')))) {
            throw new \Exception('PPOB secret key required');
        }
        return config('app.ppob_secret_key', env('PPOB_SECRET_KEY'));
    }
    protected function APIKey()
    {
        return $this->appToken();
    }
    protected function connect()
    {
        $headers = ['apikey' => $this->appToken(),'secretkey:'.$this->secretKey(),'Content-Type' => 'application/json'];
        if ($this->sandbox) {
            $headers['sandbox'] = $this->sandbox;
        }
        return HTTP::withHeaders($headers)->baseUrl($this->url());
    }
    protected function post($url,$content)
    {
        return $this->connect()->post($url,$content);
    }
    protected function get($url)
    {
        return $this->connect()->get($url);
    }
    public function sandbox() {
        $this->sandbox = true;
        return $this;
    }
}
