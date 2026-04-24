<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class NaacPortalSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // Truncate np_portal tables to allow idempotent re-seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        foreach (['np_activity_logs','np_portal_notifications','np_feedback_answers','np_feedback_responses','np_feedback_questions','np_feedback_forms','np_task_comments','np_task_user','np_tasks','np_ssr_sections','np_aqar_sections','np_aqar_reports','np_document_criterion','np_documents','np_metric_entries','np_metrics','np_criteria','np_best_practices','np_accreditation_cycles','np_college_user','np_courses','np_departments','np_colleges'] as $t) {
            DB::table($t)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // ── 1. College ─────────────────────────────────────────────────────────
        $collegeId = DB::table('np_colleges')->insertGetId([
            'name'                    => 'K.M.C. College, Khopoli',
            'short_name'              => 'KMCC',
            'code'                    => 'KMCC001',
            'address'                 => 'Khopoli Road, Near Bus Stand',
            'city'                    => 'Khopoli',
            'state'                   => 'Maharashtra',
            'pin'                     => '410203',
            'phone'                   => '02192-261234',
            'email'                   => 'iqac@kmcc.edu.in',
            'website'                 => 'https://www.kmcckopoli.edu.in',
            'principal_name'          => 'Dr. Suresh Wagh',
            'iqac_coordinator_name'   => 'Dr. Priya Deshmukh',
            'university_affiliation'  => 'University of Mumbai',
            'ugc_recognition'         => '2f & 12B',
            'aishe_code'              => 'C-40217',
            'established_year'        => 1983,
            'type'                    => 'Aided',
            'vision'                  => 'To be a centre of excellence nurturing well-rounded graduates who contribute meaningfully to society through knowledge, values, and innovation.',
            'mission'                 => 'To provide quality education through holistic development, research, extension activities, and value-based teaching-learning processes that prepare students for lifelong learning.',
            'current_naac_grade'      => 'A+',
            'current_cgpa'            => '3.26',
            'last_accreditation_year' => 2024,
            'next_accreditation_year' => 2029,
            'is_active'               => true,
            'created_at'              => $now,
            'updated_at'              => $now,
        ]);

        // ── 2. Departments ─────────────────────────────────────────────────────
        $deptIds = [];
        foreach ([
            ['Mathematics', 'MATH', 'Dr. A.K. Sharma', 'hod.math@kmcc.edu.in', 8, 320],
            ['Physics',     'PHY',  'Dr. R.M. Patil',  'hod.phy@kmcc.edu.in',  6, 260],
            ['Chemistry',   'CHEM', 'Dr. S.V. Joshi',  'hod.chem@kmcc.edu.in', 7, 280],
            ['Commerce',    'COM',  'Prof. N.D. More',  'hod.com@kmcc.edu.in',  10, 480],
            ['Economics',   'ECO',  'Prof. K.R. Naik',  'hod.eco@kmcc.edu.in',  5, 200],
            ['English',     'ENG',  'Dr. M.S. Gaikwad', 'hod.eng@kmcc.edu.in',  6, 210],
            ['BMS',         'BMS',  'Prof. D.P. Rane',  'hod.bms@kmcc.edu.in',  4, 120],
        ] as [$name, $code, $hod, $email, $faculty, $students]) {
            $deptIds[$code] = DB::table('np_departments')->insertGetId([
                'college_id'    => $collegeId,
                'name'          => $name,
                'code'          => $code,
                'hod_name'      => $hod,
                'hod_email'     => $email,
                'faculty_count' => $faculty,
                'student_count' => $students,
                'is_active'     => true,
                'created_at'    => $now,
                'updated_at'    => $now,
            ]);
        }

        // ── 3. Courses ─────────────────────────────────────────────────────────
        foreach ([
            ['Bachelor of Science', 'B.Sc.', $deptIds['MATH'], 'UG', 3, 120],
            ['Bachelor of Commerce', 'B.Com.', $deptIds['COM'], 'UG', 3, 120],
            ['Bachelor of Arts', 'B.A.', $deptIds['ENG'], 'UG', 3, 80],
            ['Bachelor of Management Studies', 'BMS', $deptIds['BMS'], 'UG', 3, 60],
            ['Master of Commerce', 'M.Com.', $deptIds['COM'], 'PG', 2, 40],
            ['Master of Science (Mathematics)', 'M.Sc. Math', $deptIds['MATH'], 'PG', 2, 30],
        ] as [$name, $code, $deptId, $level, $dur, $intake]) {
            DB::table('np_courses')->insert(['college_id' => $collegeId, 'department_id' => $deptId, 'name' => $name, 'code' => $code, 'level' => $level, 'duration_years' => $dur, 'intake_capacity' => $intake, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now]);
        }

        // ── 4. NAAC 7 Criteria + Metrics ──────────────────────────────────────
        $criteriaData = [
            [1, 'Curricular Aspects', 'Curriculum design, implementation, and academic flexibility.', 150, [
                ['1.1.1', 'Programmes offered and their academic flexibility', 'Number of Programmes with flexibility in the number of credits to be completed.', 20, 1],
                ['1.1.2', 'Add-on/Certificate programmes', 'Number of Add-on/Certificate programmes offered.', 15, 2],
                ['1.2.1', 'Choice Based Credit System (CBCS)', 'Percentage of courses in CBCS/elective course system.', 20, 3],
                ['1.3.1', 'Integration of crosscutting issues', 'Institution integrates crosscutting issues relevant to Gender, Environment, Human Values.', 15, 4],
                ['1.4.1', 'Feedback mechanism for curriculum development', 'Institution obtains feedback from stakeholders for curriculum development.', 15, 5],
            ]],
            [2, 'Teaching-Learning and Evaluation', 'Student enrolment, diversity, learning processes, and assessment.', 300, [
                ['2.1.1', 'Enrolment percentage', 'Enrolment percentage of students in the eligible age group.', 20, 1],
                ['2.1.2', 'Percentage of seats filled against reserved categories', 'Average percentage of seats filled as per reservation norm.', 15, 2],
                ['2.2.1', 'Student Full Time Teacher Ratio (SFTR)', 'Student-Full time Teacher Ratio.', 20, 3],
                ['2.3.1', 'Student-centric methods', 'Percentage of teachers using ICT for effective teaching.', 25, 4],
                ['2.4.1', 'Full time teachers against sanctioned posts', 'Percentage of full time teachers against sanctioned posts.', 20, 5],
                ['2.5.1', 'Mechanism of internal/external assessment', 'Mechanism for continuous assessment of student performance.', 20, 6],
                ['2.6.1', 'Programme outcomes and course outcomes', 'Programme and course outcomes attainment through results.', 25, 7],
            ]],
            [3, 'Research, Innovations and Extension', 'Research output, innovation, collaboration, and extension activities.', 260, [
                ['3.1.1', 'Grants received from Government and non-Government', 'Grants for research projects sponsored by the government.', 30, 1],
                ['3.2.1', 'Research papers published per teacher', 'Number of research papers published per teacher in Scopus/Web of Science.', 20, 2],
                ['3.3.1', 'Number of books/chapters published', 'Total number of books and chapters in edited volumes published.', 20, 3],
                ['3.4.1', 'Collaborative research activities', 'Extension and Outreach Programmes conducted in collaboration with NGOs.', 15, 4],
                ['3.5.1', 'MoUs, collaborations, and functional linkages', 'Number of functional MoUs/linkages with institutions.', 20, 5],
            ]],
            [4, 'Infrastructure and Learning Resources', 'Physical infrastructure, IT facilities, library, and sports.', 100, [
                ['4.1.1', 'Adequacy and optimal utilization of infrastructure', 'Availability of adequate infrastructure for teaching-learning.', 15, 1],
                ['4.1.2', 'Sports facilities including playground', 'Availability of sports and games facilities.', 10, 2],
                ['4.2.1', 'Library — ICT infrastructure and automation', 'Library is automated, has internet access and subscriptions.', 20, 3],
                ['4.3.1', 'IT Infrastructure update and modernisation', 'Availability and quality of IT infrastructure.', 20, 4],
                ['4.4.1', 'Expenditure on maintenance of physical facilities', 'Average expenditure on maintenance of physical facilities.', 15, 5],
            ]],
            [5, 'Student Support and Progression', 'Scholarship, mentoring, career guidance, alumni, and progression.', 130, [
                ['5.1.1', 'Students benefited by scholarships and freeships', 'Percentage of students benefited by scholarships and freeships.', 20, 1],
                ['5.1.2', 'Capacity building and skills enhancement', 'Percentage of students who participated in skill development programmes.', 15, 2],
                ['5.2.1', 'Students qualifying in competitive exams', 'Percentage of students qualifying in competitive exams like NET, GATE.', 20, 3],
                ['5.3.1', 'Participation of students in sports/cultural activities', 'Number of awards/medals won by students in cultural and sports activities.', 15, 4],
                ['5.4.1', 'Alumni contribution to institutional development', 'Alumni association activities and contribution to institutional development.', 10, 5],
            ]],
            [6, 'Governance, Leadership and Management', 'Strategic planning, finance, HR, and institutional best practices.', 100, [
                ['6.1.1', 'Effective leadership initiatives', 'Effective leadership shown by the institution for quality sustenance.', 15, 1],
                ['6.2.1', 'Strategy development and deployment', 'Perspective plan/development plan prepared by the institution.', 15, 2],
                ['6.3.1', 'Faculty empowerment strategies', 'Percentage of teachers provided with financial support for attending conferences.', 15, 3],
                ['6.4.1', 'Resource mobilisation through various channels', 'Total grants received for research and development.', 15, 4],
                ['6.5.1', 'Internal Quality Assurance System', 'IQAC activities and quality culture as evidenced through reports.', 20, 5],
            ]],
            [7, 'Institutional Values and Best Practices', 'Gender equity, environmental sustainability, innovations, and best practices.', 50, [
                ['7.1.1', 'Measures for Gender Equity', 'Number of gender equity awareness programmes conducted.', 10, 1],
                ['7.1.2', 'Environmental sustainability measures', 'Annual power requirement met through renewable energy sources.', 10, 2],
                ['7.1.3', 'Green campus initiatives', 'Number of initiatives for energy conservation and environment sustainability.', 10, 3],
                ['7.2.1', 'Best practices described in AQAR', 'Number of best practices as per the defined format institutionalized.', 15, 4],
                ['7.3.1', 'Institutional distinctiveness', 'Unique features of the institution that distinguish it from others.', 15, 5],
            ]],
        ];

        $criterionIds = [];
        $metricMap    = [];
        foreach ($criteriaData as [$num, $name, $desc, $weight, $metrics]) {
            $cId = DB::table('np_criteria')->insertGetId(['number' => $num, 'name' => $name, 'description' => $desc, 'weightage' => $weight, 'is_active' => true, 'created_at' => $now, 'updated_at' => $now]);
            $criterionIds[$num] = $cId;
            foreach ($metrics as [$code, $mname, $mdesc, $maxScore, $order]) {
                $mId = DB::table('np_metrics')->insertGetId(['criterion_id' => $cId, 'code' => $code, 'name' => $mname, 'description' => $mdesc, 'max_score' => $maxScore, 'requires_documents' => true, 'is_active' => true, 'order' => $order, 'created_at' => $now, 'updated_at' => $now]);
                $metricMap[$code] = $mId;
            }
        }

        // ── 5. Ensure admin user exists & link to college ─────────────────────
        $admin = DB::table('users')->where('email', 'sonisatish119@gmail.com')->first();
        if (!$admin) {
            $adminId = DB::table('users')->insertGetId([
                'name'              => 'Admin',
                'email'             => 'sonisatish119@gmail.com',
                'password'          => Hash::make('Kmc@Admin2025'),
                'email_verified_at' => $now,
                'created_at'        => $now,
                'updated_at'        => $now,
            ]);
            $admin = DB::table('users')->find($adminId);
        }
        DB::table('np_college_user')->insertOrIgnore(['college_id' => $collegeId, 'user_id' => $admin->id, 'portal_role' => 'super_admin', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now]);

        // ── 6. Sample Metric Entries ───────────────────────────────────────────
        $sampleEntries = [
            ['1.1.1', 'approved', 18.5, '2024-25', 'All UG and PG programmes offer elective/optional papers. B.Sc. offers 6 elective courses across semesters.', json_encode(['elective_papers' => 6, 'programmes_with_flexibility' => 4])],
            ['1.1.2', 'approved', 13,   '2024-25', 'College offers 4 add-on certificate programmes: Tally, Soft Skills, Environmental Studies, Spoken English.', null],
            ['2.1.1', 'submitted', 17,  '2024-25', 'Total enrolment: 1870 students across all programmes for 2024-25.', null],
            ['2.4.1', 'approved', 19,   '2024-25', 'Out of 46 sanctioned teaching posts, 44 are filled. 95.65% posts filled.', null],
            ['3.2.1', 'draft', 14,      '2024-25', '28 research papers published by faculty in Scopus/Web of Science indexed journals in 2024-25.', null],
            ['4.2.1', 'approved', 18,   '2024-25', 'Library automated with Koha LMS. 24 print journals + 10 e-journal databases subscribed.', null],
            ['5.1.1', 'approved', 19,   '2024-25', '68% of students received scholarships from Government and non-Government sources.', null],
            ['6.5.1', 'submitted', 17,  '2024-25', 'IQAC conducted 4 meetings, 2 academic audits, and one FDP during 2024-25.', null],
            ['7.2.1', 'approved', 14,   '2024-25', '2 best practices documented: Green Campus Initiative and Peer Mentoring Programme.', null],
        ];
        $userId = $admin?->id ?? 1;
        foreach ($sampleEntries as [$code, $status, $score, $year, $desc, $data]) {
            if (!isset($metricMap[$code])) continue;
            DB::table('np_metric_entries')->insert(['college_id' => $collegeId, 'metric_id' => $metricMap[$code], 'academic_year' => $year, 'data_value' => $data, 'description' => $desc, 'score' => $score, 'status' => $status, 'assigned_to' => $userId, 'deadline' => Carbon::parse('2025-03-31'), 'created_at' => $now, 'updated_at' => $now]);
        }

        // ── 7. Accreditation Cycles ────────────────────────────────────────────
        foreach ([
            ['3rd', 2024, 'A+', '3.26', '2029-01-01', 'February 2024', 'Significant improvement in research output, infrastructure development, and student progression.'],
            ['2nd', 2018, 'A',  '3.08', '2023-01-01', 'November 2018', 'Recognized for outstanding curricular innovations and student support services.'],
            ['1st', 2011, 'B++','2.68', '2016-01-01', 'September 2011', 'First cycle of NAAC accreditation with B++ grade.'],
        ] as [$cycle, $year, $grade, $cgpa, $validUpto, $visitDate, $highlights]) {
            DB::table('np_accreditation_cycles')->insert(['college_id' => $collegeId, 'cycle' => $cycle, 'year_of_accreditation' => $year, 'grade' => $grade, 'cgpa' => $cgpa, 'valid_upto' => $validUpto, 'peer_team_visit_date' => $visitDate, 'highlights' => $highlights, 'created_at' => $now, 'updated_at' => $now]);
        }

        // ── 8. Sample AQAR Report ──────────────────────────────────────────────
        $aqarId = DB::table('np_aqar_reports')->insertGetId(['college_id' => $collegeId, 'academic_year' => '2024-25', 'title' => 'Annual Quality Assurance Report 2024-25', 'status' => 'draft', 'created_by' => $userId, 'created_at' => $now, 'updated_at' => $now]);
        DB::table('np_aqar_sections')->insert([
            ['aqar_id' => $aqarId, 'criterion_id' => null,               'section_key' => 'profile',       'title' => 'Part A — Institutional Data',       'content' => 'Name: K.M.C. College, Khopoli | Affiliating University: University of Mumbai | Year of Establishment: 1983 | Type of Institution: Arts, Science, Commerce', 'order' => 0, 'is_complete' => true,  'created_at' => $now, 'updated_at' => $now],
            ['aqar_id' => $aqarId, 'criterion_id' => $criterionIds[1],   'section_key' => 'c1',            'title' => 'Criterion 1 — Curricular Aspects',  'content' => 'The college offers 6 UG and 2 PG programmes. CBCS is implemented for all UG programmes as per University of Mumbai guidelines. 4 add-on certificate courses were offered during 2024-25.',                           'order' => 1, 'is_complete' => true,  'created_at' => $now, 'updated_at' => $now],
            ['aqar_id' => $aqarId, 'criterion_id' => $criterionIds[2],   'section_key' => 'c2',            'title' => 'Criterion 2 — Teaching-Learning',   'content' => 'Total enrolment: 1870 students. Student-Teacher Ratio: 40:1. 90% of teachers use ICT tools for effective teaching. 95.65% faculty posts filled.',                                                                        'order' => 2, 'is_complete' => true,  'created_at' => $now, 'updated_at' => $now],
            ['aqar_id' => $aqarId, 'criterion_id' => $criterionIds[3],   'section_key' => 'c3',            'title' => 'Criterion 3 — Research & Extension', 'content' => '28 research papers published. 2 minor research projects completed. 5 extension activities conducted in collaboration with local NGOs.',                                                                                'order' => 3, 'is_complete' => false, 'created_at' => $now, 'updated_at' => $now],
            ['aqar_id' => $aqarId, 'criterion_id' => null,               'section_key' => 'best_practices','title' => 'Part C — Best Practices',           'content' => null,                                                                                                                                                                                                                            'order' => 9, 'is_complete' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);

        // ── 9. Sample Tasks ────────────────────────────────────────────────────
        foreach ([
            ['Upload Faculty List 2024-25 for Criterion 2.4.1', 'Upload the verified list of full-time faculty with their qualifications and experience.', 'high', $criterionIds[2], $metricMap['2.4.1'], 'open',  '2025-02-28'],
            ['Prepare Research Data for C3.2.1', 'Compile all Scopus/Web of Science papers published by faculty in 2024-25.', 'high', $criterionIds[3], $metricMap['3.2.1'], 'in_progress', '2025-02-15'],
            ['Upload Library Automation Reports for C4.2.1', 'Prepare and upload evidence of library automation and e-resource subscriptions.', 'medium', $criterionIds[4], $metricMap['4.2.1'], 'open', '2025-03-15'],
            ['Prepare Student Scholarship Data C5.1.1', 'Compile scholarship data from 2024-25 for all government and private scholarships.', 'medium', $criterionIds[5], $metricMap['5.1.1'], 'approved', null],
            ['IQAC Meeting — March 2025', 'Convene IQAC meeting to review AQAR progress and plan upcoming activities.', 'urgent', $criterionIds[6], null, 'open', '2025-03-10'],
        ] as [$title, $desc, $priority, $criterionId, $metricId, $status, $dueDate]) {
            DB::table('np_tasks')->insert(['college_id' => $collegeId, 'created_by' => $userId, 'criterion_id' => $criterionId, 'metric_id' => $metricId, 'title' => $title, 'description' => $desc, 'priority' => $priority, 'status' => $status, 'due_date' => $dueDate, 'academic_year' => '2024-25', 'created_at' => $now, 'updated_at' => $now]);
        }

        // ── 10. Best Practices ─────────────────────────────────────────────────
        foreach ([
            ['Green Campus Initiative', 'To create an eco-friendly campus with reduced carbon footprint.', 'Increasing environmental awareness among students and staff.', 'Installation of solar panels (30 kW), rainwater harvesting pits, vermicompost units, and plastic-free campus declaration.', 'Reduced electricity bill by 18%. 200+ students participated in environmental awareness drives.', 'Initial resistance from canteen vendors for plastic-free policy.', '2024-25', true],
            ['Peer Mentoring Programme', 'To improve academic outcomes and emotional well-being of first-year students.', 'High dropout rate observed among first-year students due to adjustment issues.', 'Senior students (2nd/3rd year) trained as peer mentors. Each mentor assigned 5 mentees. Monthly meetings and progress tracking through IQAC.', '85% of mentored students showed improved attendance. Dropout rate reduced from 12% to 4%.', 'Matching mentors with mentees from different backgrounds required careful planning.', '2023-24', true],
        ] as [$title, $obj, $ctx, $desc, $evidence, $problems, $year, $published]) {
            DB::table('np_best_practices')->insert(['college_id' => $collegeId, 'title' => $title, 'objective' => $obj, 'context' => $ctx, 'practice_description' => $desc, 'evidence_of_success' => $evidence, 'problems_encountered' => $problems, 'academic_year' => $year, 'is_published' => $published, 'created_at' => $now, 'updated_at' => $now]);
        }

        // ── 11. Feedback Form ──────────────────────────────────────────────────
        $formId = DB::table('np_feedback_forms')->insertGetId(['college_id' => $collegeId, 'title' => 'Student Satisfaction Survey 2024-25', 'description' => 'Please provide honest feedback to help us improve the quality of education and services at the college.', 'target_audience' => 'student', 'is_active' => true, 'is_anonymous' => true, 'academic_year' => '2024-25', 'start_date' => '2025-01-01', 'end_date' => '2025-03-31', 'created_by' => $userId, 'created_at' => $now, 'updated_at' => $now]);
        foreach ([
            ['How would you rate the overall quality of teaching?', 'rating', null, true, 1],
            ['How would you rate the library facilities?', 'rating', null, true, 2],
            ['How would you rate the sports and extracurricular facilities?', 'rating', null, true, 3],
            ['Are the examination schedules communicated in advance?', 'yes_no', null, true, 4],
            ['Which area do you feel needs the most improvement?', 'mcq', json_encode(['Teaching','Library','Infrastructure','Sports','Canteen','Administration']), false, 5],
            ['Any suggestions or feedback for improving the college?', 'text', null, false, 6],
        ] as [$question, $type, $options, $required, $order]) {
            DB::table('np_feedback_questions')->insert(['form_id' => $formId, 'question' => $question, 'type' => $type, 'options' => $options, 'is_required' => $required, 'order' => $order]);
        }

        // ── 12. Activity Log ───────────────────────────────────────────────────
        foreach ([
            'College profile created',
            'NAAC criteria and metrics seeded (7 criteria, 34 metrics)',
            'Accreditation cycles added (3rd: A+, 2nd: A, 1st: B++)',
            'AQAR 2024-25 created with draft sections',
            'Student Satisfaction Survey form created',
            '5 committee tasks created and assigned',
        ] as $desc) {
            DB::table('np_activity_logs')->insert(['college_id' => $collegeId, 'user_id' => $userId, 'action' => 'seeded', 'description' => $desc, 'created_at' => $now]);
        }

        $this->command->info('NAAC Portal seeded: 1 college, 7 departments, 7 criteria, 34 metrics, sample entries, tasks, AQAR, feedback form.');
    }
}
