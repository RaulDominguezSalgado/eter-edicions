<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $provider;

    /*
    App name
EterEdicions

Client ID
AdpJ9XpDGI1eRIdR7u1vaKtobLvqMwTA_27j_HlzNpG2K09rp2Eo9ffNBdHWSjkkslSo0mHdq4TGBo4d

Secret key 1
EEQ9bxAxTAYagouWW2MTQlnDjwIK4xTI_9AiROcF6tmol1pIAA_nUZfqp1RMp5IuTu7m-2Eai-2eegyi



    */
    public function initPayPalClient()
    {
        $this->provider = new PayPalClient();
    }

    public function asd(){
        $data =$this->convertCartItemToPaypalProduct();



        // Configura la cabecera de la solicitud con un ID único
        $this->provider->setRequestHeader('PayPal-Request-Id', 'create-product-' . time());

        // Crea el producto utilizando el cliente de PayPal y los datos proporcionados
        $product = $this->provider->createProduct($data);
    }

    function convertCartItemToPaypalProduct($item){
        return json_decode('{
            "name": "Video Streaming Service",
            "description": "Video streaming service",
            "type": "SERVICE",
            "category": "SOFTWARE",
            "image_url": "https://example.com/streaming.jpg",
            "home_url": "https://example.com/home"
        }', true);
    }
}
