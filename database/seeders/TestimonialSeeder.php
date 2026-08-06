<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::truncate();

        Testimonial::create([
            'name' => 'Ayesha Khan',
            'title' => 'Happy Customer',
            'company' => 'Ahsan Fashion',
            'message' => 'This store made my online shopping experience fast and easy. The product quality was excellent and the delivery was on time.',
            'image' => 'user1.jpg',
        ]);

        Testimonial::create([
            'name' => 'Omar Rahman',
            'title' => 'Satisfied Buyer',
            'company' => 'Rahman Designs',
            'message' => 'The customer service was responsive and helpful. I loved the product selection and the checkout process was smooth.',
            'image' => 'user2.jpg',
        ]);

        Testimonial::create([
            'name' => 'Sara Malik',
            'title' => 'Repeat Customer',
            'company' => 'Malik Studio',
            'message' => 'I keep coming back because the store offers great deals and reliable service. Highly recommend to anyone looking for quality products.',
            'image' => 'user3.jpg',
        ]);
    }
}
