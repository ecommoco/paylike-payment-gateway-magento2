<?php
namespace Ecommoco\Paylike\Gatway;

/**
 * Class Client
 * @package Paylike
 * Manages the app creation.
 */

class Client {

	/**
	 * @var
	 * This is the adapter, similar to a db engine,
	 * it can be changed with any class that has its capabilities,
	 * which are making requests to api. In the future the adapter
	 * will be extended from an interface.
	 */
	private static $adapter = null;

	/**
	 * @param $privateApiKey
	 * Set the api key for future calls
	 */
	public static function setKey( $privateApiKey ) {
		self::$adapter = new \Ecommoco\Paylike\Gatway\Adapter( $privateApiKey );
	}

	/**
	 * @param null $privateApiKey
	 * Returns the object that will be responsible for making the calls to the api
	 *
	 * @return bool|null|Adapter
	 */
	public static function getAdapter( $privateApiKey = null ) {
		if ( self::$adapter ) {
			return self::$adapter;
		} else {
			if ( $privateApiKey ) {
				return new \Ecommoco\Paylike\Gatway\Adapter( $privateApiKey );
			} else {
				return false;
			}
		}
	}

}