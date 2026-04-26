<?php

namespace Database\Seeders;

use App\Models\CollegeCommittee;
use App\Models\CollegeCommitteeMember;
use Illuminate\Database\Seeder;

class CollegeCommitteeSeeder extends Seeder
{
    public function run(): void
    {
        CollegeCommitteeMember::query()->delete();
        CollegeCommittee::query()->delete();

        // ── NAAC Criteria Committees (I–VII) ──────────────────────────────────

        $naac = [
            [
                'name'    => 'NAAC Criteria I – Curricular Aspects',
                'sort'    => 1,
                'chairman'=> 'Dr. B. M. Nannaware',
                'members' => [
                    'Dr. G. P. Mulik', 'Mr. S. N. Waghmare', 'Mrs. Meenakshi Oswal',
                    'Dr. Pratibha Tembe', 'Mr. Rushikesh Bobade', 'Mrs. Tanuja Patil', 'Mr. Pooja Yadav',
                ],
            ],
            [
                'name'    => 'NAAC Criteria II – Teaching-Learning & Evaluation',
                'sort'    => 2,
                'chairman'=> 'Dr. V. R. Gandal',
                'members' => [
                    'Dr. S. P. Panchgalle', 'Mrs. Surekha Ghatol', 'Mrs. Shraddha Padwal',
                    'Miss. Pinki Sharma', 'Mr. Kamalakar Hirawa', 'Mrs. Pranjali Kolaskar', 'Miss. Snehal Mulik',
                ],
            ],
            [
                'name'    => 'NAAC Criteria III – Research, Innovation & Extension',
                'sort'    => 3,
                'chairman'=> 'Dr. U. N. Gadhe',
                'members' => [
                    'Dr. A. B. Patil', 'Mr. Chetan Sonawane', 'Mr. Shailesh Shivde',
                    'Dr. Nilesh Jadhav', 'Miss. Nargees Kharkar', 'Mrs. Nuren Shafi', 'Mrs. Aparna More (Javare)',
                ],
            ],
            [
                'name'    => 'NAAC Criteria IV – Infrastructure & Learning Resources',
                'sort'    => 4,
                'chairman'=> 'Dr. J. V. Mane',
                'members' => [
                    'Dr. R. C. Ambare', 'Dr. V. K. Magar', 'Mrs. D. N. Pawar',
                    'Mrs. Yogita Sonawane', 'Miss. Snehal B. Kambali', 'Mr. D. S. Navale', 'Mr. Kiran Papal',
                ],
            ],
            [
                'name'    => 'NAAC Criteria V – Students Support and Progression',
                'sort'    => 5,
                'chairman'=> 'Mr. N. M. Taru',
                'members' => [
                    'Dr. V. B. Suryawanshi', 'Mr. Ramdas Ruthe', 'Mrs. Shital Dhandrut',
                    'Miss. Harshada Yadav', 'Mrs. Pornima Egade', 'Mr. Kuldeep Chavhan',
                ],
            ],
            [
                'name'    => 'NAAC Criteria VI – Governance, Leadership & Management',
                'sort'    => 6,
                'chairman'=> 'Mr. Sudam A. Bhise',
                'members' => [
                    'Mr. Sanjay R. Dayare', 'Miss. Nandkumar Mali', 'Miss. Mayuri Mundhe',
                    'Mrs. Meenakshi Oswal', 'Miss. Dhanashri Farat', 'Mr. Kabeer Ranvir',
                ],
            ],
            [
                'name'    => 'NAAC Criteria VII – Institutional Values & Best Practices',
                'sort'    => 7,
                'chairman'=> 'Dr. A. S. Kandhare',
                'members' => [
                    'Dr. D. S. Gaikwad', 'Mrs. T. D. Mohite', 'Mrs. Riya Jackson',
                    'Mrs. Manjushree Mahajan', 'Mrs. Priya Nerlekar', 'Dr. Pratik Sasane',
                ],
            ],
        ];

        foreach ($naac as $data) {
            $committee = CollegeCommittee::create([
                'name'          => $data['name'],
                'category'      => 'naac_criteria',
                'academic_year' => '2025-26',
                'sort_order'    => $data['sort'],
                'is_active'     => true,
            ]);
            $this->addMembers($committee, $data['chairman'], $data['members']);
        }

        // ── Other Committees ──────────────────────────────────────────────────

        $other = [
            [
                'name'    => 'N.S.S. Advisory Committee',
                'sort'    => 10,
                'chairman'=> 'Dr. B. M. Nannaware',
                'members' => [
                    'Dr. V. R. Gandal', 'Mr. Taru N. M.', 'Dr. A. A. Nagargoje',
                    'Dr. A. B. Patil', 'Dr. S. P. Panchgalle', 'Mr. S. A. Bhise', 'Mr. S. R. Dayare',
                ],
            ],
            [
                'name'    => 'Alumni Association Committee',
                'sort'    => 20,
                'chairman'=> 'Dr. J. V. Mane',
                'members' => [
                    'Dr. D. S. Gaikwad', 'Mrs. D. N. Pawar', 'Mrs. Pinki Sharma',
                    'Mr. R. D. Ruthe', 'Mr. Rushikesh Bobade', 'Mrs. Vaishnayi Khandekar', 'Ms. Mushira Khan',
                ],
            ],
            [
                'name'    => 'Scholarship / SC/ST/OBC/NT/VJNT/SEBC/EWS Advisory Committee',
                'sort'    => 30,
                'chairman'=> 'Mr. N. M. Taru',
                'members' => [
                    'Mr. S. A. Bhise', 'Mr. Sanjay R. Dayare', 'Mrs. T. D. Mohite',
                    'Mrs. Tanuja Patil', 'Mr. Kamlakar Hirawa', 'Mrs. Shraddha Padwal', 'Shri. Madhukar Waghmare',
                ],
            ],
            [
                'name'    => 'College Research Cell',
                'sort'    => 40,
                'chairman'=> 'Dr. A. B. Patil',
                'members' => [
                    'Dr. U. N. Gadhe', 'Dr. S. P. Panchgalle', 'Dr. V. R. Gandal',
                    'Mr. S. R. Dayare', 'Dr. R. C. Ambare', 'Mr. Chetan Sonawane',
                ],
            ],
            [
                'name'    => 'College Website & ICT Committee',
                'sort'    => 50,
                'chairman'=> 'Dr. S. P. Panchgalle',
                'members' => [
                    'Dr. A. A. Nagargoje', 'Mr. S. R. Dayare', 'Mrs. Dhanshri Pawar',
                    'Mrs. Sheetal G. Dhandrut', 'Mrs. Pranjali Kolaskar', 'Mr. Nilesh Durge',
                ],
            ],
            [
                'name'    => 'Grievance Redressal Committee',
                'sort'    => 60,
                'chairman'=> 'Dr. A. S. Kandhare',
                'members' => [
                    'Dr. G. P. Mulik', 'Dr. V. R. Gandal', 'Mr. S. A. Shivade',
                    'Mrs. Surekha Ghatol', 'Mrs. Pournima Egade', 'Smt. A. Umerdand',
                ],
            ],
            [
                'name'    => 'Mentor / Mentee Committee',
                'sort'    => 70,
                'chairman'=> 'Dr. D. S. Gaikwad',
                'members' => [
                    'Mr. S. N. Waghmare', 'Dr. A. B. Patil', 'Mr. N. M. Taru',
                    'Mrs. Manjushree Mahajan', 'Mrs. Priya Nerlekar', 'Mr. Kuldip Chavhan',
                    'Ms. Dhanashri Farat', 'Ms. Dakshata Mohite',
                ],
            ],
            [
                'name'      => 'Library Committee',
                'sort'      => 80,
                'chairman'  => 'Dr. D. P. Gaikwad',
                'secretary' => 'Mr. C. S. Sonawane (Librarian)',
                'members'   => [
                    'Dr. A. B. Patil', 'Dr. B. M. Nannaware', 'Dr. S. P. Panchgalle',
                    'Dr. R. C. Ambare', 'Mr. Bhise S. A.', 'Mr. Sanjay R. Dayare', 'Dr. Pratibha Tembhe',
                ],
            ],
            [
                'name'    => 'Purchase Committee',
                'sort'    => 90,
                'chairman'=> 'Dr. D. P. Gaikwad',
                'members' => [
                    'Mr. Dilip Porwal', 'Dr. V. B. Suryawanshi', 'Dr. A. A. Nagargoje',
                    'Dr. V. R. Gandal', 'Mr. D. S. Navale', 'Mr. Kiran Papal',
                ],
            ],
            [
                'name'    => "Woman's Development Cell & Prevention of Sexual Harassment Committee",
                'sort'    => 100,
                'chairman'=> 'Mrs. T. D. Mohite',
                'members' => [
                    'Miss. Shital K. Gaikwad', 'Mrs. D. N. Pawar', 'Mrs. Meenakshi Oswal',
                    'Dr. Pratibha Tembe', 'Mrs. Manjushree Mahajan', 'Smt. A. A. Ambavane',
                ],
            ],
            [
                'name'    => 'Office Administration & Academic Supervision Committee',
                'sort'    => 110,
                'chairman'=> 'Dr. D. P. Gaikwad',
                'members' => [
                    'Dr. V. R. Gandal', 'Dr. V. B. Suryawanshi', 'Dr. B. M. Nannaware',
                    'Dr. A. A. Nagargoje', 'Shri. D. S. Nawale', 'Shri. Shinde Kiran',
                ],
            ],
            [
                'name'    => 'College Magazine / Prospect / Annual Report Committee',
                'sort'    => 120,
                'chairman'=> 'Dr. G. P. Mulik',
                'members' => [
                    'Dr. U. N. Gadhe', 'Dr. B. M. Nannaware', 'Dr. D. S. Gaikwad',
                    'Dr. V. R. Gandal', 'Dr. S. P. Panchgalle', 'Mrs. D. N. Pawar', 'Dr. Pratibha Tembe',
                ],
            ],
            [
                'name'    => 'Student Council Committee',
                'sort'    => 130,
                'chairman'=> 'Mr. S. N. Waghmare',
                'members' => [
                    'Mr. N. M. Taru', 'Dr. S. P. Panchgalle', 'Mrs. Sheetal Dhandrut',
                    'Mr. Rushikesh Bobade', 'Mrs. Pooja Yadav', 'Mr. Kabeer Ranvir',
                ],
            ],
            [
                'name'    => 'Staff Welfare Club Committee',
                'sort'    => 140,
                'chairman'=> 'Mr. Bhise S. A.',
                'members' => [
                    'Dr. A. S. Kandhare', 'Dr. U. N. Gadhe', 'Dr. D. S. Gaikwad',
                    'Mr. S. R. Dayare', 'Mrs. Shraddha Padwal', 'Shri. Hande A. G.',
                ],
            ],
            [
                'name'    => 'Repair and Maintenance Committee',
                'sort'    => 150,
                'chairman'=> 'Dr. J. V. Mane',
                'members' => [
                    'Mr. Chetan Sonawane', 'Dr. R. C. Ambare', 'Dr. V. K. Magar',
                    'Shri. Sachin Patil', 'Shri. Nilesh Durge',
                ],
            ],
            [
                'name'    => 'Admission Committee',
                'sort'    => 160,
                'chairman'=> 'Dr. B. M. Nannaware',
                'members' => [
                    'Dr. A. S. Kandhare', 'Dr. Mulik G. P.', 'Dr. V. R. Gandal',
                    'Dr. S. P. Panchgalle', 'Mr. Shailesh Shivde', 'Mrs. D. N. Pawar', 'Shri. D. S. Nawale',
                ],
            ],
            [
                'name'    => 'Career Guidance / Counselling / Placement Cell',
                'sort'    => 170,
                'chairman'=> 'Dr. V. B. Suryawanshi',
                'members' => [
                    'Dr. B. N. Nannaware', 'Mr. S. N. Waghmare', 'Mr. Sanjay Dayare',
                    'Dr. R. C. Ambare', 'Dr. V. K. Magar', 'Mr. Shailesh Shivde',
                    'Mr. Nandkumar Mali', 'Mrs. Meenakshi Oswal', 'Mrs. Mayuri Munde',
                ],
            ],
            [
                'name'    => 'Discipline & Anti-Ragging Committee',
                'sort'    => 180,
                'chairman'=> 'Mr. N. M. Taru',
                'members' => [
                    'Dr. J. V. Mane', 'Mr. S. N. Waghmare', 'Dr. V. K. Magar',
                    'Mrs. D. N. Pawar', 'Mr. Ramdas Ruthe', 'Miss. Shital Gaikwad',
                ],
            ],
            [
                'name'    => 'Cultural Activity Committee',
                'sort'    => 190,
                'chairman'=> 'Dr. G. P. Mulik',
                'members' => [
                    'Dr. V. B. Suryawanshi', 'Dr. B. N. Nannaware', 'Mrs. D. N. Pawar',
                    'Mrs. Surekha Birajdar', 'Mrs. Shital Valvankar', 'Mr. S. A. Shivade',
                    'Mr. Nilesh Jadhav', 'Mrs. Priya Nerlekar', 'Mrs. Pooja Yadav', 'Miss. Nargees Kharkar',
                ],
            ],
        ];

        foreach ($other as $data) {
            $committee = CollegeCommittee::create([
                'name'          => $data['name'],
                'category'      => 'other',
                'academic_year' => '2025-26',
                'sort_order'    => $data['sort'],
                'is_active'     => true,
            ]);
            $secretary = $data['secretary'] ?? null;
            $this->addMembers($committee, $data['chairman'], $data['members'], $secretary);
        }

        $this->command->info('CollegeCommitteeSeeder: seeded 26 committees successfully.');
    }

    private function addMembers(
        CollegeCommittee $committee,
        string $chairman,
        array $members,
        ?string $secretary = null
    ): void {
        $sn = 1;

        CollegeCommitteeMember::create([
            'college_committee_id' => $committee->id,
            'name'                 => $chairman,
            'role'                 => 'Chairman',
            'serial_number'        => $sn,
            'sort_order'           => $sn,
            'is_active'            => true,
        ]);
        $sn++;

        if ($secretary) {
            CollegeCommitteeMember::create([
                'college_committee_id' => $committee->id,
                'name'                 => $secretary,
                'role'                 => 'Secretary',
                'serial_number'        => $sn,
                'sort_order'           => $sn,
                'is_active'            => true,
            ]);
            $sn++;
        }

        foreach ($members as $name) {
            CollegeCommitteeMember::create([
                'college_committee_id' => $committee->id,
                'name'                 => $name,
                'role'                 => 'Member',
                'serial_number'        => $sn,
                'sort_order'           => $sn,
                'is_active'            => true,
            ]);
            $sn++;
        }
    }
}
