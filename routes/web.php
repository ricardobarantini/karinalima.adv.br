<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $whatsappLink = sprintf("https://wa.me/%s?text=%s", "5511965232865", urlencode("Olá. Vi seu site e preciso de um especialista."));
    return view('index')->with('whatsappLink', $whatsappLink);
});
