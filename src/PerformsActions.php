<?php

declare(strict_types=1);

namespace Activity;

trait PerformsActions
{
    public function performedActions()
    {
        return $this->hasMany(Action::class, 'performer_id');
    }
}