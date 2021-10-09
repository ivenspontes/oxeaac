<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class Account
 *
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property int $premdays
 * @property int $lastday
 * @property int $type
 * @property int $coins
 * @property int $creation
 * @property int|null $recruiter
 *
 * @property Collection|AccountBanHistory[] $account_ban_histories
 * @property AccountBan $account_ban
 * @property Collection|AccountViplist[] $account_viplists
 * @property Collection|CoinsTransaction[] $coins_transactions
 * @property Collection|Player[] $players
 * @property Collection|StoreHistory[] $store_histories
 *
 * @package App\Models
 */
class Account extends Authenticatable
{
    use HasFactory, Notifiable;

	protected $table = 'accounts';
	public $timestamps = false;

	protected $casts = [
		'premdays' => 'int',
		'lastday' => 'int',
		'type' => 'int',
		'coins' => 'int',
		'creation' => 'int',
		'recruiter' => 'int',
        'email_verified_at' => 'datetime',
	];

	protected $hidden = [
		'password',
        'remember_token',
	];

	protected $fillable = [
		'name',
		'password',
		'email',
		'premdays',
		'lastday',
		'type',
		'coins',
		'creation',
		'recruiter'
	];

	// public function account_ban_histories()
	// {
	// 	return $this->hasMany(AccountBanHistory::class);
	// }

	// public function account_ban()
	// {
	// 	return $this->hasOne(AccountBan::class);
	// }

	// public function account_viplists()
	// {
	// 	return $this->hasMany(AccountViplist::class);
	// }

	// public function coins_transactions()
	// {
	// 	return $this->hasMany(CoinsTransaction::class);
	// }

	public function players()
	{
		return $this->hasMany(Player::class);
	}

	// public function store_histories()
	// {
	// 	return $this->hasMany(StoreHistory::class);
	// }

    /**
     * Mutators
     */

    /**
     * Set the account password with sha1 hash.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['password'] = sha1($value);
    }

}
