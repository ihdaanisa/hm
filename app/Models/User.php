<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',                
        'profile_picture',     
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Method to check if the user has a specific role
    public function isRole($role)
    {
        return $this->role === $role;
    }

    // Accessor to get the full URL for the profile picture
    public function getProfilePictureUrlAttribute()
    {
        return $this->profile_picture 
            ? asset('storage/' . $this->profile_picture) 
            : asset('images/default-profile.png'); // Default image if no profile picture
    }

    // Mutator to handle file upload for profile picture
    public function setProfilePictureAttribute($value)
    {
        // Check if $value is a file before storing
        if (is_file($value)) {
            // Delete the old profile picture if it exists
            if ($this->profile_picture) {
                Storage::delete('public/' . $this->profile_picture);
            }
            // Store the new profile picture and save its path
            $this->attributes['profile_picture'] = $value->store('profile_pictures', 'public');
        } else {
            $this->attributes['profile_picture'] = $value; // Save value directly if it's not a file
        }
    }
}
