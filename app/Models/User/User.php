<?php

namespace App\Models\User;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

   protected $guarded = [];

   /**
    * Get all participants assigned to this employee
    */
   public function participants(): HasMany 
   {
       return $this->hasMany(User::class, 'employee_id');
   }

   /**
    * Get the employee that this participant belongs to
    */
   public function employee(): BelongsTo
   {
       return $this->belongsTo(User::class, 'employee_id');
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
   
   /**
    * Check if user is an employee
    */
   public function isEmployee(): bool
   {
       return $this->role === 'employee';
   }
   
   /**
    * Check if user is a participant
    */
   public function isParticipant(): bool
   {
       return $this->role === 'participant';
   }
}
