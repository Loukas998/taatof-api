<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

   protected $guarded = [];

   /**
    * Get all participants assigned to this employee
    */
   public function participants(): HasMany 
   {
       return $this->hasMany(User::class, 'auditor_id');
   }

   /**
    * Get the employee that this participant belongs to
    */
   public function employee(): BelongsTo
   {
       return $this->belongsTo(User::class, 'auditor_id');
   }

   public function stories(): HasMany
   {
       return $this->hasMany(Story::class, 'user_id');
   }
   
   /**
    * Check if user is an admin
    */
   public function isAdmin(): bool
   {
       return $this->role === 'admin';
   }
   
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
