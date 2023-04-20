<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ["file_path", "user_id"];

    public function getFilePathAttribute (): ?string {
        return $this->attributes["file_path"] ? asset($this->attributes["file_path"]): null;
    }
}
