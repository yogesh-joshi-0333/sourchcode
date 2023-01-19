<?php

namespace App\Models;

use App\Events\UserCreated;
use App\Events\UserDeleting;
use App\Events\UserUpdated;
use App\Models\Activity;
use App\Models\BookingActivity;
use App\Models\Favourite;
use App\Models\Follow;
use App\Models\TeamMember;
use App\Models\UserActivity;
use App\Models\UserDeviceToken;
use App\Models\UserGallery;
use App\Models\UserMembership;
use App\Models\UserRating;
use App\Scopes\UserScope;
use DBTableNames;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordInterface, MustVerifyEmail
{
    use HasApiTokens;
    use Authenticatable;
    use Authorizable;
    use CanResetPasswordTrait;
    use Notifiable;
    use SoftDeletes;
    use \Illuminate\Auth\MustVerifyEmail;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = DBTableNames::USERS;

    protected $dispatchesEvents = [
        // 'deleting' => UserDeleting::class,
        'updated' => UserUpdated::class,
        'created' => UserCreated::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'first_name',
        'last_name',
        'profile_pic',
        'email',
        'country_code',
        'phone_number',
        'about',
        'date_of_birth',
        'gender',
        'membership',
        'status',
        'qr_code',
        'refer_code',
        'referral_code_dynamic_link',
        'club_cash',
        'is_guest',
        'is_staff',
        'mobile_verification_code',
        'is_verify',
        'created_by',
        'profile_visibility',
        'date_of_birth_visibility',
        'phone_number_visibility',
        'accepting_invites_visibility',
        'is_profile_completed',
    ];

    protected $appends = ['profile_pic_url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new UserScope);
    }

    public function userDeviceTokens()
    {
        return $this->hasMany(UserDeviceToken::class, 'user_id', 'id');
    }

    public function member()
    {
        return $this->hasMany(UserGroupMember::class, 'user_id', 'id');
    }

    public function players()
    {
        return $this->hasMany(GamePlayer::class, 'user_id', 'id');
    }

    public function reports()
    {
        return $this->hasMany(PostReport::class, 'user_id', 'id');
    }

    public function userTransaction()
    {
        return $this->hasMany(UserTransaction::class, 'user_id', 'id');
    }

    public function userTransactionToUser()
    {
        return $this->hasMany(UserTransaction::class, 'to_user_id', 'id');
    }

    public function referredBy()
    {
        return $this->hasMany(UserReferral::class, 'referred_by', 'id');
    }

    public function referredTo()
    {
        return $this->hasMany(UserReferral::class, 'referred_to', 'id');
    }

    public function userPromocode()
    {
        return $this->hasMany(UserPromocode::class, 'user_id', 'id');
    }

    public function userMembershipOwner()
    {
        return $this->hasMany(UserMembership::class, 'owner_id', 'id');
    }

    public function userMemberships()
    {
        return $this->hasMany(UserMembership::class, 'user_id', 'id');
    }

    public function bookingsTroughUserMembership()
    {
        return $this->hasManyThrough(Booking::class, UserMembership::class, 'user_id', 'user_membership_id');
    }

    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'user_membership');
    }

    public function membershipsByType($type)
    {
        return $this->belongsToMany(Membership::class, 'user_membership')->whereHas('activities', function ($query) use ($type) {
            $query->where('name', $type)
                ->where('activities.status', 'active')
                ->where('user_membership.status', 'running');
        })->get();
    }

    /**
     * User group.
     */
    public function userGroup()
    {
        return $this->hasMany(UserGroup::class, 'user_id', 'id');
    }

    /**
     * User to_user_id.
     */
    public function toUserBlock()
    {
        return $this->hasMany(UserBlockContacts::class, 'to_user_id', 'id');
    }

    /**
     * User from_user_id.
     */
    public function fromUserBlock()
    {
        return $this->hasMany(UserBlockContacts::class, 'from_user_id', 'id');
    }

    /**
     * User followers.
     */
    public function allFollowers()
    {
        return $this->hasMany(Follow::class, 'to_user_id', 'id');
    }

    /**
     * User following.
     */
    public function allFollowing()
    {
        return $this->hasMany(Follow::class, 'from_user_id', 'id');
    }

    /**
     * User contactUs.
     */
    public function userContactUs()
    {
        return $this->hasMany(contactUs::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    /**
     * User to favourites.
     */
    public function tofavourite()
    {
        return $this->hasMany(Favourite::class, 'to_user_id', 'id');
    }

    /**
     * User contactUs.
     */
    public function notification()
    {
        return $this->hasMany(Notification::class, 'notifiable_id', 'id');
    }

    public function setRememberToken($value)
    {
        return parent::setRememberToken($value);
    }

    public function routeNotificationForFcm()
    {
        $device = $this->device_token()->latest()->first();
        if (! $device->device_token) {
            return null;
        }

        return $device->device_token;
    }

    public function getProfilePicUrlAttribute($value)
    {
        if (! $this->gender) {
            if (! $this->profile_pic) {
                return getProfilePic('Male/1.png', config('constants.module.profile'));
            }
        }

        if (! $this->profile_pic) {
            $gender = [
                'female' => 5,
                'male' => 14,
                'other' => 2,
                'prefer_not_to_say' => 2,
            ];
            $imageId = (int) $this->id % (int) $gender[strtolower($this->gender)];
            $imageId = $imageId == 0 ? $gender[strtolower($this->gender)] : $imageId;

            return getProfilePic(ucfirst($this->gender).'/'.$imageId.'.png', config('constants.module.profile'));
        }

        return getProfilePic($this->profile_pic, config('constants.module.profile'));
    }

    /**
     * Device data.
     */
    public function device_token()
    {
        return $this->hasMany(UserDeviceToken::class, 'user_id', 'id');
    }

    /**
     * User gallery data.
     */
    public function gallery()
    {
        return $this->hasMany(UserGallery::class, 'user_id', 'id');
    }

    /**
     * User followers.
     */
    public function followers()
    {
        return $this->hasMany(Follow::class, 'to_user_id', 'id')->where('status', 'accepted');
    }

    /**
     * User following.
     */
    public function following()
    {
        return $this->hasMany(Follow::class, 'from_user_id', 'id')->where('status', 'accepted');
    }

    public function isFollowRequest()
    {
        return $this->hasMany(Follow::class, 'from_user_id', 'id')->where('status', Follow::FOLLOW_INVITED);
    }

    /**
     * User rating review.
     */
    public function rating_review()
    {
        return $this->hasMany(UserRating::class, 'to_user_id', 'id');
    }

    /**
     * User rating review.
     */
    public function fromRating_review()
    {
        return $this->hasMany(UserRating::class, 'from_user_id', 'id');
    }

    /**
     * User rating review.
     */
    public function activity()
    {
        return $this->hasMany(UserActivity::class, 'user_id', 'id');
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'users_activities');
    }

    public function activitiesWithSkill($skillId)
    {
        return $this->belongsToMany(Activity::class, 'users_activities')->withPivot('skill_id', $skillId);
    }

    /**
     * User favourites.
     */
    public function favourite()
    {
        return $this->hasMany(Favourite::class, 'from_user_id', 'id');
    }

    public function getNameAttribute()
    {
        $name = $this->first_name.' '.$this->last_name;
        if (empty(trim($name))) {
            return $this->phone_number;
        }

        return $name;
    }

    /**
     * [getActiveBookingBalance description]
     * @param  [type] $activityId [description]
     * @return [type]             [description]
     */
    public function getActiveBookingBalance($activityId): int
    {
        $maxActiveBooking = (int) Activity::where('id', $activityId)
            ->value('max_active_booking_per_person');
        $upcoming = (int) BookingActivity::whereHas('parentBooking', function ($query) use ($activityId) {
            $query->where('user_id', $this->id)
                ->where('activity_id', $activityId);
        })
            ->whereNull('cancelled_by')
            ->where('status', BookingActivity::UPCOMING)
            ->count();

        return $maxActiveBooking - $upcoming;
    }

    public function invitationsAsInviter()
    {
        return $this->hasMany(BookingInvitation::class, 'from_user_id');
    }

    public function invitationsAsInvitee()
    {
        return $this->hasMany(BookingInvitation::class, 'to_user_id');
    }

    public function bookingUser()
    {
        return $this->hasMany(BookingUser::class, 'user_id');
    }

    public function bookedBy()
    {
        return $this->hasMany(Booking::class, 'booked_by');
    }

    public function teamMember()
    {
        return $this->hasMany(TeamMember::class, 'user_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function bookingActivities()
    {
        return $this->hasManyThrough(BookingActivity::class, Booking::class);
    }

    public function skill()
    {
        return $this->hasMany(UserActivity::class)->with('skill');
    }

    public function skills()
    {
        $this->belongsToMany(Skill::class, 'users_activities');
    }

    public function active_member()
    {
        return $this->hasMany(UserMembership::class)->orderBy('amount', 'ASC')->orderBy('start_date', 'ASC');
    }

    public function userActivities()
    {
        return $this->hasMany(UserActivity::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isStaff()
    {
        return $this->is_staff == 'yes';
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'user_id', 'id');
    }

    public function upcomingBookings()
    {
        return $this->hasMany(Booking::class)->whereHas('bookingActivities', function ($query) {
            return $query->where('status', 'upcoming');
        });
    }

    //Wallet helpers
    public function withdraw(float $amount)
    {
        $balance = $this->attributes['club_cash'];
        $balance -= $amount;

        $this->update([
            'club_cash' => $balance,
        ]);
    }

    public function deposit(float $amount)
    {
        $balance = $this->attributes['club_cash'];
        $balance += $amount;

        $this->update([
            'club_cash' => $balance,
        ]);
    }

    public function runningBookings()
    {
        return $this->bookings()->whereHas('bookingActivities', function ($query) {
            $query->where('status', 'running');
        });
    }

    public function coachInformations()
    {
        return $this->hasOneThrough(CoachInformation::class, UserActivity::class, 'user_id', 'users_activities_id');
    }
}
