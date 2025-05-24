<?php

namespace Database\Seeders\Category;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Peace Heritage',
                    'ar' => 'تراث السلام'
                ],
                'description' => [
                    'en' => 'Cultural or historical practices that foster harmony and coexistence 
between different groups, instances of diverse cultures, practices, and traditions that have 
contributed and continue to contribute to social cohesion and peacebuilding.',
                    'ar' => 'الممارسات الثقافية أو التاريخية التي عززت الانسجام والتعايش بين المجموعات المختلفة، حالات من الثقافات والممارسات والتقاليد المختلفة التي ساهمت ولا تزال تساهم في التماسك المجتمعي وبناء السلام.'
                ],
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Collaborative work',
                    'ar' => 'جهودنا قوة تجمعنا'
                ],
                'description' => [
                    'en' => 'Stories of initiatives and collective actions launched by local 
communities, creative solutions that enhanced social bonding, and drew strength from 
collective support. Through joint efforts, obstacles and challenges have been transformed 
into new opportunities for cohesion and cooperation, paving the way to a more 
sustainable and harmonious future.',
                    'ar' => 'حكايا المبادرات والأفعال الجماعية التي أطلقتها المجتمعات المحلية، وحلول إبداعية عززت الترابط الاجتماعي، واستلهمت القوة من الدعم الجماعي. من خلال الجهود المشتركة، تحولت العقبات والتحديات إلى فرص جديدة للتماسك والتعاون، ومهدت الطريق إلى مستقبل أكثر استدامةً وانسجاماً.',
                ]
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Celebrating the Beauty of Others',
                    'ar' => 'الاحتفال بجمال الإنسان'
                ],
                'description' => [
                    'en' => 'Stories highlighting examples of individuals who 
took steps to achieve impactful actions that contribute to improving the current quality of 
life, and the pursuit of a future full of diverse choices and opportunities. Their initiatives 
have inspired others.',
                    'ar' => 'حكايا تسلط الضوء على أمثلة لأشخاص اتخذوا خطوات لتحقيق إنجازات ذات أثر يساهم في تحسين جودة الحياة الحالية، والسعي نحو مستقبل يحتوي خيارات وفرص متنوعة، وكانت مبادراتهم مصدر إلهام للآخرين.'
                ],
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Daily Harmony',
                    'ar' => 'التناغم اليومي'
                ],
                'description' => [
                    'en' => 'Small yet meaningful ways Syrians contribute to peace in their daily 
lives, enhancing connection and social cohesion. These stories also shed light on how 
personal and community relationships contribute to fulfilling common human needs.',
                    'ar' => 'طرق ومسارات صغيرة، ولكنها ذات معنى يساهم بها السوريون في تحقيق السلام في حياتهم اليومية، مما يعزز الترابط، والتماسك المجتمعي، نسلط من خلالها الضوء أيضاً عن كيفية مساهمة العلاقات الشخصية والمجتمعية في تلبية الحاجات الإنسانية المشتركة.',
                ]
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'A Tipping Point',
                    'ar' => 'نقاط التحول'
                ],
                'description' => [
                    'en' => 'Pivotal moments that capture human experiences and leave a deep 
impact on individuals and communities, where paths change, and new doors open 
towards inner and outer peace. Here, experiences that reshape relationships and create 
new spaces for understanding are embodied, where pain is transformed into 
opportunities, and where meaning is drawn from reflecting on these experiences calling 
us for new awareness that reshapes our vision of life.',
                    'ar' => 'لحظات فارقة ومواقف إنسانية تترك أثراً عميقاً في حياة الأفراد والمجتمعات، حيث تتغير المسارات وتُفتح أبواب جديدة نحو السلام الداخلي والخارجي. تتجسد هنا التجارب التي تعيد رسم العلاقات، وتخلق مساحات جديدة للتفاهم، حيث يتحول الألم إلى فرصة، ويصبح التأمل فيها دعوةً لاستلهام المعنى من التجربة، وتحويله إلى وعيٍ يعيد تشكيل رؤيتنا للحياة.'
                ],
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Conflict Resolution and Transformation',
                    'ar' => 'حل وتحويل النزاعات'
                ],
                'description' => [
                    'en' => 'Stories about individuals who used 
alternative approaches to deal with tensions, enabling them to transform conflicts, 
enhance dialogue, and build bridges between individuals and groups. These experiences 
highlight the dynamics of transformation that enable communities to achieve stability and 
harmony, turning difficult moments into opportunities for communication and growth.',
                    'ar' => 'قصص عن أفراد استعملت نهجاً بديلاً في التعامل مع التوترات، مما يمكنها من تحويل النزاعات، وتعزيز الحوار، وبناء جسور بين الأفراد والجماعات. هذه التجارب تسلط الضوء على ديناميكيات التحول التي تُمكّن المجتمعات من تحقيق الاستقرار والانسجام، وتحويل اللحظات الصعبة إلى فرص للتواصل والتطور.'
                ],
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => 'Art for Peace',
                    'ar' => 'الثقافة والفن جسور السلام'
                ],
                'description' => [
                    'en' => 'Examples of how art, music, poetry, and other creative forms have 
been used to unite communities and promote healing, playing a role in building bridges 
and reviving human connections.',
                    'ar' => 'مثلة عن كيف تم استعمال الفن والموسيقى والشعر والفنون الأخرى في توحيد المجتمعات وتعزيز الشفاء، حيث لعبت هذه الوسائل الإبداعية دوراً في بناء الجسور، وإعادة إحياء الروابط الإنسانية',
                ]
            ],
            [
                'project_id'  => 1,
                'name'        => [
                    'en' => '',
                    'ar' => 'الروحانية لتعزيز السلام'
                ],
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category\Category::create($category);
        }
    }
}
