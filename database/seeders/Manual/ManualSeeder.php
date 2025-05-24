<?php

namespace Database\Seeders\Manual;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManualSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manuals = [
            [
                'title' => [
                    'en' => 'Forgiveness',
                    'ar' => 'المسامحة'
                ],
                'description' => [
                    'en' => 'The Forgiveness Manual is a practical tool to raise awareness about the importance of 
forgiving oneself and others, and the role this plays in meeting our needs, reducing violence 
directed at oneself or others, and building a cohesive society that rejects revenge and lives in 
love and peace.',
                    'ar' => 'دليل المسامحة هو دليل عملي لرفع الوعي بأهمية المسامحة للذات والآخر وخطوات تطبيقها، ودور ذلك في تلبية حاجاتنا، وتخفيف العنف الموجه نحو الذات أو الآخر وبناء مجتمع متماسك ينبذ الانتقام ويحيا بحب وسلام'
                ],
            ],
            [
                'title' => [
                    'en' => 'Tipping Points',
                    'ar' => 'العبور'
                ],
                'description' => [
                    'en' => '',
                    'ar' => ''
                ],
            ],
            
            [
                'title' => [
                    'en' => 'Unintentional Emotional Harm',
                    'ar' => 'دليل الأذى العاطفي غير المقصود'
                ],
                'description' => [
                    'en' => 'A manual for identifying unintentional emotional harm and raising awareness about it, with the 
aim of reducing such harm within youth groups engaged in humanitarian and community work, 
as well as among activists in the field of volunteerism.',
                    'ar' => 'هو دليل لتوصيف الأذى العاطفي غير المقصود، ورفع الوعي به، بهدف التخفيف من الأذى العاطفي غير المقصود ضمن المجموعة الشبابية العاملة في المجال الإنساني والمجتمعي والناشطين في العمل التطوعي'
                ],
            ],
            
            [
                'title' => [
                    'en' => 'Anger Is My Friend',
                    'ar' => 'غضبي صديقي'
                ],
                'description' => [
                    'en' => 'This manual focuses on understanding and managing anger, turning it into a positive force 
rather than a destructive one, and provides techniques to identify triggers, and distinguish 
between responses and reactions and utilize anger constructively in the daily life.',
                    'ar' => 'يركز هذا الدليل على فهم الغضب وإدارته، وتحويله إلى قوة إيجابية بدلاً من كونه قوة مدمر، كما يوفر تقنيات لتحديد المحفزات، والتمييز بين الاستجابات وردود الفعل، وتوظيف الغضب بشكل بناء في الحياة اليومية.'
                ],
            ]
        ];

        foreach ($manuals as $manual) {
            \App\Models\Manual\Manual::create($manual);
        }
    }
}
