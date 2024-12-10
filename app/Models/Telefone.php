<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SolTrocaRamalNotifications;

class Telefone extends Model
{
    use HasFactory, Notifiable;
    protected $table='telefones';
    protected $fillable= ['ramaln','responsa','divisas_id','secao','enderecos_id'];
    
    public function enviaEditRamal($token){
        //dd('Chegamos até aqui');
        $this->notify(new SolTrocaRamalNotification);
    }
}


