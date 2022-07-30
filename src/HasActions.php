<?php

declare(strict_types=1);

namespace Activity;

trait HasActions
{
    public static function bootHasActions()
    {
        static::creating(function ($model) {
            $action = new Action();
            $action->type = 'create';
            $action->performer = get_class(Auth()->user());
            $action->performer_id = Auth()->user()->id;
            $action->subject = get_class($model);
            $action->subject_id = $model->id;
            $action->save();
        });

        static::updating(function ($model) {
            $action = new Action();
            $action->type = 'update';
            $action->performer = get_class(Auth()->user());
            $action->performer_id = Auth()->user()->id;
            $action->subject = get_class($model);
            $action->subject_id = $model->id;
            $action->save();
        });

        static::deleting(function ($model) {
            $action = new Action();
            $action->type = 'delete';
            $action->performer = get_class(Auth()->user());
            $action->performer_id = Auth()->user()->id;
            $action->subject = get_class($model);
            $action->subject_id = $model->id;
            $action->save();
        });
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'subject_id');
    }
}