<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = [];

    const RULES = [
        'title'     => ['required', 'string', 'max:255'],
        'body'      => ['required', 'string', 'max:65535'],
        'image'     => ['nullable', 'mimes:jpg,jpeg,png', 'max:500'],
        'caption'   => ['required', 'string', 'max:255'],
        'posted_at' => ['nullable', 'date'],
    ];
}
