<?php
namespace Ksoft\Klaravel\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;

use Ksoft\Klaravel\Console\Helpers\Publisher;


class KlaravelController extends Controller
{

    public function index()
    {
        return view('klaravel::_kLara.dashboard');
    }

    public function menues()
    {
        return view('klaravel::_kLara.comming-soon');
    }

    public function wiki($section)
    {
        return view('klaravel::_kLara.wiki', compact('section'));
    }

    public function makeKrud(Request $request)
    {
        if (!$request->filled('model_name')) {

            return back()
                    ->with(
                        'flash_error',
                        'Error, required field model not provided'
                    )
                    ->withInput();
        }

        // if ($request->filled('publish_base_krud') && $request->publish_base_krud == 'yes' ) {
        //     Artisan::call('ksoft:publish', ['--base-krud' => 'true']);
        // }

        $params = [
            'model' => $request->model_name,
        ];

        if ($request->filled('base_path')) {
            $params['--folder'] = $request->base_path;
        }

        Artisan::call('ksoft:krud', $params);

        return back()->with('flash_message', 'Congrats, Krud generated with no errors.');
    }

    public function publishConfig(Request $request)
    {
        if ($request->file == 'config') {
            Artisan::call('ksoft:publish', ['--config' => 'true']);
        } elseif ($request->file == 'base_controller') {
            Artisan::call('ksoft:publish', ['--base-krud' => 'true']);
        }

        return back()->with(
            'flash_message',
            '<strong>Congrats</strong>, File published succesfully.'
        );
    }

}
