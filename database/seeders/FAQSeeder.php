<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQCategory;
use App\Models\FAQ;
use App\Models\User;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        // Bepaal wie de “eigenaar” van de FAQ’s wordt
        // We nemen admin id = 1, anders gewoon de eerste user.
        $ownerId = User::where('id', 1)->value('id') ?? User::first()->id;

        $categories = [
            'General Questions' => [
                ['question' => 'What are your working hours?', 'answer' => 'We are open from 9 AM to 9 PM.'],
                ['question' => 'Do I need an appointment?',   'answer' => 'Walk-ins are welcome, but appointments are preferred.'],
            ],
            'Pricing' => [
                ['question' => 'How much does a haircut cost?', 'answer' => 'Our haircuts start at $15.'],
                ['question' => 'Do you offer discounts?',       'answer' => 'Yes, we have a loyalty program.'],
            ],
        ];

        foreach ($categories as $categoryName => $faqs) {
            $category = FAQCategory::create(['name' => $categoryName]);

            foreach ($faqs as $faq) {
                FAQ::create([
                    'faq_category_id' => $category->id,
                    'user_id'         => $ownerId,          // ← verplicht veld
                    'question'        => $faq['question'],
                    'answer'          => $faq['answer'],
                ]);
            }
        }
    }
}
