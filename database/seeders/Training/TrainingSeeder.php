<?php

namespace Database\Seeders\Training;

use App\Models\Training\Training;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trainings = [
            [
                'title' => [
                    'en' => 'Anger is My Friend Training',
                    'ar' => 'غضبي/ك صديقي',
                ],
                'description' => [
                    'en' => 'This training focuses on understanding and managing anger, 
turning it into a positive force rather than a destructive one. Participants learn techniques to 
identify triggers, and provides techniques to identify triggers, and distinguish between 
responses and reactions and utilize anger constructively in the daily life.',
                    'ar' => 'يركز هذا التدريب على فهم الغضب وإدارته، وتحويله إلى قوة إيجابية بدلاً من كونه قوة مدمرة. يتعلم المشاركون تقنيات تساعدهم على تحديد المحفزات، والتمييز بين الاستجابات وردود الفعل، وتوظيف الغضب بشكل بناء في حياتهم اليومية.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Psychological First Aid in Times of Crisis Training',
                    'ar' => 'الإسعاف النفسي الأولي في أوقات الأزمات',
                ],
                'description' => [
                    'en' => 'This workshop provided essential skills for offering psychological first aid during crises. 
Participants would be trained to support individuals experiencing emotional distress and to 
stabilize 
their mental health in emergency situations.',
                    'ar' => 'تقدم هذه الورشة المهارات الأساسية لتقديم الإسعاف النفسي الأولي خلال الأزمات. يتم تدريب المشاركين على كيفية دعم الأفراد الذين يعانون من ضغوط نفسية ودعم استقرار صحتهم النفسية في حالات الطوارئ.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Basics of Psychological Interventions with Children in Times of Crisis',
                    'ar' => 'أساسيات التدخلات النفسية مع الأطفال في أوقات الأزمات',
                ],
                'description' => [
                    'en' => 'This training emphasizes the importance of tailored psychological interventions for children 
during crises. It provides participants with knowledge on how to address children\'s emotional 
needs, ensuring their well-being and recovery during challenging times. ',
                    'ar' => 'يركز هذا التدريب على أهمية التدخلات النفسية المخصصة للأطفال خلال الأزمات. ويقدم للمشاركين معرفة حول كيفية تلبية حاجات واحتياجات الأطفال العاطفية، مما يضمن رفاههم وتعافيهم خلال الأوقات الصعبة.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Dealing with Anger after Crisis Workshop',
                    'ar' => 'ورشة عمل حول التعامل مع الغضب بعد الأزمات',
                ],
                'description' => [
                    'en' => 'This session aimed at addressing anger that often 
follows crises. Participants learned methods to process their emotions, avoid negative reactions, 
and find constructive outlets for their anger, fostering resilience and emotional stability.',
                    'ar' => 'تستهدف هذه الجلسة التعامل مع الغضب الذي غالبا ما يتبع الأزمات. يتعلم المشاركون طرقا لمعالجة مشاعرهم، وتجنب ردود الفعل، وإيجاد منافذ بناءة لغضبهم، مما يعزز المرونة والاستقرار العاطفي.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Dealing with Panic Disorder in Times of Crisis Workshop',
                    'ar' => 'ورشة عمل حول التعامل مع اضطراب الهلع في أوقات الأزمات',
                ],
                'description' => [
                    'en' => 'Focusing on panic disorders, this 
workshop equips participants with strategies to manage and alleviate panic attacks during 
crises. It includes practical exercises to help individuals recognize symptoms and apply coping 
mechanisms effectively.',
                    'ar' => 'تركزت هذه الورشة على اضطرابات الهلع، حيث زودت المشاركين باستراتيجيات لإدارة وتخفيف نوبات الهلع خلال الأزمات. تضمنت الورشة تمارين عملية لمساعدة الأفراد على التعرف على الأعراض وتطبيق آليات التكيف بفعالية.',
                ],
            ],
            [
                'title' => [
                    'en' => 'Dealing with My Feelings in the Times of Crisis Workshop',
                    'ar' => 'ورشة العمل حول التعامل مع مشاعري في أوقات الأزمات',
                ],
                'description' => [
                    'en' => 'This workshop provides tools for 
recognizing and managing various emotions during crises. Participants would be guided through 
exercises to identify their feelings, understand their sources, and develop healthy emotional 
responses.',
                    'ar' => 'تقدم هذه الورشة أدوات للتعرف على المشاعر المختلفة وإدارتها خلال الأزمات. وتوجه المشاركين من خلال تمارين لتحديد مشاعرهم، وفهم مصدرها، وتطوير ردود فعل عاطفية صحية.',
                ],
            ],
            [
                'title' => [
                    'en' => 'How to Empathize with Others Workshop',
                    'ar' => '',
                ],
                'description' => [
                    'en' => 'Emphasizing the importance of empathy, this workshop trains participants on empathic 
listening, understanding others\' perspectives, and offering compassionate support. It aims to 
enhance interpersonal relationships and community cohesion. 
',
                    'ar' => 'مع التركيز على أهمية التعاطف، تركز هذه الورشة المشاركين على الإصغاء العاطفي، وفهم وجهات نظر الآخرين، وتقديم الدعم برحمة. كان الهدف من الورشة تعزيز العلاقات بين الأفراد وتعزيز تماسك المجتمع.',
                ],
            ],
        ];

        foreach($trainings as $training)
        {
            Training::create($training);
        }
    }
}
