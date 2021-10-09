<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 *
 * @property int $id
 * @property string $name
 * @property int $group_id
 * @property int $account_id
 * @property int $level
 * @property int $vocation
 * @property int $health
 * @property int $healthmax
 * @property int $experience
 * @property int $lookbody
 * @property int $lookfeet
 * @property int $lookhead
 * @property int $looklegs
 * @property int $looktype
 * @property int $lookaddons
 * @property int $maglevel
 * @property int $mana
 * @property int $manamax
 * @property int $manaspent
 * @property int $soul
 * @property int $town_id
 * @property int $posx
 * @property int $posy
 * @property int $posz
 * @property boolean $conditions
 * @property int $cap
 * @property int $sex
 * @property int $lastlogin
 * @property int $lastip
 * @property bool $save
 * @property bool $skull
 * @property int $skulltime
 * @property int $lastlogout
 * @property int $blessings
 * @property int $blessings1
 * @property int $blessings2
 * @property int $blessings3
 * @property int $blessings4
 * @property int $blessings5
 * @property int $blessings6
 * @property int $blessings7
 * @property int $blessings8
 * @property int $onlinetime
 * @property int $deletion
 * @property int $balance
 * @property int $offlinetraining_time
 * @property int $offlinetraining_skill
 * @property int $stamina
 * @property int $skill_fist
 * @property int $skill_fist_tries
 * @property int $skill_club
 * @property int $skill_club_tries
 * @property int $skill_sword
 * @property int $skill_sword_tries
 * @property int $skill_axe
 * @property int $skill_axe_tries
 * @property int $skill_dist
 * @property int $skill_dist_tries
 * @property int $skill_shielding
 * @property int $skill_shielding_tries
 * @property int $skill_fishing
 * @property int $skill_fishing_tries
 * @property int $skill_critical_hit_chance
 * @property int $skill_critical_hit_chance_tries
 * @property int $skill_critical_hit_damage
 * @property int $skill_critical_hit_damage_tries
 * @property int $skill_life_leech_chance
 * @property int $skill_life_leech_chance_tries
 * @property int $skill_life_leech_amount
 * @property int $skill_life_leech_amount_tries
 * @property int $skill_mana_leech_chance
 * @property int $skill_mana_leech_chance_tries
 * @property int $skill_mana_leech_amount
 * @property int $skill_mana_leech_amount_tries
 * @property int $skill_criticalhit_chance
 * @property int $skill_criticalhit_damage
 * @property int $skill_lifeleech_chance
 * @property int $skill_lifeleech_amount
 * @property int $skill_manaleech_chance
 * @property int $skill_manaleech_amount
 * @property int $manashield
 * @property int $max_manashield
 * @property int|null $prey_stamina_1
 * @property int|null $prey_stamina_2
 * @property int|null $prey_stamina_3
 * @property int $prey_column
 * @property int|null $xpboost_stamina
 * @property int|null $xpboost_value
 * @property int $marriage_status
 * @property int $marriage_spouse
 * @property int $bonus_rerolls
 * @property bool|null $quickloot_fallback
 * @property int $lookmountbody
 * @property int $lookmountfeet
 * @property int $lookmounthead
 * @property int $lookmountlegs
 * @property int $lookfamiliarstype
 * @property bool $isreward
 * @property bool $istutorial
 *
 * @property Account $account
 * @property Collection|AccountBanHistory[] $account_ban_histories
 * @property Collection|AccountBan[] $account_bans
 * @property Collection|AccountViplist[] $account_viplists
 * @property Collection|DailyRewardHistory[] $daily_reward_histories
 * @property Collection|GuildInvite[] $guild_invites
 * @property GuildMembership $guild_membership
 * @property Guild $guild
 * @property Collection|IpBan[] $ip_bans
 * @property Collection|MarketHistory[] $market_histories
 * @property Collection|MarketOffer[] $market_offers
 * @property PlayerDeath $player_death
 * @property Collection|PlayerDepotitem[] $player_depotitems
 * @property Collection|PlayerHireling[] $player_hirelings
 * @property Collection|PlayerInboxitem[] $player_inboxitems
 * @property PlayerItem $player_item
 * @property Collection|PlayerNamelock[] $player_namelocks
 * @property PlayerNamelock $player_namelock
 * @property Collection|PlayerReward[] $player_rewards
 * @property PlayerSpell $player_spell
 * @property Collection|PlayerStorage[] $player_storages
 * @property PreySlot $prey_slot
 *
 * @package App\Models
 */
