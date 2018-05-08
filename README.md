Add JWTAuth keys from

https://github.com/tymondesigns/jwt-auth/wiki/Installation


Register Middleware
1. 'auth.check.app.id' => \Frontiernxt\LaravelRESTApi\Http\Middleware\CheckAppId::class,
2. 'auth.check.jwt.token' => \Frontiernxt\LaravelRESTApi\Http\Middleware\CheckJwtToken::class,