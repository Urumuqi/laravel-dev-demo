<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // add debug query log
        if (env('APP_DEBUG')) {
            DB::listen(function($query) {
                $sql = '';
                $splits = explode('?', $query->sql);
                $swith = count($splits) - 1;
                foreach ($splits as $cnt => $split) {
                    $sql .= $cnt < $swith ? ($split . "'".  $query->bindings[$cnt]. "'") : $split;
                }
                File::append(
                    storage_path('logs/sql-'. date('Y-m-d') .'.log'),
                    sprintf('date: %s | execution time: %d | sql: %s ;', date('Y-m-d H:i:s'), $query->time, $sql) . PHP_EOL
                );
            });
        }
    }
}
