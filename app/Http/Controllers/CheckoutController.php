<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderFirstStepRequest;
use Exception;

class CheckoutController extends Controller
{
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public function index($step="personal_data") {
        // Previous actions
        return view("public.checkout", compact("step"));
    }

    public function changeStep(Request $request) {
        $step = $request->get("step");
        if ($request->get("prev") != null) {
            // Previous
            switch ($step) {
                case "personal_data":
                    return $this->index("personal_data");
                break;
                case "address":
                    return $this->index("personal_data");
                break;
                case "shippment":
                    return $this->index("address");
                break;
                case "payment":
                    return $this->index("completed");
                break;
            }
        }
        else {
            // Next
            switch ($step) {
                case "personal_data":
                    try {
                        // Vañidar Request
                        return $this->index("address");
                    }
                    catch (Exception $e) {
                        return back()->withError("");
                    }
                break;
                case "address":
                    try {
                        // Vañidar Request
                        return $this->index("shippment");
                    }
                    catch (Exception $e) {
                        return back()->withError("");
                    }
                break;
                case "shippment":
                    try {
                        // Vañidar Request
                        return $this->index("payment");
                    }
                    catch (Exception $e) {
                        return back()->withError("");
                    }
                break;
                case "payment":
                    try {
                        // Vañidar Request
                        return $this->index("completed");
                    }
                    catch (Exception $e) {
                        return back()->withError("");
                    }
                break;
            }
        }
    }
}