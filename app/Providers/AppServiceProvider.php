<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // カスタムディレクティブ@asset
        Blade::directive('asset', function ($file) {
            $file = str_replace(["'", '"'], "", $file);
            $path = public_path() . $file;
            try {
                // [注意] view:cacheにならないようPHPのスクリプトを返す
                $opt = "?<?php try { echo \File::lastModified('{$path}'); } catch (\Exception \$e) {} ?>";
            } catch(\Exception $exp) {
                // ファイルが無い場合はスキップ
                $opt = '';
            }
            return $file.$opt;
            // return secure_asset($file).$opt;
        });
        // 適用後にphp artisan view:clear
    }
}
