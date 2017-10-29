<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeDirectiveProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      Blade::directive('js', function ($arguments) {

          list($var, $data) = explode(',', str_replace(['(', ')', ' ', "'"], '', $arguments));

          $ss = "<?php if (is_object({$data})) {
              {$data} = json_hashid_maper({$data});
              echo '<script>window[\'{$var}\'] ='.$data.';</script>';
           } else {
               echo '<script>window[\'{$var}\']= \''.$data.'\';</script>';
          }
          ?>";
          $str = "<?php if(is_object({$data})) { {$data}= json_hashid_maper({$data}); }else{{$data} = '{$data}'}";
          return $ss;
      });
    }
}