class Player extends Model
{
	protected $table = 'players';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int',
		'account_id' => 'int',
		'level' => 'int',
		'vocation' => 'int',
		'health' => 'int',
		'healthmax' => 'int',
		'experience' => 'int',
		'lookbody' => 'int',
		'lookfeet' => 'int',
		'lookhead' => 'int',
		'looklegs' => 'int',
		'looktype' => 'int',
		'lookaddons' => 'int',
		'maglevel' => 'int',
		'mana' => 'int',
		'manamax' => 'int',
		'manaspent' => 'int',
		'soul' => 'int',
		'town_id' => 'int',
		'posx' => 'int',
		'posy' => 'int',
		'posz' => 'int',
		'conditions' => 'boolean',
		'cap' => 'int',
		'sex' => 'int',
		'lastlogin' => 'int',
		'lastip' => 'int',
		'save' => 'bool',
		'skull' => 'bool',
		'skulltime' => 'int',
		'lastlogout' => 'int',
		'blessings' => 'int',
		'blessings1' => 'int',
		'blessings2' => 'int',
		'blessings3' => 'int',
		'blessings4' => 'int',
		'blessings5' => 'int',
		'blessings6' => 'int',
		'blessings7' => 'int',
		'blessings8' => 'int',
		'onlinetime' => 'int',
		'deletion' => 'int',
		'balance' => 'int',
		'offlinetraining_time' => 'int',
		'offlinetraining_skill' => 'int',
		'stamina' => 'int',
		'skill_fist' => 'int',
		'skill_fist_tries' => 'int',
		'skill_club' => 'int',
		'skill_club_tries' => 'int',
		'skill_sword' => 'int',
		'skill_sword_tries' => 'int',
		'skill_axe' => 'int',
		'skill_axe_tries' => 'int',
		'skill_dist' => 'int',
		'skill_dist_tries' => 'int',
		'skill_shielding' => 'int',
		'skill_shielding_tries' => 'int',
		'skill_fishing' => 'int',
		'skill_fishing_tries' => 'int',
		'skill_critical_hit_chance' => 'int',
		'skill_critical_hit_chance_tries' => 'int',
		'skill_critical_hit_damage' => 'int',
		'skill_critical_hit_damage_tries' => 'int',
		'skill_life_leech_chance' => 'int',
		'skill_life_leech_chance_tries' => 'int',
		'skill_life_leech_amount' => 'int',
		'skill_life_leech_amount_tries' => 'int',
		'skill_mana_leech_chance' => 'int',
		'skill_mana_leech_chance_tries' => 'int',
		'skill_mana_leech_amount' => 'int',
		'skill_mana_leech_amount_tries' => 'int',
		'skill_criticalhit_chance' => 'int',
		'skill_criticalhit_damage' => 'int',
		'skill_lifeleech_chance' => 'int',
		'skill_lifeleech_amount' => 'int',
		'skill_manaleech_chance' => 'int',
		'skill_manaleech_amount' => 'int',
		'manashield' => 'int',
		'max_manashield' => 'int',
		'prey_stamina_1' => 'int',
		'prey_stamina_2' => 'int',
		'prey_stamina_3' => 'int',
		'prey_column' => 'int',
		'xpboost_stamina' => 'int',
		'xpboost_value' => 'int',
		'marriage_status' => 'int',
		'marriage_spouse' => 'int',
		'bonus_rerolls' => 'int',
		'quickloot_fallback' => 'bool',
		'lookmountbody' => 'int',
		'lookmountfeet' => 'int',
		'lookmounthead' => 'int',
		'lookmountlegs' => 'int',
		'lookfamiliarstype' => 'int',
		'isreward' => 'bool',
		'istutorial' => 'bool'
	];

	protected $fillable = [
		'name',
		'group_id',
		'account_id',
		'level',
		'vocation',
		'health',
		'healthmax',
		'experience',
		'lookbody',
		'lookfeet',
		'lookhead',
		'looklegs',
		'looktype',
		'lookaddons',
		'maglevel',
		'mana',
		'manamax',
		'manaspent',
		'soul',
		'town_id',
		'posx',
		'posy',
		'posz',
		'conditions',
		'cap',
		'sex',
		'lastlogin',
		'lastip',
		'save',
		'skull',
		'skulltime',
		'lastlogout',
		'blessings',
		'blessings1',
		'blessings2',
		'blessings3',
		'blessings4',
		'blessings5',
		'blessings6',
		'blessings7',
		'blessings8',
		'onlinetime',
		'deletion',
		'balance',
		'offlinetraining_time',
		'offlinetraining_skill',
		'stamina',
		'skill_fist',
		'skill_fist_tries',
		'skill_club',
		'skill_club_tries',
		'skill_sword',
		'skill_sword_tries',
		'skill_axe',
		'skill_axe_tries',
		'skill_dist',
		'skill_dist_tries',
		'skill_shielding',
		'skill_shielding_tries',
		'skill_fishing',
		'skill_fishing_tries',
		'skill_critical_hit_chance',
		'skill_critical_hit_chance_tries',
		'skill_critical_hit_damage',
		'skill_critical_hit_damage_tries',
		'skill_life_leech_chance',
		'skill_life_leech_chance_tries',
		'skill_life_leech_amount',
		'skill_life_leech_amount_tries',
		'skill_mana_leech_chance',
		'skill_mana_leech_chance_tries',
		'skill_mana_leech_amount',
		'skill_mana_leech_amount_tries',
		'skill_criticalhit_chance',
		'skill_criticalhit_damage',
		'skill_lifeleech_chance',
		'skill_lifeleech_amount',
		'skill_manaleech_chance',
		'skill_manaleech_amount',
		'manashield',
		'max_manashield',
		'prey_stamina_1',
		'prey_stamina_2',
		'prey_stamina_3',
		'prey_column',
		'xpboost_stamina',
		'xpboost_value',
		'marriage_status',
		'marriage_spouse',
		'bonus_rerolls',
		'quickloot_fallback',
		'lookmountbody',
		'lookmountfeet',
		'lookmounthead',
		'lookmountlegs',
		'lookfamiliarstype',
		'isreward',
		'istutorial'
	];

	public function account()
	{
		return $this->belongsTo(Account::class);
	}

	// public function account_ban_histories()
	// {
	// 	return $this->hasMany(AccountBanHistory::class, 'banned_by');
	// }

	// public function account_bans()
	// {
	// 	return $this->hasMany(AccountBan::class, 'banned_by');
	// }

	// public function account_viplists()
	// {
	// 	return $this->hasMany(AccountViplist::class);
	// }

	// public function daily_reward_histories()
	// {
	// 	return $this->hasMany(DailyRewardHistory::class);
	// }

	// public function guild_invites()
	// {
	// 	return $this->hasMany(GuildInvite::class);
	// }

	// public function guild_membership()
	// {
	// 	return $this->hasOne(GuildMembership::class);
	// }

	// public function guild()
	// {
	// 	return $this->hasOne(Guild::class, 'ownerid');
	// }

	// public function ip_bans()
	// {
	// 	return $this->hasMany(IpBan::class, 'banned_by');
	// }

	// public function market_histories()
	// {
	// 	return $this->hasMany(MarketHistory::class);
	// }

	// public function market_offers()
	// {
	// 	return $this->hasMany(MarketOffer::class);
	// }

	// public function player_death()
	// {
	// 	return $this->hasOne(PlayerDeath::class);
	// }

	// public function player_depotitems()
	// {
	// 	return $this->hasMany(PlayerDepotitem::class);
	// }

	// public function player_hirelings()
	// {
	// 	return $this->hasMany(PlayerHireling::class);
	// }

	// public function player_inboxitems()
	// {
	// 	return $this->hasMany(PlayerInboxitem::class);
	// }

	// public function player_item()
	// {
	// 	return $this->hasOne(PlayerItem::class);
	// }

	// public function player_namelocks()
	// {
	// 	return $this->hasMany(PlayerNamelock::class, 'namelocked_by');
	// }

	// public function player_namelock()
	// {
	// 	return $this->hasOne(PlayerNamelock::class);
	// }

	// public function player_rewards()
	// {
	// 	return $this->hasMany(PlayerReward::class);
	// }

	// public function player_spell()
	// {
	// 	return $this->hasOne(PlayerSpell::class);
	// }

	// public function player_storages()
	// {
	// 	return $this->hasMany(PlayerStorage::class);
	// }

	// public function prey_slot()
	// {
	// 	return $this->hasOne(PreySlot::class);
	// }
}
