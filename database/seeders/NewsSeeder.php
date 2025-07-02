<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\News;   // Zorg dat je News-model bestaat

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title'        => 'Grand Opening van onze Shop!',
                'content'      => 'We hebben officieel de deuren geopend van onze splinternieuwe barbershop. Kom langs en profiteer van 20% korting in de openingsweek.',
                'image_url'    => 'news/opening.jpg',      // in storage/app/public/news
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title'        => 'Nieuwe Stylist bij het Team',
                'content'      => 'We verwelkomen Mahmoud als nieuwste barber. Hij brengt 8 jaar ervaring en een frisse stijl mee.',
                'image_url'    => 'news/mahmoud.jpg',
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'title'        => 'Holiday Specials aangekondigd',
                'content'      => 'In december bieden we speciale pakketten aan inclusief knipbeurt, baardverzorging en gratis hot-towel-service.',
                'image_url'    => null,                    // geen foto nodig
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title'        => 'COVID-maatregelen geüpdatet',
                'content'      => 'Mondmaskers zijn niet langer verplicht, maar worden wel aangeraden als je je niet lekker voelt.',
                'image_url'    => null,
                'published_at' => Carbon::now()->subDay(),
            ],
            [
                'title'        => 'Black Friday Deal – 50% korting!',
                'content'      => 'Alle knipbeurten half geld op Black Friday – boek snel want vol = vol.',
                'image_url'    => 'news/blackfriday.jpg',
                'published_at' => Carbon::now(),
            ],
        ];

        News::insert($items);
    }
}
