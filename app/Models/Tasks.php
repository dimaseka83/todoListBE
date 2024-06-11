<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'completed', 'user_id', 'is_priority'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

?>