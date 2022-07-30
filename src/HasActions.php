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
            $action->performer = 'user';
            $action->performer_id = $model->user_id;
            $action->subject = $model->table;
            $action->subject_id = $model->id;
            $action->save();
        });

        static::updating(function ($model) {
            $action = new Action();
            $action->type = 'update';
            $action->performer = 'Test 1';
            $action->performer_id = $model->user_id;
            $action->subject = $model->table;
            $action->subject_id = $model->id;
            $action->save();
        });

        static::deleting(function ($model) {
            $action = new Action();
            $action->type = 'delete';
            $action->performer = 'Test 1';
            $action->performer_id = $model->user_id;
            $action->subject = $model->table;
            $action->subject_id = $model->id;
            $action->save();
        });
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'subject_id');
    }
}