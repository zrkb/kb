<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KBQuestion extends Model
{
    protected $table = 'kb_questions';

    protected $guarded = ['id'];

    public function topic()
    {
        return $this->belongsTo(KBTopic::class, 'kb_topic_id');
    }
}
