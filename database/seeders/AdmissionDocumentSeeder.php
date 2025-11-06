<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admissions = [
            // Admission Guidelines
            [
                'title' => 'Freshman Admission Guidelines',
                'slug' => 'freshman-admission-guidelines',
                'description' => 'Complete guide for first-year students entering San Isidro College.',
                'category' => 'guideline',
                'download_url' => null,
                'content' => 'Welcome to San Isidro College! This guide will walk you through the admission process for incoming freshmen.

Steps:
1. Complete the online application form
2. Submit required documents (transcript, recommendation letters)
3. Take the entrance examination
4. Attend the interview (if required)
5. Await acceptance notification
6. Complete enrollment process

Important Dates:
- Application Period: November - February
- Entrance Examination: First Saturday of March
- Results Announcement: First week of April

For more information, please contact the Admissions Office.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Transfer Student Guidelines',
                'slug' => 'transfer-student-guidelines',
                'description' => 'Information for students transferring from other institutions.',
                'category' => 'guideline',
                'download_url' => null,
                'content' => 'Transfer to San Isidro College

Transfer Student Requirements:
- Must have completed at least one semester at previous institution
- Cumulative GPA of 2.5 or higher
- Official transcript from previous institution
- Certificate of good moral character
- Course description for credit evaluation

Transfer Process:
1. Submit transfer application
2. Provide official transcript and course descriptions
3. Credit evaluation review
4. Interview with department head
5. Enrollment confirmation

Scholarship opportunities available for transfer students.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'International Student Admission',
                'slug' => 'international-student-admission',
                'description' => 'Guidelines for international students applying to San Isidro College.',
                'category' => 'guideline',
                'download_url' => null,
                'content' => 'International Student Admission

We welcome students from around the world! 

Requirements:
- Valid student visa (for international students)
- Original and certified English translation of academic records
- Proof of English proficiency (TOEFL/IELTS)
- Medical clearance certificate
- Proof of financial capability
- Passport copy

Application Deadlines:
- Fall Semester: June 30
- Spring Semester: November 30

Our International Student Services office will assist you with visa processing and accommodation.',
                'order' => 3,
                'is_active' => true,
            ],

            // Downloadable Forms
            [
                'title' => 'Undergraduate Application Form',
                'slug' => 'undergraduate-application-form',
                'description' => 'Official application form for undergraduate programs.',
                'category' => 'form',
                'download_url' => '/downloads/undergraduate-application-form.pdf',
                'content' => 'Download and fill out this form to apply for undergraduate programs at San Isidro College.

Application Checklist:
- Completed application form
- Official high school transcript
- Recommendation letters (2)
- Application fee receipt
- Recent 2x2 ID photo

Please submit completed forms to the Admissions Office.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Graduate Application Form',
                'slug' => 'graduate-application-form',
                'description' => 'Application form for graduate and postgraduate programs.',
                'category' => 'form',
                'download_url' => '/downloads/graduate-application-form.pdf',
                'content' => 'Application form for Master\'s and Doctoral programs.

Required Documents:
- Bachelor\'s degree transcript
- Certificate of graduation
- Professional recommendation letters
- Statement of purpose
- Research proposal (for PhD)

Application deadline: Varies by program',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Scholarship Application Form',
                'slug' => 'scholarship-application-form',
                'description' => 'Apply for various scholarship programs available at the college.',
                'category' => 'form',
                'download_url' => '/downloads/scholarship-application-form.pdf',
                'content' => 'Scholarship Opportunities

Available Scholarships:
1. Academic Excellence Scholarship
2. Athletic Scholarship
3. Need-Based Financial Aid
4. Merit Scholarship
5. Departmental Scholarships

Eligibility Requirements:
- Academic achievement
- Financial need (for need-based)
- Special talents and skills
- Leadership qualities

Deadline: March 15 each year',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Transfer Credit Evaluation Form',
                'slug' => 'transfer-credit-evaluation-form',
                'description' => 'Request evaluation of credits from previous institutions.',
                'category' => 'form',
                'download_url' => '/downloads/transfer-credit-evaluation.pdf',
                'content' => 'Transfer Credit Evaluation Request

Use this form to request evaluation of courses taken at other institutions.

Process:
1. Complete this form
2. Attach official transcript
3. Include course descriptions
4. Submit to Registrar\'s Office
5. Evaluation takes 2-3 weeks

Maximum transfer credits: 60% of total program units',
                'order' => 4,
                'is_active' => true,
            ],

            // Requirements
            [
                'title' => 'General Admission Requirements',
                'slug' => 'general-admission-requirements',
                'description' => 'Complete list of admission requirements for all programs.',
                'category' => 'requirement',
                'download_url' => null,
                'content' => 'General Admission Requirements

For Undergraduate Programs:
- Original high school diploma or Certificate of Completion
- Original and photocopy of Form 138 (High School Report Card)
- Original and photocopy of Good Moral Character Certificate
- Original and photocopy of Birth Certificate (PSA)
- Medical Certificate from licensed physician
- 2x2 recent ID photos (4 copies)
- Application fee payment receipt

For Graduate Programs:
- Bachelor\'s degree from recognized institution
- Official undergraduate transcript
- Two letters of recommendation
- Updated resume or curriculum vitae
- Statement of purpose
- Research proposal (for research-based programs)

All documents must be original or certified true copies.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Entrance Examination Process',
                'slug' => 'entrance-examination-process',
                'description' => 'Information about the college entrance examination.',
                'category' => 'requirement',
                'download_url' => null,
                'content' => 'Entrance Examination Process

All applicants must take the San Isidro College Entrance Examination (SICE).

Examination Components:
1. English Proficiency Test (30%)
2. Mathematics Assessment (25%)
3. Science and Technology (20%)
4. General Knowledge (15%)
5. Personality Test (10%)

Duration: 3 hours
Format: Computer-based or Paper-based

Preparation:
- Review basic concepts in core subjects
- Practice time management
- Arrive 30 minutes early
- Bring valid ID and examination permit

Results will be available within 2 weeks after examination date.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Enrollment Procedures',
                'slug' => 'enrollment-procedures',
                'description' => 'Step-by-step guide to the enrollment process.',
                'category' => 'requirement',
                'download_url' => null,
                'content' => 'Enrollment Procedures for Admitted Students

Step 1: Acceptance Confirmation
- Receive acceptance letter
- Submit Reply Slip within deadline

Step 2: Submit Original Documents
- All required original documents
- Proof of payment for enrollment fee

Step 3: Medical Examination
- Complete medical examination at campus clinic
- Submit medical clearance

Step 4: Course Registration
- Meet with academic advisor
- Register for courses online
- Print class schedule

Step 5: Payment and ID Processing
- Pay tuition and fees
- Apply for student ID
- Finalize enrollment

Important: Keep all receipts and documents secure!',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($admissions as $admission) {
            \App\Models\AdmissionDocument::create($admission);
        }
    }
}
