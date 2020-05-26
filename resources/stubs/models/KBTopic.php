<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KBTopic extends Model
{
    protected $table = 'kb_topics';

    protected $guarded = ['id'];

    public function questions()
    {
        return $this->hasMany(KBTopic::class);
    }
}
