<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetworkExport extends Model
{
    public $timestamps=false;
    protected $fillable = [
        'host-name', 'system-ip', 'device-model', 'uuid', 'state', 'reachability', 'site-id', 'controlConnections', 'version', 'uptime-date',
        ];
    protected $table = 'network';
}
