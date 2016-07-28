<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Validation\Factory;

class MailController extends Controller
{

    private $request;
    private $validator;

    public function __construct(Request $request, Factory $validator)
    {
        $this->request = $request;
        $this->validator = $validator;
    }

    /*
     * ENVIO DE E-MAIL DE CONTATO DO SITE.
     */
    public function mailContato(){
        $dadosForm = $this->request->all();

        $rules = [
            'nome' => 'required|min:6',
            'email' => 'required|email',
            'mensagem' => 'required|min:10'
        ];

        $validator = $this->validator->make($dadosForm, $rules);

        if($validator->fails()){
          $messages = $validator->messages();

            $displayErrors = '';

            foreach ($messages->all("<p><strong>:message</strong></p>") as $error){
                $displayErrors .= $error;
            }

            return $displayErrors;
        };

        Mail::send('site.emails.contato', $dadosForm, function ($m){
            $m->to('wendelprogrammer@gmail.com')
                ->subject('Mensagem de teste do site.');
        });

        return 1;
    }
}
