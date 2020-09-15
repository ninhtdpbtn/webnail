<?php

namespace App\Console\Commands;

use App\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductUpdateSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:update-slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update slug product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
//    public function handle()
//    {
//        $products = Product::all();
//        foreach ($products as $product) {
//            $product->slug = Str::slug($product->name);
//            $product->save();
//        }
//        $this->info('Done');
//    }
}
