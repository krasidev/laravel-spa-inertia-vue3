<?php

namespace App\Http\Middleware;

use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $data = [
            'csrf_token' => csrf_token(),
            'app.name' => config('app.name', 'Laravel'),
            'app.url' => url('/'),
        ];

        $data['lang.menu'] = __('menu');

        $data['auth.user'] = $request->user()
            ? new ProfileResource($request->user())
            : null;

        $data['lang.messages.success'] = __('messages.success');
        $data['flash.success'] = $request->session()->get('success');

        $data['currentLocale'] = \LaravelLocalization::getCurrentLocale();
        $getLocalesOrder = \LaravelLocalization::getLocalesOrder();
        $data['localesOrder'] = collect($getLocalesOrder)->map(function ($properties, $localeCode) {
            return array_merge($properties, [
                'url' => \LaravelLocalization::getLocalizedURL($localeCode, null, [], true)
            ]);
        });

        return array_merge(parent::share($request), $data);
    }
}
