<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $Anggota_id
 * @property string|null $Anggota_nama
 * @property string|null $Perumahan_nama
 * @property string|null $Anggota_Perumahan_no
 * @property string|null $Anggota_HP
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAnggotaPerumahanNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota wherePerumahanNama($value)
 */
	class Anggota extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $label
 * @property float|null $data
 * @property int|null $dataset_name
 * @property int $data_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereDataType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereDatasetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataFeed whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class DataFeed extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

