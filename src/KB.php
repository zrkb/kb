<?php

namespace Zero\KB;

class KB
{
    public function topics($kbTopicModelClass = \App\Models\KBTopic::class)
    {
        return $kbTopicModelClass::with('questions')->get();
    }
}
