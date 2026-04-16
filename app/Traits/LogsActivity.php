<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    protected static function bootLogsActivity()
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::$event(function ($model) use ($event) {
                $changes = $event === 'updated' ? [
                    'old' => array_intersect_key($model->getOriginal(), $model->getDirty()),
                    'new' => $model->getDirty()
                ] : ($event === 'created' ? $model->getAttributes() : null);

                ActivityLog::create([
                    'user_id' => Auth::id(),
                    'action' => $event,
                    'model_type' => get_class($model),
                    'model_id' => $model->id,
                    'changes' => json_encode($changes),
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);
            });
        }
    }
}
