<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Override find to return static admin user when ID is 1.
     * This prevents database queries for the static admin user.
     */
    public static function find($id)
    {
        // If looking for ID 1 (our static admin), return static user without database query
        if ($id == 1) {
            $user = new static();
            $user->id = 1;
            $user->name = 'Admin';
            $user->email = 'admin@admin.com';
            $user->email_verified_at = now();
            $user->password = '';
            $user->exists = true;
            $user->syncOriginal();
            return $user;
        }
        
        // For other IDs, try parent (but will fail without database - that's expected)
        try {
            return parent::find($id);
        } catch (\Exception $e) {
            // If database is not available, return null for non-admin users
            return null;
        }
    }

    /**
     * Override to prevent database refresh when user is loaded from session.
     */
    public function refresh()
    {
        // If this is a static user, don't try to refresh from database
        if ($this->exists && $this->id === 1 && $this->email === 'admin@admin.com') {
            return $this;
        }
        
        try {
            return parent::refresh();
        } catch (\Exception $e) {
            // If database is not available, return self for static user
            return $this;
        }
    }
}
