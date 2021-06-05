<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function skip()
    {
        $params = [
            "name"    => "Донат на скип",
            "amount"  => $this->sum * 2,
            "message" => "Скипаю: " . $this->link . "\nОчередь: " . $this->queue . "\nСумма: " . $this->sum
        ];

        return "https://new.donatepay.ru/@76704?" . http_build_query($params);
    }
}
