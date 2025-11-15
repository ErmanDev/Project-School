<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionsController extends Controller
{
    /**
     * Get static admission documents data
     */
    private function getStaticData()
    {
        return collect([
            (object) [
                'id' => 1,
                'title' => 'Application Form',
                'description' => 'Download the official application form for admission to our institution.',
                'content' => "The Application Form is the first step in your journey to becoming a student at our institution. This comprehensive form collects essential information about your academic background, personal details, and program preferences.\n\nWhat You'll Need:\n• Personal information (name, address, contact details)\n• Educational history (high school, previous colleges)\n• Program of interest\n• Emergency contact information\n• Any special accommodations needed\n\nInstructions:\n1. Download the application form using the link below\n2. Fill out all required fields completely and accurately\n3. Review your information before submission\n4. Submit the completed form along with required documents\n5. Pay the application fee (if applicable)\n\nImportant Notes:\n• Incomplete applications will not be processed\n• All information must be accurate and verifiable\n• Keep a copy of your submitted application for your records\n• Application deadlines vary by program - check program-specific deadlines\n\nIf you have questions while filling out the form, please contact our Admissions Office for assistance.",
                'category' => 'forms',
                'slug' => 'application-form',
                'download_url' => '#',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 2,
                'title' => 'Requirements Checklist',
                'description' => 'Complete checklist of all required documents for admission.',
                'content' => "Use this comprehensive checklist to ensure you have all required documents before submitting your admission application. Missing documents may delay the processing of your application.\n\nRequired Documents:\n• Completed Application Form\n• Official High School Transcript or GED Certificate\n• Official College Transcripts (if transferring)\n• Standardized Test Scores (SAT/ACT if required)\n• Letters of Recommendation (2-3 required)\n• Personal Statement or Essay\n• Proof of English Proficiency (for international students)\n• Financial Documentation (for international students)\n• Copy of Valid ID or Passport\n• Application Fee Payment Confirmation\n\nOptional Documents (May Strengthen Application):\n• Resume or CV\n• Portfolio (for art/design programs)\n• Additional Letters of Recommendation\n• Certificates of Achievement\n• Work Experience Documentation\n\nSubmission Guidelines:\n• All documents must be official and certified\n• Transcripts must be sent directly from the issuing institution\n• Documents in languages other than English must be translated\n• Keep copies of all submitted documents\n• Submit documents well before the deadline\n\nCheck each item as you gather your documents to ensure a complete application package.",
                'category' => 'requirements',
                'slug' => 'requirements-checklist',
                'download_url' => '#',
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 3,
                'title' => 'Scholarship Application',
                'description' => 'Application form for scholarship programs.',
                'content' => "We offer various scholarship opportunities to help make your education more affordable. This application form allows you to apply for multiple scholarship programs based on merit, need, or specific criteria.\n\nAvailable Scholarship Types:\n• Merit-Based Scholarships (academic excellence)\n• Need-Based Scholarships (financial need)\n• Program-Specific Scholarships (by major/field)\n• Athletic Scholarships\n• Community Service Scholarships\n• Leadership Scholarships\n• International Student Scholarships\n\nApplication Requirements:\n• Completed Scholarship Application Form\n• Academic Transcripts\n• Financial Information (for need-based)\n• Personal Statement\n• Letters of Recommendation\n• Proof of Community Service (if applicable)\n• Portfolio or Work Samples (if applicable)\n\nImportant Deadlines:\n• Fall Semester: Applications due by March 1st\n• Spring Semester: Applications due by October 1st\n• Early applications are encouraged\n\nSelection Process:\n• Applications are reviewed by scholarship committees\n• Recipients are notified within 4-6 weeks of deadline\n• Awards are applied directly to tuition and fees\n• Renewal requirements vary by scholarship type\n\nTips for a Strong Application:\n• Highlight your achievements and accomplishments\n• Clearly articulate your financial need (if applicable)\n• Demonstrate your commitment to your field of study\n• Show evidence of leadership and community involvement\n• Submit all required documents before the deadline",
                'category' => 'forms',
                'slug' => 'scholarship-application',
                'download_url' => '#',
                'is_active' => true,
                'order' => 2,
            ],
            (object) [
                'id' => 4,
                'title' => 'Admission Guidelines',
                'description' => 'Comprehensive guide to the admission process.',
                'content' => "Welcome to our Admission Guidelines! This comprehensive guide will walk you through every step of the admission process, from initial inquiry to enrollment.\n\nStep 1: Research and Explore\n• Review our academic programs and offerings\n• Attend virtual or in-person information sessions\n• Connect with current students and alumni\n• Visit our campus (if possible)\n• Review admission requirements for your program\n\nStep 2: Prepare Your Application\n• Gather all required documents (see Requirements Checklist)\n• Request official transcripts from previous institutions\n• Prepare your personal statement or essay\n• Request letters of recommendation\n• Complete standardized tests (if required)\n\nStep 3: Submit Your Application\n• Complete the online application form\n• Upload all required documents\n• Pay the application fee\n• Submit before the deadline\n• Keep confirmation of submission\n\nStep 4: Application Review\n• Applications are reviewed by admission committees\n• Additional information may be requested\n• Interviews may be scheduled (for some programs)\n• Review process typically takes 4-6 weeks\n\nStep 5: Decision Notification\n• You will receive notification via email and mail\n• Accepted students receive enrollment information\n• Waitlisted students receive additional instructions\n• Denied applicants may request feedback\n\nStep 6: Enrollment\n• Submit enrollment deposit\n• Complete financial aid process\n• Register for orientation\n• Submit final transcripts\n• Complete health and housing forms\n\nImportant Dates:\n• Application Deadlines: Vary by program\n• Decision Notification: 4-6 weeks after deadline\n• Enrollment Deposit Due: 2 weeks after acceptance\n• Orientation: Before semester begins\n\nNeed Help?\nOur Admissions Office is here to assist you throughout the process. Contact us with any questions or concerns.",
                'category' => 'guidelines',
                'slug' => 'admission-guidelines',
                'download_url' => null,
                'is_active' => true,
                'order' => 1,
            ],
            (object) [
                'id' => 5,
                'title' => 'Transfer Student Guide',
                'description' => 'Information and resources for students transferring from other institutions.',
                'content' => "If you're considering transferring to our institution, this guide provides essential information about the transfer process, credit evaluation, and what to expect.\n\nTransfer Credit Evaluation:\n• Credits from accredited institutions are generally accepted\n• Minimum grade of C required for transfer\n• Maximum 60 credits can transfer from community colleges\n• Maximum 90 credits can transfer from four-year institutions\n• Some programs have specific transfer requirements\n\nTransfer Application Process:\n• Submit official transcripts from all previous institutions\n• Provide course descriptions for credit evaluation\n• Meet program-specific prerequisites\n• Maintain minimum GPA requirements (varies by program)\n• Complete at least 30 credits at our institution for degree\n\nImportant Considerations:\n• Transfer credit evaluation takes 2-3 weeks\n• Some courses may not transfer directly\n• Program requirements must be met regardless of transfer credits\n• Financial aid eligibility may be affected\n• Housing and orientation are available for transfer students\n\nResources for Transfer Students:\n• Transfer Student Orientation\n• Academic Advising for Transfer Students\n• Transfer Student Support Services\n• Credit Evaluation Appeals Process\n\nWe welcome transfer students and are committed to making your transition as smooth as possible.",
                'category' => 'guidelines',
                'slug' => 'transfer-student-guide',
                'download_url' => null,
                'is_active' => true,
                'order' => 2,
            ],
            (object) [
                'id' => 6,
                'title' => 'International Student Admission',
                'description' => 'Special requirements and information for international students.',
                'content' => "We welcome students from around the world! This guide outlines the special requirements and processes for international student admission.\n\nInternational Student Requirements:\n• Completed Application Form\n• Official Academic Transcripts (with English translation)\n• Proof of English Proficiency (TOEFL, IELTS, or equivalent)\n• Financial Documentation (proof of funds)\n• Copy of Passport\n• Student Visa Documentation\n• Health Insurance Information\n\nEnglish Proficiency Requirements:\n• TOEFL: Minimum 80 (internet-based) or 550 (paper-based)\n• IELTS: Minimum 6.5 overall score\n• Duolingo: Minimum 105\n• Some programs may have higher requirements\n\nFinancial Documentation:\n• Proof of sufficient funds for tuition and living expenses\n• Bank statements or sponsorship letters\n• Financial guarantee forms\n• Scholarship award letters (if applicable)\n\nVisa Information:\n• I-20 form issued after acceptance\n• F-1 student visa required\n• SEVIS fee payment required\n• Visa interview at U.S. embassy/consulate\n• Arrival and orientation requirements\n\nSupport Services for International Students:\n• International Student Office\n• Orientation programs\n• Academic support services\n• Cultural adjustment resources\n• Immigration advising\n• English language support\n\nImportant Deadlines:\n• Applications due earlier for international students\n• Allow extra time for visa processing\n• Plan for arrival before orientation\n\nWe're committed to supporting our international students throughout their educational journey.",
                'category' => 'guidelines',
                'slug' => 'international-student-admission',
                'download_url' => null,
                'is_active' => true,
                'order' => 3,
            ],
        ]);
    }

    /**
     * Display a listing of all admission resources
     */
    public function index()
    {
        $documents = $this->getStaticData()->groupBy('category');
        return view('admissions.index', compact('documents'));
    }

    /**
     * Display the specified admission document
     */
    public function show($slug)
    {
        $allDocuments = $this->getStaticData();
        $document = $allDocuments->firstWhere('slug', $slug);

        if (!$document) {
            abort(404, 'Document not found');
        }

        // Get other documents from the same category
        $relatedDocuments = $allDocuments
            ->where('category', $document->category)
            ->where('id', '!=', $document->id)
            ->values();

        return view('admissions.show', compact('document', 'relatedDocuments'));
    }
}

