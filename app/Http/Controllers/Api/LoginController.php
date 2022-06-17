<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * LoginController
 *
 * This is a remake of the myaac-tibia12-login of opentibiabr
 * source file: https://github.com/opentibiabr/myaac-tibia12-login/blob/develop/login.php
 *
 */
class LoginController extends Controller
{
    //error function
    function sendError($error_msg, $code = 3)
    {
        $retError = array();
        $retError["errorCode"] = $code;
        $retError["errorMessage"] = $error_msg;
        die(json_encode($retError));
    }

    /**
     * return character list if authenticated.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $requestJson = json_decode($request->getContent(), true);

        $lastLogin = 0;

        $account = Account::where([
            'email' => $requestJson['email'],
            'password' => sha1($requestJson['password'])
        ])->first();

        if (!$account) {
            $this->sendError('Account name or password is not correct.');
        }

        /**
         * FILL ARRAY WITH ALL CHARACTERS
         */
        foreach ($account->players as $player) {
            $characters[] = [
                "worldid" => 0,
                "name" => $player->name,
                "level" => $player->level,
                "vocation" => array_search($player->vocation, ['None' => 0, 'Sorcerer' => 1]),
                "ismale" => ($player->sex == 1) ? true : false,
                "tutorial" => false, //($player->lastlogin) ? false : true,
                'dailyrewardstate' => $player->isreward,
                'outfitid' => $player->looktype,
                'headcolor' => $player->lookhead,
                'torsocolor' => $player->lookbody,
                'legscolor' => $player->looklegs,
                'detailcolor' => $player->lookfeet,
                'addonsflags' => $player->lookaddons,
                'ishidden' => 0,
                'istournamentparticipant' => false,
                'ismaincharacter' => true,
                'remainingdailytournamentplaytime' => 0
            ];

            if ($lastLogin < $player->lastlogin) {
                $lastLogin = $player->lastlogin;
            }
        }

        try {
            /**
         * FILL THE ARRAY FOR JSON RESPONSE
         */
        $data = [
            'session' => [
                "sessionkey" => $requestJson['email'] . "\n" . $requestJson['password'],
                "lastlogintime" => $lastLogin,
                "ispremium" => true, // ($config['lua']['freePremium']) ? true : $account->isPremium(),
                "premiumuntil" => 0, // Carbon::now()->addDays(10)->timestamp, // Carbon::now()->addDays($account->premdays)->timestamp,
                'status' => 'active', // active, frozen or suspended
                'returnernotification' => false,
                'showrewardnews' => true,
                'isreturner' => true,
                'fpstracking' => false,
                'optiontracking' => false,
                'tournamentticketpurchasestate' => 0,
                'emailcoderequest' => false
            ],
            'playdata' => [
                'worlds' => [
                    [
                        'id' => 0,
                        'name' => 'OTServBR-Global', // $configLua['serverName']
                        'externaladdress' => '127.0.0.1', // $configLua['ip']
                        'externalport' => 7172, // $configLua['gameProtocolPort']
                        'externaladdressprotected' => '127.0.0.1', // $configLua['ip']
                        'externalportprotected' => 7172, // $configLua['gameProtocolPort']
                        'externaladdressunprotected' => '127.0.0.1', // $configLua['ip']
                        'externalportunprotected' => 7172, // $configLua['gameProtocolPort']
                        'previewstate' => 0,
                        'location' => 'BRA', // BRA, EUR, USA
                        'anticheatprotection' => false,
                        'pvptype' => 'php', //array_search($config['lua']['worldType'], ['pvp', 'no-pvp', 'pvp-enforced']),
                        'istournamentworld' => false,
                        'restrictedstore' => false,
                        'currenttournamentphase' => 2
                    ]
                ],
                'characters' => (isset($characters)) ? $characters : null,
            ]
        ];
        } catch (\Throwable $th) {
            throw $th;
        }


        return response()->json($data);
    }
}
