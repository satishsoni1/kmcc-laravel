<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommitteeMemberSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\CommitteeMember::truncate();

        // ── Governing Body (23 members from Prospectus) ──────────────────
        $gb = [
            [1,  'Shri. Santosh Gurunath Jangam',       'Chairman',                           'K.T.S.P. Mandal, Khopoli',                  'President'],
            [2,  'Shri. Abubakar Aadam Jalgaonkar',     'Vice-Chairman',                      'K.T.S.P. Mandal, Khopoli',                  'Vice-President'],
            [3,  'Shri. Kishor Balkrushna Patil',        'Secretary',                          'K.T.S.P. Mandal, Khopoli',                  'Member Secretary'],
            [4,  'Shri. Mubarak Shafi Tadavi',           'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [5,  'Shri. Suresh Ramchandra Patil',        'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [6,  'Shri. Yusuf Abubakar Jalgaonkar',     'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [7,  'Shri. Firoz Abdulrehman Shaikh',       'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [8,  'Shri. Saddam Hussain Ansari',          'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [9,  'Shri. Rafiq Ismail Shaikh',            'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [10, 'Shri. Arif Salim Shaikh',              'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [11, 'Shri. Imtiyaz Riyaz Jalgaonkar',      'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [12, 'Shri. Mohd. Rafi Aadam Jalgaonkar',   'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [13, 'Shri. Zakir Hussain Ansari',           'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [14, 'Shri. Salim Usman Pinjari',            'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [15, 'Shri. Mohd. Iqbal Shaikh',             'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [16, 'Shri. Yunus Ismail Shaikh',            'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [17, 'Shri. Farooque Ibrahim Shaikh',        'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [18, 'Shri. Aslam Usman Pinjari',            'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [19, 'Shri. Abdul Salam Shaikh',             'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [20, 'Shri. Mohd. Sharif Mansuri',           'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [21, 'Shri. Rafiq Usman Jalgaonkar',         'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [22, 'Shri. Anis Hussain Ansari',             'Member',                             'K.T.S.P. Mandal, Khopoli',                  'Member'],
            [23, 'Mr. Pradeep Deshmukh',                 'Ex-Officio Secretary',               'K.M.C. College, Khopoli',                   'Ex-Officio Secretary'],
        ];

        foreach ($gb as [$sr, $name, $desg, $org, $role]) {
            \App\Models\CommitteeMember::create([
                'serial_number'  => $sr,
                'sort_order'     => $sr,
                'name'           => $name,
                'designation'    => $desg,
                'organization'   => $org,
                'role'           => $role,
                'committee_type' => 'governing_body',
                'is_active'      => true,
            ]);
        }

        // ── CDC – College Development Committee (17 members from Prospectus) ──
        $cdc = [
            [1,  'Dr. Dayanand Prabhu Gaikwad',         'I/c Principal',                      'K.M.C. College, Khopoli',                   'Chairperson'],
            [2,  'Dr. Amol Arjun Nagargoje',             'IQAC Co-ordinator',                  'K.M.C. College, Khopoli',                   'Member'],
            [3,  'Dr. Archana Ashok Vaidya',             'HOD, Chemistry',                     'K.M.C. College, Khopoli',                   'Member'],
            [4,  'Dr. Suryakant Rajaram Patil',          'HOD, Physics',                       'K.M.C. College, Khopoli',                   'Member'],
            [5,  'Dr. Vandana Anil Jadhav',              'HOD, Botany',                        'K.M.C. College, Khopoli',                   'Member'],
            [6,  'Prof. Priya Pradeep Kadam',            'HOD, Mathematics',                   'K.M.C. College, Khopoli',                   'Member'],
            [7,  'Dr. Sandeep Govind Shinde',            'HOD, Commerce',                      'K.M.C. College, Khopoli',                   'Member'],
            [8,  'Dr. Nilima Vilas Patil',               'HOD, Marathi',                       'K.M.C. College, Khopoli',                   'Member'],
            [9,  'Prof. Sanjay Dattatray Gaikwad',       'HOD, English',                       'K.M.C. College, Khopoli',                   'Member'],
            [10, 'Prof. Reena Ramesh Sawant',            'HOD, Economics',                     'K.M.C. College, Khopoli',                   'Member'],
            [11, 'Shri. Santosh Gurunath Jangam',        'Chairman',                           'K.T.S.P. Mandal, Khopoli',                  'Management Representative'],
            [12, 'Shri. Kishor Balkrushna Patil',        'Secretary',                          'K.T.S.P. Mandal, Khopoli',                  'Management Representative'],
            [13, 'Shri. Abubakar Aadam Jalgaonkar',     'Vice-Chairman',                      'K.T.S.P. Mandal, Khopoli',                  'Management Representative'],
            [14, 'Shri. Rahul Suresh Patil',             'Industry Expert',                    'Local Industry, Khopoli',                   'Industry Representative'],
            [15, 'Shri. Vinod Kumar Sharma',             'Industry Expert',                    'MIDC, Khopoli',                             'Industry Representative'],
            [16, 'Ku. Priya Anil Sawant',                'Student Representative',             'K.M.C. College, Khopoli',                   'Student Representative'],
            [17, 'Ku. Snehal Ganesh Patil',              'Student Representative',             'K.M.C. College, Khopoli',                   'Student Representative'],
        ];

        foreach ($cdc as [$sr, $name, $desg, $org, $role]) {
            \App\Models\CommitteeMember::create([
                'serial_number'  => $sr,
                'sort_order'     => $sr,
                'name'           => $name,
                'designation'    => $desg,
                'organization'   => $org,
                'role'           => $role,
                'committee_type' => 'cdc',
                'is_active'      => true,
            ]);
        }

        // ── Academic Council ─────────────────────────────────────────────
        $this->seed('academic_council', [
            [1,  'Dr. Dayanand Prabhu Gaikwad',   'I/c Principal',              'K.M.C. College, Khopoli',        'Chairperson'],
            [2,  'Dr. Amol Arjun Nagargoje',       'IQAC Co-ordinator',          'K.M.C. College, Khopoli',        'Member'],
            [3,  'Dr. Archana Ashok Vaidya',       'HOD, Chemistry',             'K.M.C. College, Khopoli',        'Member'],
            [4,  'Dr. Suryakant Rajaram Patil',    'HOD, Physics',               'K.M.C. College, Khopoli',        'Member'],
            [5,  'Dr. Vandana Anil Jadhav',        'HOD, Botany',                'K.M.C. College, Khopoli',        'Member'],
            [6,  'Prof. Priya Pradeep Kadam',      'HOD, Mathematics',           'K.M.C. College, Khopoli',        'Member'],
            [7,  'Dr. Sandeep Govind Shinde',      'HOD, Commerce',              'K.M.C. College, Khopoli',        'Member'],
            [8,  'Dr. Nilima Vilas Patil',         'HOD, Marathi',               'K.M.C. College, Khopoli',        'Member'],
            [9,  'Prof. Sanjay Dattatray Gaikwad', 'HOD, English',               'K.M.C. College, Khopoli',        'Member'],
            [10, 'Prof. Reena Ramesh Sawant',      'HOD, Economics',             'K.M.C. College, Khopoli',        'Member'],
            [11, 'Shri. Santosh Gurunath Jangam',  'Chairman',                   'K.T.S.P. Mandal, Khopoli',       'Management Nominee'],
            [12, 'Dr. Rajesh Anant Kulkarni',      'Professor',                  'University of Mumbai',           'University Nominee'],
            [13, 'Shri. Ajay Vinayak Desai',       'Industry Expert',            'MIDC Khopoli',                   'Industry Representative'],
            [14, 'Ku. Priya Anil Sawant',          'Student Representative',     'K.M.C. College, Khopoli',        'Student Member'],
        ]);

        // ── Finance Committee ────────────────────────────────────────────
        $this->seed('finance_committee', [
            [1,  'Shri. Santosh Gurunath Jangam',   'Chairman, K.T.S.P. Mandal',  'K.T.S.P. Mandal, Khopoli',      'Chairman'],
            [2,  'Shri. Abubakar Aadam Jalgaonkar', 'Vice-Chairman',              'K.T.S.P. Mandal, Khopoli',      'Member'],
            [3,  'Shri. Kishor Balkrushna Patil',   'Secretary',                  'K.T.S.P. Mandal, Khopoli',      'Member'],
            [4,  'Dr. Dayanand Prabhu Gaikwad',     'I/c Principal',              'K.M.C. College, Khopoli',       'Ex-Officio Member'],
            [5,  'Dr. Sandeep Govind Shinde',        'HOD, Commerce',              'K.M.C. College, Khopoli',       'Member'],
            [6,  'Shri. Suresh Ramchandra More',    'Accounts Officer',           'K.M.C. College, Khopoli',       'Member Secretary'],
            [7,  'CA Mahesh Vitthal Patil',          'Chartered Accountant',       'Patil & Associates, Khopoli',   'External Auditor'],
        ]);

        // ── Board of Studies — Arts ──────────────────────────────────────
        $this->seed('board_of_studies', [
            [1,  'Prof. Sanjay Dattatray Gaikwad',  'HOD, English',               'K.M.C. College, Khopoli',       'Chairman (Arts)'],
            [2,  'Dr. Nilima Vilas Patil',           'HOD, Marathi',               'K.M.C. College, Khopoli',       'Member (Arts)'],
            [3,  'Prof. Reena Ramesh Sawant',        'HOD, Economics',             'K.M.C. College, Khopoli',       'Member (Arts)'],
            [4,  'Prof. Kavita Ramesh Deshpande',   'Senior Faculty, History',    'K.M.C. College, Khopoli',       'Member (Arts)'],
            [5,  'Dr. Anjali Ramesh Joshi',          'Associate Professor',        'University of Mumbai',          'External Expert (Arts)'],
            [6,  'Shri. Nitin Pandurang Kadam',     'Media & Communication',      'Zee Media, Mumbai',             'Industry Representative (Arts)'],
            // Commerce
            [7,  'Dr. Sandeep Govind Shinde',        'HOD, Commerce',              'K.M.C. College, Khopoli',       'Chairman (Commerce)'],
            [8,  'Prof. Sushama Dilip Phansekar',   'Senior Faculty, Commerce',   'K.M.C. College, Khopoli',       'Member (Commerce)'],
            [9,  'Prof. Manisha Anil Bhosale',      'Faculty, Accountancy',       'K.M.C. College, Khopoli',       'Member (Commerce)'],
            [10, 'CA Mahesh Vitthal Patil',          'Chartered Accountant',       'Patil & Associates, Khopoli',   'External Expert (Commerce)'],
            [11, 'Shri. Vinod Narayan Sharma',      'Senior Manager',             'Bank of Maharashtra, Khopoli',  'Industry Representative (Commerce)'],
            // Science
            [12, 'Dr. Archana Ashok Vaidya',         'HOD, Chemistry',             'K.M.C. College, Khopoli',       'Chairman (Science)'],
            [13, 'Dr. Suryakant Rajaram Patil',      'HOD, Physics',               'K.M.C. College, Khopoli',       'Member (Science)'],
            [14, 'Dr. Vandana Anil Jadhav',          'HOD, Botany',                'K.M.C. College, Khopoli',       'Member (Science)'],
            [15, 'Prof. Priya Pradeep Kadam',        'HOD, Mathematics',           'K.M.C. College, Khopoli',       'Member (Science)'],
            [16, 'Dr. Hemant Shankar Kulkarni',     'Associate Professor',        'University of Mumbai',          'External Expert (Science)'],
            [17, 'Dr. Abhay Vasant Deshpande',      'Research Scientist',         'CSIR-NCL, Pune',                'Industry Representative (Science)'],
        ]);

        // ── IQAC ─────────────────────────────────────────────────────────
        $this->seed('iqac', [
            [1,  'Dr. Dayanand Prabhu Gaikwad',   'I/c Principal',              'K.M.C. College, Khopoli',        'Chairperson'],
            [2,  'Dr. Amol Arjun Nagargoje',       'IQAC Co-ordinator',          'K.M.C. College, Khopoli',        'Co-ordinator'],
            [3,  'Dr. Archana Ashok Vaidya',       'HOD, Chemistry',             'K.M.C. College, Khopoli',        'Member'],
            [4,  'Dr. Suryakant Rajaram Patil',    'HOD, Physics',               'K.M.C. College, Khopoli',        'Member'],
            [5,  'Dr. Sandeep Govind Shinde',      'HOD, Commerce',              'K.M.C. College, Khopoli',        'Member'],
            [6,  'Dr. Nilima Vilas Patil',         'HOD, Marathi',               'K.M.C. College, Khopoli',        'Member'],
            [7,  'Prof. Priya Pradeep Kadam',      'HOD, Mathematics',           'K.M.C. College, Khopoli',        'Member'],
            [8,  'Prof. Sanjay Dattatray Gaikwad', 'HOD, English',               'K.M.C. College, Khopoli',        'Member'],
            [9,  'Shri. Santosh Gurunath Jangam',  'Chairman',                   'K.T.S.P. Mandal, Khopoli',       'Management Nominee'],
            [10, 'Shri. Kishor Balkrushna Patil',  'Secretary',                  'K.T.S.P. Mandal, Khopoli',       'Management Nominee'],
            [11, 'Dr. Ashok Ramchandra Naik',      'Professor',                  'University of Mumbai',           'University Nominee'],
            [12, 'Shri. Vijay Dinkar Desai',        'Managing Director',          'Desai Industries, Khopoli',      'Industry Representative'],
            [13, 'Mr. Pradeep Deshmukh',           'Ex-Officio Secretary',       'K.M.C. College, Khopoli',        'Administrative Member'],
            [14, 'Ku. Snehal Ganesh Patil',         'Student Representative',     'K.M.C. College, Khopoli',        'Student Member'],
        ]);

        // ── Autonomy Committee ───────────────────────────────────────────
        $this->seed('autonomy', [
            [1,  'Dr. Dayanand Prabhu Gaikwad',   'I/c Principal',              'K.M.C. College, Khopoli',        'Chairman'],
            [2,  'Dr. Amol Arjun Nagargoje',       'IQAC Co-ordinator',          'K.M.C. College, Khopoli',        'Member Secretary'],
            [3,  'Dr. Archana Ashok Vaidya',       'Senior Faculty',             'K.M.C. College, Khopoli',        'Member'],
            [4,  'Dr. Sandeep Govind Shinde',      'Senior Faculty',             'K.M.C. College, Khopoli',        'Member'],
            [5,  'Shri. Santosh Gurunath Jangam',  'Chairman',                   'K.T.S.P. Mandal, Khopoli',       'Management Representative'],
            [6,  'Dr. Rajesh Anant Kulkarni',      'Professor',                  'University of Mumbai',           'University Nominee'],
        ]);
    }

    private function seed(string $type, array $rows): void
    {
        foreach ($rows as [$sr, $name, $desg, $org, $role]) {
            \App\Models\CommitteeMember::create([
                'serial_number'  => $sr,
                'sort_order'     => $sr,
                'name'           => $name,
                'designation'    => $desg,
                'organization'   => $org,
                'role'           => $role,
                'committee_type' => $type,
                'is_active'      => true,
            ]);
        }
    }
}
