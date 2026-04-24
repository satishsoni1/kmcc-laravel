<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CollegeDataSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        // ── 1. Academic Programmes ─────────────────────────────────────────────
        DB::table('academic_programmes')->insert([
            ['name'=>'Bachelor of Arts (B.A.)','code'=>'B.A.','level'=>'ug','duration'=>'3 Years','seats'=>120,'description'=>'Covers English, History, Political Science, Economics, Sociology and Geography.','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Science (B.Sc.)','code'=>'B.Sc.','level'=>'ug','duration'=>'3 Years','seats'=>120,'description'=>'Covers Physics, Chemistry, Mathematics, Botany, Zoology and Microbiology.','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Commerce (B.Com.)','code'=>'B.Com.','level'=>'ug','duration'=>'3 Years','seats'=>120,'description'=>'Covers Accounting & Finance, Banking & Finance and Management Studies.','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Mass Media (BMM)','code'=>'BMM','level'=>'ug','duration'=>'3 Years','seats'=>60,'description'=>'Journalism, Advertising, Public Relations and Electronic Media.','is_active'=>1,'order'=>4,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Management Studies (BMS)','code'=>'BMS','level'=>'ug','duration'=>'3 Years','seats'=>60,'description'=>'Marketing, Finance, HR Management and Operations.','is_active'=>1,'order'=>5,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Accounting & Finance (BAF)','code'=>'BAF','level'=>'ug','duration'=>'3 Years','seats'=>60,'description'=>'Advanced Accountancy, Financial Management and Taxation.','is_active'=>1,'order'=>6,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Science in IT (B.Sc.IT)','code'=>'B.Sc.IT','level'=>'ug','duration'=>'3 Years','seats'=>60,'description'=>'Programming, Database, Networking and Web Technologies.','is_active'=>1,'order'=>7,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Bachelor of Computer Science (BCS)','code'=>'BCS','level'=>'ug','duration'=>'3 Years','seats'=>60,'description'=>'Data Structures, Algorithms, Operating Systems and Software Engineering.','is_active'=>1,'order'=>8,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Master of Science (M.Sc.) Chemistry','code'=>'M.Sc.','level'=>'pg','duration'=>'2 Years','seats'=>30,'description'=>'Advanced Organic, Inorganic and Physical Chemistry.','is_active'=>1,'order'=>9,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Master of Arts (M.A.) Marathi','code'=>'M.A.','level'=>'pg','duration'=>'2 Years','seats'=>30,'description'=>'Classical and Modern Marathi Literature, Linguistics.','is_active'=>1,'order'=>10,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Diploma in Computer Applications (DCA)','code'=>'DCA','level'=>'diploma','duration'=>'1 Year','seats'=>40,'description'=>'Fundamental computer skills, MS Office, Internet and basic programming.','is_active'=>1,'order'=>11,'created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Certificate Course in Spoken English','code'=>'CCSE','level'=>'certificate','duration'=>'6 Months','seats'=>50,'description'=>'Communication skills, Grammar and Vocabulary enhancement.','is_active'=>1,'order'=>12,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 2. Academic Documents ──────────────────────────────────────────────
        DB::table('academic_documents')->insert([
            // Academic Calendars
            ['type'=>'academic_calendar','title'=>'Academic Calendar 2024-25','academic_year'=>'2024-25','programme'=>null,'department'=>null,'description'=>'Official academic calendar for the year 2024-25 including examination schedule, holidays and event dates.','file_path'=>'academic-docs/calendar-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'academic_calendar','title'=>'Academic Calendar 2023-24','academic_year'=>'2023-24','programme'=>null,'department'=>null,'description'=>'Official academic calendar for the year 2023-24.','file_path'=>'academic-docs/calendar-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'academic_calendar','title'=>'Academic Calendar 2022-23','academic_year'=>'2022-23','programme'=>null,'department'=>null,'description'=>'Official academic calendar for the year 2022-23.','file_path'=>'academic-docs/calendar-2022-23.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],

            // Timetables
            ['type'=>'timetable','title'=>'Master Timetable — Semester I 2024-25','academic_year'=>'2024-25','programme'=>null,'department'=>null,'description'=>'Consolidated master timetable for all programmes, Semester I.','file_path'=>'academic-docs/master-tt-sem1-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'timetable','title'=>'Master Timetable — Semester II 2024-25','academic_year'=>'2024-25','programme'=>null,'department'=>null,'description'=>'Consolidated master timetable for all programmes, Semester II.','file_path'=>'academic-docs/master-tt-sem2-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],

            // Class Timetables
            ['type'=>'class_timetable','title'=>'F.Y.B.Sc. Class Timetable 2024-25','academic_year'=>'2024-25','programme'=>'F.Y.B.Sc.','department'=>'Science','description'=>null,'file_path'=>'academic-docs/tt-fybsc-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'class_timetable','title'=>'S.Y.B.Com. Class Timetable 2024-25','academic_year'=>'2024-25','programme'=>'S.Y.B.Com.','department'=>'Commerce','description'=>null,'file_path'=>'academic-docs/tt-sybcom-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'class_timetable','title'=>'T.Y.B.A. Class Timetable 2024-25','academic_year'=>'2024-25','programme'=>'T.Y.B.A.','department'=>'Arts','description'=>null,'file_path'=>'academic-docs/tt-tyba-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'class_timetable','title'=>'T.Y.B.Sc.IT Class Timetable 2024-25','academic_year'=>'2024-25','programme'=>'T.Y.B.Sc.IT','department'=>'Science','description'=>null,'file_path'=>'academic-docs/tt-tybscit-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>4,'created_at'=>$now,'updated_at'=>$now],

            // Syllabus
            ['type'=>'syllabus','title'=>'B.A. — Revised Syllabus (CBCS)','academic_year'=>'2024-25','programme'=>'B.A.','department'=>'Arts','description'=>'Choice Based Credit System syllabus for B.A. programmes.','file_path'=>'academic-docs/syllabus-ba-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'B.Sc. — Revised Syllabus (CBCS)','academic_year'=>'2024-25','programme'=>'B.Sc.','department'=>'Science','description'=>'Choice Based Credit System syllabus for B.Sc. programmes.','file_path'=>'academic-docs/syllabus-bsc-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'B.Com. — Revised Syllabus (CBCS)','academic_year'=>'2024-25','programme'=>'B.Com.','department'=>'Commerce','description'=>'Choice Based Credit System syllabus for B.Com. programmes.','file_path'=>'academic-docs/syllabus-bcom-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'BMS — Revised Syllabus','academic_year'=>'2024-25','programme'=>'BMS','department'=>'Commerce','description'=>null,'file_path'=>'academic-docs/syllabus-bms-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>4,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'B.Sc.IT — Revised Syllabus','academic_year'=>'2024-25','programme'=>'B.Sc.IT','department'=>'Science','description'=>null,'file_path'=>'academic-docs/syllabus-bscit-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>5,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'B.A. — Syllabus 2023-24','academic_year'=>'2023-24','programme'=>'B.A.','department'=>'Arts','description'=>null,'file_path'=>'academic-docs/syllabus-ba-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'syllabus','title'=>'B.Sc. — Syllabus 2023-24','academic_year'=>'2023-24','programme'=>'B.Sc.','department'=>'Science','description'=>null,'file_path'=>'academic-docs/syllabus-bsc-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 3. IQAC Documents ──────────────────────────────────────────────────
        DB::table('iqac_documents')->insert([
            // AQAR
            ['type'=>'aqar','title'=>'AQAR 2023-24','academic_year'=>'2023-24','description'=>'Annual Quality Assurance Report submitted to NAAC for the academic year 2023-24.','file_path'=>'iqac-docs/aqar-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'aqar','title'=>'AQAR 2022-23','academic_year'=>'2022-23','description'=>'Annual Quality Assurance Report submitted to NAAC for the academic year 2022-23.','file_path'=>'iqac-docs/aqar-2022-23.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'aqar','title'=>'AQAR 2021-22','academic_year'=>'2021-22','description'=>'Annual Quality Assurance Report for 2021-22.','file_path'=>'iqac-docs/aqar-2021-22.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'aqar','title'=>'AQAR 2020-21','academic_year'=>'2020-21','description'=>'Annual Quality Assurance Report for 2020-21.','file_path'=>'iqac-docs/aqar-2020-21.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],

            // SSS Reports
            ['type'=>'sss_report','title'=>'Student Satisfaction Survey Report 2023-24','academic_year'=>'2023-24','description'=>'Survey conducted among 450+ students on teaching, infrastructure and support services.','file_path'=>'iqac-docs/sss-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'sss_report','title'=>'Student Satisfaction Survey Report 2022-23','academic_year'=>'2022-23','description'=>'Survey report for 2022-23 with analysis and improvement action plan.','file_path'=>'iqac-docs/sss-2022-23.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'sss_report','title'=>'Student Satisfaction Survey Report 2021-22','academic_year'=>'2021-22','description'=>null,'file_path'=>'iqac-docs/sss-2021-22.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],

            // Activity Calendars
            ['type'=>'activity_calendar','title'=>'IQAC Activity Calendar 2024-25','academic_year'=>'2024-25','description'=>'Planned IQAC activities, workshops, audits and committee meetings for 2024-25.','file_path'=>'iqac-docs/activity-calendar-2024-25.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'activity_calendar','title'=>'IQAC Activity Calendar 2023-24','academic_year'=>'2023-24','description'=>'Completed IQAC activities calendar for 2023-24.','file_path'=>'iqac-docs/activity-calendar-2023-24.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],

            // Policies
            ['type'=>'policy','title'=>'Academic Integrity & Anti-Plagiarism Policy','academic_year'=>'2024-25','description'=>'Guidelines for maintaining academic honesty and preventing plagiarism in research and assignments.','file_path'=>'iqac-docs/policy-anti-plagiarism.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'policy','title'=>'Admission Policy','academic_year'=>'2024-25','description'=>'Criteria and procedures for admission to all undergraduate and postgraduate programmes.','file_path'=>'iqac-docs/policy-admission.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'policy','title'=>'Examination & Assessment Policy','academic_year'=>'2024-25','description'=>'Rules governing internal and external examinations, grading and evaluation methods.','file_path'=>'iqac-docs/policy-examination.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'policy','title'=>'Research & Innovation Policy','academic_year'=>'2024-25','description'=>'Framework for promoting research culture, innovation and faculty development.','file_path'=>'iqac-docs/policy-research.pdf','file_type'=>'pdf','is_active'=>1,'order'=>4,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'policy','title'=>'Grievance Redressal Policy','academic_year'=>'2024-25','description'=>'Procedure for filing and resolving student and staff grievances in a time-bound manner.','file_path'=>'iqac-docs/policy-grievance.pdf','file_type'=>'pdf','is_active'=>1,'order'=>5,'created_at'=>$now,'updated_at'=>$now],

            // Meeting Minutes
            ['type'=>'meeting_minutes','title'=>'IQAC Meeting Minutes — January 2025','academic_year'=>'2024-25','description'=>'Minutes of the IQAC meeting held on 15 January 2025. Key agenda: AQAR finalization and Academic Audit.','file_path'=>'iqac-docs/minutes-jan-2025.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'meeting_minutes','title'=>'IQAC Meeting Minutes — October 2024','academic_year'=>'2024-25','description'=>'Minutes of the IQAC meeting held on 10 October 2024. Key agenda: SSS survey planning.','file_path'=>'iqac-docs/minutes-oct-2024.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'meeting_minutes','title'=>'IQAC Meeting Minutes — July 2024','academic_year'=>'2024-25','description'=>'Minutes of the IQAC meeting held on 05 July 2024. Key agenda: Annual Action Plan 2024-25.','file_path'=>'iqac-docs/minutes-jul-2024.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'meeting_minutes','title'=>'IQAC Meeting Minutes — March 2024','academic_year'=>'2023-24','description'=>'Minutes of IQAC meeting, March 2024. Key agenda: AQAR 2022-23 review.','file_path'=>'iqac-docs/minutes-mar-2024.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'meeting_minutes','title'=>'IQAC Meeting Minutes — November 2023','academic_year'=>'2023-24','description'=>'Minutes of IQAC meeting, November 2023. Key agenda: Mid-year academic review.','file_path'=>'iqac-docs/minutes-nov-2023.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 4. NAAC Documents ──────────────────────────────────────────────────
        DB::table('naac_documents')->insert([
            // SSR
            ['type'=>'ssr','title'=>'Self Study Report — 3rd Cycle','cycle'=>'3rd','academic_year'=>'2023-24','grade'=>null,'description'=>'Comprehensive Self Study Report submitted to NAAC for the 3rd Cycle of Accreditation, covering seven criteria of assessment.','file_path'=>'naac-docs/ssr-3rd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'ssr','title'=>'Self Study Report — 2nd Cycle','cycle'=>'2nd','academic_year'=>'2017-18','grade'=>null,'description'=>'SSR submitted for the 2nd Cycle of NAAC Accreditation.','file_path'=>'naac-docs/ssr-2nd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'ssr','title'=>'Self Study Report — 1st Cycle','cycle'=>'1st','academic_year'=>'2010-11','grade'=>null,'description'=>'SSR submitted for the 1st Cycle of NAAC Accreditation.','file_path'=>'naac-docs/ssr-1st-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],

            // NAAC Grading
            ['type'=>'grading','title'=>'NAAC Accreditation — 3rd Cycle (2024)','cycle'=>'3rd','academic_year'=>'2023-24','grade'=>'A+','description'=>'K.M.C. College, Khopoli was awarded A+ grade by NAAC in the 3rd Cycle of accreditation with a CGPA of 3.26.','file_path'=>'naac-docs/certificate-3rd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'grading','title'=>'NAAC Accreditation — 2nd Cycle (2018)','cycle'=>'2nd','academic_year'=>'2017-18','grade'=>'A','description'=>'Awarded "A" grade in the 2nd Cycle of NAAC Accreditation.','file_path'=>'naac-docs/certificate-2nd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'grading','title'=>'NAAC Accreditation — 1st Cycle (2011)','cycle'=>'1st','academic_year'=>'2010-11','grade'=>'B++','description'=>'Awarded "B++" grade in the 1st Cycle of NAAC Accreditation.','file_path'=>'naac-docs/certificate-1st-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],

            // Peer Team Reports
            ['type'=>'peer_team_report','title'=>'Peer Team Visit Report — 3rd Cycle (2024)','cycle'=>'3rd','academic_year'=>'2023-24','grade'=>null,'description'=>'Report submitted by the NAAC Peer Team after the institutional visit conducted in February 2024.','file_path'=>'naac-docs/peer-report-3rd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'peer_team_report','title'=>'Peer Team Visit Report — 2nd Cycle (2018)','cycle'=>'2nd','academic_year'=>'2017-18','grade'=>null,'description'=>'Peer Team Report for the 2nd Cycle visit.','file_path'=>'naac-docs/peer-report-2nd-cycle.pdf','file_type'=>'pdf','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 5. Exam Documents ──────────────────────────────────────────────────
        DB::table('exam_documents')->insert([
            // Exam Calendars
            ['type'=>'calendar','title'=>'Examination Calendar — Semester I 2024-25','academic_year'=>'2024-25','semester'=>'Semester I','programme'=>null,'description'=>'Schedule for all internal and external examinations for Semester I, 2024-25.','file_path'=>'exam-docs/calendar-sem1-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'calendar','title'=>'Examination Calendar — Semester II 2024-25','academic_year'=>'2024-25','semester'=>'Semester II','programme'=>null,'description'=>'Schedule for all internal and external examinations for Semester II, 2024-25.','file_path'=>'exam-docs/calendar-sem2-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'calendar','title'=>'Examination Calendar — Semester I 2023-24','academic_year'=>'2023-24','semester'=>'Semester I','programme'=>null,'description'=>null,'file_path'=>'exam-docs/calendar-sem1-2023-24.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'calendar','title'=>'Examination Calendar — Semester II 2023-24','academic_year'=>'2023-24','semester'=>'Semester II','programme'=>null,'description'=>null,'file_path'=>'exam-docs/calendar-sem2-2023-24.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],

            // Exam Forms
            ['type'=>'exam_form','title'=>'Exam Form — T.Y.B.Sc. Semester VI 2024-25','academic_year'=>'2024-25','semester'=>'Semester VI','programme'=>'T.Y.B.Sc.','description'=>'Last date to submit: 15 February 2025. Late fee applicable after due date.','file_path'=>'exam-docs/form-tybsc-sem6-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'exam_form','title'=>'Exam Form — T.Y.B.Com. Semester VI 2024-25','academic_year'=>'2024-25','semester'=>'Semester VI','programme'=>'T.Y.B.Com.','description'=>'Last date to submit: 15 February 2025.','file_path'=>'exam-docs/form-tybcom-sem6-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'exam_form','title'=>'Exam Form — T.Y.B.A. Semester VI 2024-25','academic_year'=>'2024-25','semester'=>'Semester VI','programme'=>'T.Y.B.A.','description'=>'Last date to submit: 15 February 2025.','file_path'=>'exam-docs/form-tyba-sem6-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'exam_form','title'=>'Exam Form — All Programmes Semester I 2024-25','academic_year'=>'2024-25','semester'=>'Semester I','programme'=>null,'description'=>'Common exam form for all F.Y./S.Y./T.Y. students for Semester I examinations.','file_path'=>'exam-docs/form-sem1-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>4,'created_at'=>$now,'updated_at'=>$now],

            // Hall Tickets
            ['type'=>'hall_ticket','title'=>'Hall Ticket — T.Y.B.Sc. Semester VI 2024-25','academic_year'=>'2024-25','semester'=>'Semester VI','programme'=>'T.Y.B.Sc.','description'=>'Hall tickets are available from 01 March 2025. Students must carry a valid college ID card.','file_path'=>null,'file_type'=>null,'external_link'=>'https://university.example.com/hallticket','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'hall_ticket','title'=>'Hall Ticket — T.Y.B.Com. Semester VI 2024-25','academic_year'=>'2024-25','semester'=>'Semester VI','programme'=>'T.Y.B.Com.','description'=>'Available from 01 March 2025 on the university portal.','file_path'=>null,'file_type'=>null,'external_link'=>'https://university.example.com/hallticket','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'hall_ticket','title'=>'Hall Ticket — All Programmes Semester I 2024-25','academic_year'=>'2024-25','semester'=>'Semester I','programme'=>null,'description'=>'Download hall tickets for Semester I, November 2024 examinations.','file_path'=>'exam-docs/hallticket-sem1-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],

            // Results
            ['type'=>'result','title'=>'Result — T.Y.B.Sc. Semester V 2024-25','academic_year'=>'2024-25','semester'=>'Semester V','programme'=>'T.Y.B.Sc.','description'=>'Results declared on 20 January 2025. Revaluation window: 25 Jan – 05 Feb 2025.','file_path'=>null,'file_type'=>null,'external_link'=>'https://university.example.com/results','is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'result','title'=>'Result — T.Y.B.Com. Semester V 2024-25','academic_year'=>'2024-25','semester'=>'Semester V','programme'=>'T.Y.B.Com.','description'=>'Results declared on 20 January 2025.','file_path'=>null,'file_type'=>null,'external_link'=>'https://university.example.com/results','is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'result','title'=>'Result — T.Y.B.A. Semester V 2024-25','academic_year'=>'2024-25','semester'=>'Semester V','programme'=>'T.Y.B.A.','description'=>'Results declared on 22 January 2025.','file_path'=>null,'file_type'=>null,'external_link'=>'https://university.example.com/results','is_active'=>1,'order'=>3,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'result','title'=>'Result — All Programmes Semester II 2023-24','academic_year'=>'2023-24','semester'=>'Semester II','programme'=>null,'description'=>'Final results for all UG programmes, Semester II, June 2024.','file_path'=>'exam-docs/result-sem2-2023-24.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['type'=>'result','title'=>'Result — All Programmes Semester I 2023-24','academic_year'=>'2023-24','semester'=>'Semester I','programme'=>null,'description'=>'Final results for all UG programmes, Semester I, November 2023.','file_path'=>'exam-docs/result-sem1-2023-24.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 6. Admissions Prospectus ───────────────────────────────────────────
        DB::table('admissions_prospectus')->insert([
            ['title'=>'Admissions Open 2025-26 — College Prospectus','academic_year'=>'2025-26','description'=>'Complete prospectus for the academic year 2025-26. Includes programme details, fee structure, eligibility criteria, scholarship information and admission procedure.','file_path'=>'prospectus/prospectus-2025-26.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['title'=>'Admissions Open 2024-25 — College Prospectus','academic_year'=>'2024-25','description'=>'Complete prospectus for the academic year 2024-25.','file_path'=>'prospectus/prospectus-2024-25.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['title'=>'Admissions Open 2023-24 — College Prospectus','academic_year'=>'2023-24','description'=>'Archive: Prospectus for the academic year 2023-24.','file_path'=>'prospectus/prospectus-2023-24.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>1,'created_at'=>$now,'updated_at'=>$now],
            ['title'=>'B.Voc. / Skill-Based Courses Brochure 2025-26','academic_year'=>'2025-26','description'=>'Brochure for vocational and skill-based certificate courses open for 2025-26 admissions.','file_path'=>'prospectus/brochure-bvoc-2025-26.pdf','file_type'=>'pdf','external_link'=>null,'is_active'=>1,'order'=>2,'created_at'=>$now,'updated_at'=>$now],
        ]);

        // ── 7. Student Council ─────────────────────────────────────────────────
        $council2425 = [
            ['Rahul Sharma',      'President',           'T.Y.B.Com.',  '2024-25', 'Passionate about student welfare and college development. Won Best Speaker at Inter-college Debate 2024.',  1],
            ['Priya Patil',       'Vice President',      'T.Y.B.Sc.',   '2024-25', 'Active member of NSS and Science Association. Organised National Science Day celebrations 2024.',          2],
            ['Akash Jadhav',      'General Secretary',   'T.Y.BMS',     '2024-25', 'Responsible for coordinating all student activities and maintaining communication with the management.',    3],
            ['Sneha Deshmukh',    'Cultural Secretary',  'S.Y.B.A.',    '2024-25', 'Led the college team at Avishkar Research Festival. Passionate about theatre and classical dance.',         4],
            ['Rohan More',        'Sports Secretary',    'S.Y.B.Sc.',   '2024-25', 'State-level Kabaddi player. Organised Inter-collegiate Sports Meet 2024 with 12 participating colleges.',   5],
            ['Kavita Gaikwad',    'Ladies Representative','T.Y.B.A.',   '2024-25', 'Works for women empowerment initiatives on campus. Organised Self-Defence Workshop for students.',          6],
            ['Amit Dalvi',        'Class Representative — Arts',     'T.Y.B.A.',   '2024-25', null, 7],
            ['Pooja Rane',        'Class Representative — Commerce', 'T.Y.B.Com.', '2024-25', null, 8],
            ['Vikas Sawant',      'Class Representative — Science',  'T.Y.B.Sc.', '2024-25',  null, 9],
        ];
        $council2324 = [
            ['Suraj Kulkarni',    'President',           'T.Y.BMS',     '2023-24', 'Led several community service drives. Organised Annual Cultural Fest "Utsav 2024".',                       1],
            ['Meera Joshi',       'Vice President',      'T.Y.B.Sc.',   '2023-24', 'Represented college at Youth Parliament 2023. Organised Blood Donation Camp.',                              2],
            ['Kiran Pawar',       'General Secretary',   'T.Y.B.Com.',  '2023-24', null, 3],
            ['Sunita Naik',       'Cultural Secretary',  'S.Y.B.A.',    '2023-24', null, 4],
            ['Deepak Chavan',     'Sports Secretary',    'T.Y.B.Sc.IT','2023-24',  null, 5],
        ];
        $councilRows = [];
        foreach (array_merge($council2425, $council2324) as $m) {
            $councilRows[] = [
                'name'=>$m[0], 'position'=>$m[1], 'programme'=>$m[2],
                'academic_year'=>$m[3], 'photo_path'=>null, 'bio'=>$m[4],
                'is_active'=>1, 'order'=>$m[5], 'created_at'=>$now, 'updated_at'=>$now,
            ];
        }
        DB::table('student_councils')->insert($councilRows);

        // ── 8. Grievances ──────────────────────────────────────────────────────
        DB::table('grievances')->insert([
            [
                'name'=>'Arjun Mehta','email'=>'arjun.mehta@example.com','phone'=>'9876543210',
                'roll_number'=>'TYBSc/2024/045','programme'=>'T.Y.B.Sc.','year_of_study'=>'Third Year',
                'grievance_type'=>'examination','subject'=>'Marks not updated in portal after revaluation',
                'message'=>'I had applied for revaluation of my Chemistry paper (Semester V) in November 2024. The marks have been updated in my mark sheet but the university portal still shows the old marks. This is affecting my scholarship eligibility assessment. Kindly update the portal at the earliest.',
                'status'=>'resolved','admin_remarks'=>'Forwarded to the examination section. Portal updated on 10 Jan 2025. Student informed via email.',
                'created_at'=>Carbon::now()->subDays(30),'updated_at'=>Carbon::now()->subDays(20),
            ],
            [
                'name'=>'Pooja Desai','email'=>'pooja.desai@example.com','phone'=>'9823456789',
                'roll_number'=>'SYBA/2024/023','programme'=>'S.Y.B.A.','year_of_study'=>'Second Year',
                'grievance_type'=>'infrastructure','subject'=>'Classroom projector in Room 203 not working for 2 weeks',
                'message'=>'The LCD projector in Room 203 (Arts Building) has not been functional for the past two weeks. Teachers are unable to show presentations and it is affecting the quality of lectures for our class. Please get it repaired or provide an alternate arrangement.',
                'status'=>'resolved','admin_remarks'=>'Maintenance team replaced the projector on 15 Jan 2025.',
                'created_at'=>Carbon::now()->subDays(25),'updated_at'=>Carbon::now()->subDays(15),
            ],
            [
                'name'=>'Ravi Shinde','email'=>'ravi.shinde@example.com','phone'=>'9911223344',
                'roll_number'=>'FYBCOM/2024/078','programme'=>'F.Y.B.Com.','year_of_study'=>'First Year',
                'grievance_type'=>'academic','subject'=>'Incorrect attendance marked for Economics lecture',
                'message'=>'My attendance for Economics lecture on 12 February 2025 has been marked absent even though I was present. I have the entry in my attendance proxy register signed by the professor. Please correct this as my attendance percentage will fall below the required 75%.',
                'status'=>'under_review','admin_remarks'=>'Referred to the Economics department for verification.',
                'created_at'=>Carbon::now()->subDays(10),'updated_at'=>Carbon::now()->subDays(5),
            ],
            [
                'name'=>'Sunita Kadam','email'=>'sunita.kadam@example.com','phone'=>'9955112233',
                'roll_number'=>'TYBCOM/2024/101','programme'=>'T.Y.B.Com.','year_of_study'=>'Third Year',
                'grievance_type'=>'financial','subject'=>'Library fine charged incorrectly',
                'message'=>'I was charged a library fine of Rs. 120 for a book that I returned on time on 05 February 2025. I have the receipt of return. Kindly verify and refund the incorrectly charged amount.',
                'status'=>'pending','admin_remarks'=>null,
                'created_at'=>Carbon::now()->subDays(5),'updated_at'=>Carbon::now()->subDays(5),
            ],
            [
                'name'=>'Mahesh Patil','email'=>'mahesh.patil@example.com','phone'=>'9988776655',
                'roll_number'=>'TYBSCIT/2024/015','programme'=>'T.Y.B.Sc.IT','year_of_study'=>'Third Year',
                'grievance_type'=>'academic','subject'=>'Lab practical marks not submitted by faculty',
                'message'=>'The lab practical marks for the Network Security course (Semester V) have not been submitted by the concerned faculty yet, even though the practicals were completed in October 2024. This is causing issues in my internal assessment calculation. Please look into this urgently.',
                'status'=>'pending','admin_remarks'=>null,
                'created_at'=>Carbon::now()->subDays(3),'updated_at'=>Carbon::now()->subDays(3),
            ],
        ]);

        // ── 9. Feedbacks ───────────────────────────────────────────────────────
        DB::table('feedbacks')->insert([
            ['name'=>'Aditya Kumar','email'=>'aditya@example.com','programme'=>'T.Y.B.Sc.','year_of_study'=>'Third Year','feedback_type'=>'teaching','rating'=>5,'message'=>'The teaching quality at this college is excellent. Faculty members are very knowledgeable and always willing to help students outside lecture hours. The practicals are well-organised.','is_read'=>1,'created_at'=>Carbon::now()->subDays(20),'updated_at'=>Carbon::now()->subDays(20)],
            ['name'=>'Sneha Joshi','email'=>'sneha.j@example.com','programme'=>'S.Y.B.Com.','year_of_study'=>'Second Year','feedback_type'=>'infrastructure','rating'=>4,'message'=>'The college building and classrooms are well maintained. The new smart boards in classrooms are very helpful. The Wi-Fi connectivity in the library could be improved.','is_read'=>1,'created_at'=>Carbon::now()->subDays(18),'updated_at'=>Carbon::now()->subDays(18)],
            ['name'=>'Kiran Sawant','email'=>null,'programme'=>'T.Y.B.A.','year_of_study'=>'Third Year','feedback_type'=>'library','rating'=>4,'message'=>'The library has a good collection of reference books and journals. Digital access to e-resources is a great initiative. Seating capacity could be increased during exam periods.','is_read'=>1,'created_at'=>Carbon::now()->subDays(15),'updated_at'=>Carbon::now()->subDays(15)],
            ['name'=>'Priti Naik','email'=>'priti@example.com','programme'=>'F.Y.B.Sc.IT','year_of_study'=>'First Year','feedback_type'=>'general','rating'=>5,'message'=>'I am very happy to be a student of KMC College. The faculty is supportive, the campus is clean and the overall environment is conducive to learning. The orientation programme was very informative.','is_read'=>0,'created_at'=>Carbon::now()->subDays(12),'updated_at'=>Carbon::now()->subDays(12)],
            ['name'=>'Rohit Chavan','email'=>'rohit.c@example.com','programme'=>'T.Y.BMS','year_of_study'=>'Third Year','feedback_type'=>'teaching','rating'=>3,'message'=>'Most faculty members are good but a few teachers tend to finish the syllabus very fast without ensuring student understanding. More interactive sessions and case studies would be helpful for BMS students.','is_read'=>0,'created_at'=>Carbon::now()->subDays(8),'updated_at'=>Carbon::now()->subDays(8)],
            ['name'=>'Ananya Sharma','email'=>'ananya.s@example.com','programme'=>'S.Y.BAF','year_of_study'=>'Second Year','feedback_type'=>'infrastructure','rating'=>2,'message'=>'The canteen needs improvement. The food quality is inconsistent and the seating space is insufficient during lunch hours. There are often long queues and some items run out by 12 PM. A second serving window would help.','is_read'=>0,'created_at'=>Carbon::now()->subDays(6),'updated_at'=>Carbon::now()->subDays(6)],
            ['name'=>'Vikram Rao','email'=>null,'programme'=>'T.Y.B.Sc.','year_of_study'=>'Third Year','feedback_type'=>'sports','rating'=>5,'message'=>'The sports facilities are fantastic. The new badminton court and the recently resurfaced basketball court are excellent. Coaches are very encouraging and competitive. Our college sports team has improved greatly.','is_read'=>0,'created_at'=>Carbon::now()->subDays(3),'updated_at'=>Carbon::now()->subDays(3)],
            ['name'=>'Deepika More','email'=>'deepika.m@example.com','programme'=>'F.Y.B.A.','year_of_study'=>'First Year','feedback_type'=>'general','rating'=>4,'message'=>'The college has a great culture of inclusivity. I feel safe and welcome here. The student council is very active and organises great events. Looking forward to a great three years here.','is_read'=>0,'created_at'=>Carbon::now()->subDays(1),'updated_at'=>Carbon::now()->subDays(1)],
        ]);

        // ── 10. Contact Submissions ────────────────────────────────────────────
        DB::table('contact_submissions')->insert([
            [
                'name'=>'Mr. Sanjay Bhandari','email'=>'sanjay.bhandari@example.com','phone'=>'9876501234',
                'subject'=>'Enquiry about M.Sc. Chemistry Admission 2025-26',
                'message'=>'I would like to know the eligibility criteria and admission procedure for M.Sc. Chemistry for the academic year 2025-26. Also please let me know if there are any entrance examinations or merit-based admissions. What is the last date for application?',
                'status'=>'replied','admin_reply'=>'Dear Mr. Bhandari, thank you for your interest. M.Sc. Chemistry admissions are merit-based with a minimum 50% in B.Sc. Chemistry. Applications open from 1 June 2025. Please visit the admissions page for details.',
                'created_at'=>Carbon::now()->subDays(14),'updated_at'=>Carbon::now()->subDays(12),
            ],
            [
                'name'=>'Mrs. Leela Nair','email'=>'leela.nair@example.com','phone'=>'9823001122',
                'subject'=>'Fee Structure for B.Com. 2025-26',
                'message'=>'My daughter is appearing for HSC this year and wants to pursue B.Com. Could you please share the complete fee structure for B.Com. for the academic year 2025-26, including tuition fees, laboratory fees, and any other charges?',
                'status'=>'read','admin_reply'=>null,
                'created_at'=>Carbon::now()->subDays(7),'updated_at'=>Carbon::now()->subDays(6),
            ],
            [
                'name'=>'Prof. Anil Deshmukh','email'=>'anil.deshmukh@example.com','phone'=>'9900112233',
                'subject'=>'Request for Seminar Hall Booking',
                'message'=>'I am a professor at a nearby institution and would like to inquire about booking the seminar hall at KMC College for an academic conference on 22 March 2025. The event will be attended by approximately 80 participants. Please let me know the availability and charges.',
                'status'=>'replied','admin_reply'=>'Dear Prof. Deshmukh, the seminar hall is available on 22 March 2025. Please contact the administrative office at 95116 16009 to confirm the booking and discuss the terms.',
                'created_at'=>Carbon::now()->subDays(5),'updated_at'=>Carbon::now()->subDays(4),
            ],
            [
                'name'=>'Rahul Verma','email'=>'rahul.v@example.com','phone'=>null,
                'subject'=>'Scholarship availability for SC/ST students',
                'message'=>'I belong to SC category and want to know what government scholarships are available for students admitted to KMC College. Also, what is the process for applying and what documents are required?',
                'status'=>'read','admin_reply'=>null,
                'created_at'=>Carbon::now()->subDays(3),'updated_at'=>Carbon::now()->subDays(2),
            ],
            [
                'name'=>'Nisha Kulkarni','email'=>'nisha.k@example.com','phone'=>'9811223344',
                'subject'=>'Sports facilities and NCC/NSS enrolment',
                'message'=>'I am keen on joining NCC and also want to know what sports facilities are available at the college. Do you have a swimming pool? I am a district-level swimmer and want to continue training during college.',
                'status'=>'new','admin_reply'=>null,
                'created_at'=>Carbon::now()->subDays(1),'updated_at'=>Carbon::now()->subDays(1),
            ],
            [
                'name'=>'Mr. Prakash Ghosh','email'=>'prakash.ghosh@example.com','phone'=>'9977665544',
                'subject'=>'Campus placement record and industry tie-ups',
                'message'=>'We are a mid-sized IT company based in Navi Mumbai and are interested in participating in campus placements at KMC College. Could you share the placement statistics for the last 2 years and the procedure to register as a recruiting company?',
                'status'=>'new','admin_reply'=>null,
                'created_at'=>Carbon::now()->subHours(5),'updated_at'=>Carbon::now()->subHours(5),
            ],
        ]);
    }
}
