#!/usr/local/bin/php7
<?php
/**
 * Volume 1 - Fundamental of FP - Video 3.4
 * Author: @luijar
 * Transforming a non-pure, monolithic function to many pure functions
 */
declare(strict_types=1);
namespace Vol1\Sect3\Video4;

require_once 'db.php';
require_once 'user.php';

use Illuminate\Database\Capsule\Manager as DB;

$counter = random_int(0, 9);  // generates cryptographically secure random numbers

// First take
function generateEmailForUser(int $userId) {	
	global $counter;

	$rec = DB::table('users')->where('id', '=', $userId)->first();
	if(!empty($rec)) {
		$user = User::hydrate($rec);		
		$newEmail = [
		   $user->getFirstname(), 
		   $user->getLastname()[0], 
		   $counter, 
		   '@packt.com'		 
		];			
		return implode('', $newEmail);
	}
	throw new \InvalidArgumentException('User not found!');
}

$email = generateEmailForUser(2);
printf('[Imperative] New user email is: %s'. PHP_EOL, $email);


// ----------------------------------------//
//    TODO: Transform to pure functions
// ----------------------------------------//

// Step 1: decompose problem domain into fine-grained functions

// findRecord :: int -> stdClass
function findRecord(int $userId): \stdClass {
	return DB::table('users')->where('id', '=', $userId)->first();
}

// valid :: a -> a | InvalidArgumentException
function valid($val) {
	if(!empty($val)) {
		return $val;
	}
	throw new \InvalidArgumentException('User not found!');
}

// generateEmail :: User, int -> string
function generateEmail(User $user, int $qualifier): string {
	return implode('', [
		   	$user->getFirstname(), 
		   	$user->getLastname()[0], 
		   	$qualifier,
		   	'@packt.com'
		]);
}

// Step 2: compose them to provide solution
$email = generateEmail(
	User::hydrate(
		valid(
			findRecord(2))), 
	random_int(0, 9)); 

printf('[Functional] New user email is: %s'. PHP_EOL, $email);



