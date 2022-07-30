<?php

declare(strict_types=1);

namespace Activity;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public $fillable = [
        'type',
        'performer',
        'performer_id',
        'subject',
        'subject_id',
    ];

    /**
     * Get the action description based on the type.
     * 
     * @return string
     */
    public function getDescription(): string
    {
        return 'The model was ' . $this->type . 'd';
    }
}
