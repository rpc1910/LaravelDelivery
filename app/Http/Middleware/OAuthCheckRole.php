<?php

namespace LaravelDelivery\Http\Middleware;

use Closure;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use LaravelDelivery\Repositories\UserRepository;

class OAuthCheckRole
{
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $nivel)
    {
        $id = Authorizer::getResourceOwnerId();
        $user = $this->userRepository->find($id);

        if($user->role != $nivel) {
            abort(403, 'Access Forbiden');
        }
        return $next($request);
    }
}
