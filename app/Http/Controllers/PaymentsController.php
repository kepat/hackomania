<?php

namespace App\Http\Controllers;


class PaymentsController extends Controller
{
    /**
     * Navigation highlight.
     *
     * @access protected
     * @type   string
     */
    protected $navigation = "Payment";

    public function once()
    {
        // Prepare the data to be passed in the view
        $data = [
            'navigation' => $this->navigation
        ];

        return view('payments.once', $data);
    }

    public function monthly()
    {
        // Prepare the data to be passed in the view
        $data = [
            'navigation' => $this->navigation
        ];

        return view('payments.monthly', $data);
    }
}
