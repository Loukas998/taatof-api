<?php

namespace Database\Seeders\Department;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'title' => [
                'en' => 'Life Groups Department',
                'ar' => 'مجموعات الحياة'
                ],
                'description' => [
                    'en' => 'Life groups are one of the strategies for achieving the vision of TAATOF Foundation in 
working towards the formation and empowerment of peace incubators in several 
governorates and regions to provide a safe environment, in which violent behaviors 
decrease, and their members communicate in empathic language, in line with the non
violence and peacebuilding approach.',
                    'ar' => 'تُعد مجموعات الحياة إحدى الاستراتيجيات لتحقيق رؤيا مؤسسة تعاطف في العمل على تشكيل وتمكين حاضنات للسلام في عدة محافظات ومناطق، بهدف توفير بيئة آمنة يقل فيها السلوك العنفي، ويتواصل أفرادها بلغة متعاطفة تنسجم مع نهج اللاعنف وبناء السلام.'
                ],
                'participants_number' => 225,
                'groups_number' => 16,
            ],
            [
                'title' => [
                'en' => ' Psychological Counseling Department',
                'ar' => 'قسم الاستشارات النفسية'
                ],
                'description' => [
                    'en' => 'The Psychological Counseling Department offers support to individuals who request it or are 
            referred by other institutions. Each case receives personalized attention.',
                    'ar' => 'يقدم قسم الاستشارات الدعم للأفراد والجماعات الذين يطلبونه أو يتم تحويلهم من مؤسسات أخرى. وتحظى كل حالة بعناية فردية خاصة.'
                ],
                'participants_number' => 0,
                'groups_number' => 0,
            ],
            [
                'title' => [
                'en' => 'Training and Manuals Department',
                'ar' => 'قسم التدريب والأدلة'
                ],
                'description' => [
                    'en' => '',
                    'ar' => ''
                ],
                'participants_number' => 0,
                'groups_number' => 0,
            ],

            [
                'title' => [
                'en' => 'Scientific Research and Translation Department',
                'ar' => 'قسم الترجمة والبحث العلمي.'
                ],
                'description' => [
                    'en' => 'The Scientific Research and Translation Department is dedicated to advancing knowledge and 
raising awareness through a diverse selection of significant articles. This initiative aims to foster 
a profound understanding of key subjects and offer fresh perspectives to the community. By 
covering a wide array of important topics, the department seeks to contribute valuable insights 
and facilitate an informed public discourse.',
                    'ar' => 'يعنى قسم الترجمة والبحث العلمي بتعزيز المعرفة ورفع الوعي من خلال مجموعة متنوعة من المقالات المهمة. يهدف هذا المشروع إلى تعزيز الفهم العميق وتقديم رؤى جديدة للمجتمع. من خلال تغطيته لمجموعة واسعة من المواضيع الهامة، يسعى إلى تقديم رؤى قيمة وتسهيل حوار عام مبني على المعرفة.'
                ],
                'participants_number' => 0,
                'groups_number' => 0,
            ],

            
        ];

        foreach ($departments as $department) {
            \App\Models\Department\Department::create($department);
        }
    }
}
