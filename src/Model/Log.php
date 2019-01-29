<?php

namespace Amirhb\LaravelMongodbLog\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Log extends Model
{
    /*
    mongodb connection that Log uses.
    @var string 
    */ 
    protected $connection;

    /*
    collection name Log uses.
    @var string 
    */ 
    protected $collection;

    /*
    Prevents saving typical eloquent timestamps.
    @var bool 
    */ 
    public $timestamps = false;

    /*
    The attributes that are mass assignable.
    @var array 
    */ 
    protected $fillable = [ 'user', 'env', 'message', 'level', 'context', 'extra', 'time' ];

    /*
    The attributes that should be cast to native types.
    @var array 
    */ 
    protected $casts = [ 'context' => 'array', 'extra' => 'array' ];
    
    public function __construct(array $attributes = [])
    {
        $this->connection = config('mongodb-log.connection');
        $this->collection = config('mongodb-log.collection');
        parent::__construct($attributes);
    }
}
