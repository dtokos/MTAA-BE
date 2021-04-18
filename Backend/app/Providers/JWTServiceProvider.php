<?php

namespace App\Providers;

use Tymon\JWTAuth\Providers\LaravelServiceProvider;
use Tymon\JWTAuth\Http\Parser\AuthHeaders;
use Tymon\JWTAuth\Http\Parser\Cookies;
use Tymon\JWTAuth\Http\Parser\InputSource;
use Tymon\JWTAuth\Http\Parser\Parser;
use Tymon\JWTAuth\Http\Parser\QueryString;
use Tymon\JWTAuth\Http\Parser\RouteParams;

class JWTServiceProvider extends LaravelServiceProvider {
	protected function registerTokenParser() {
		$this->app->singleton('tymon.jwt.parser', function ($app) {
			$parser = new Parser(
				$app['request'],
				[
					new AuthHeaders,
					(new AuthHeaders())->setHeaderName('Token'),
					new QueryString,
					new InputSource,
					new RouteParams,
					new Cookies($this->config('decrypt_cookies')),
				]
			);

			$app->refresh('request', $parser, 'setRequest');

			return $parser;
		});
	}
}
